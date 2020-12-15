<?php
namespace App\Controllers;

class AppController extends Controller
{
    /**
     * This method is triggered by the route "/"
     */
    public function index()
    {
        $results = $this->app->old('results');
        
        return $this->app->view('index', [
            'results' => $results,
        ]);
    }

    public function history()
    {
        $rounds = $this->app->db()->all('rounds');

        return $this->app->view('history', [
            'rounds' => $rounds
        ]);
    }

    public function round()
    {
        $id = $this->app->param('id');
        $round = $this->app->db()->findById('rounds', $id);
        
        return $this->app->view('round', [
            'round' => $round
        ]);
    }

    public function play()
    {
        # Form validation
        $this->app->validate([
            'move' => 'required'
        ]);

        # $move == player move
        # $throw == computer move
        $move = $this->app->input('move');

        # Save results to database
        $moves = ['rock', 'paper', 'scissors'];
        $throw = $moves[rand(0, 2)];
        $outcome = '';

        # Rock-paper-scissors game logic
        if ($move == $throw) {
            $outcome = "It's a tie!";
        } elseif ($move == $moves[0] and $throw == $moves[1]) {
            $outcome = 'You lose!';
        } elseif ($move == $moves[0] and $throw == $moves[2]) {
            $outcome = 'You win!';
        } elseif ($move == $moves[1] and $throw == $moves[0]) {
            $outcome = 'You win!';
        } elseif ($move == $moves[1] and $throw == $moves[2]) {
            $outcome = 'You lose!';
        } elseif ($move == $moves[2] and $throw == $moves[0]) {
            $outcome = 'You lose!';
        } elseif ($move == $moves[2] and $throw == $moves[1]) {
            $outcome = 'You win!';
        }

        $data = [
            'move' => $move,
            'throw' => $throw,
            'outcome' => $outcome,
            'time' => date('Y-m-d H:i:s'),
        ];

        $this->app->db()->insert('rounds', $data);

        # Redirect user to home page after playing each round
        $this->app->redirect('/', [
            'results' => [
                'move' => $move,
                'throw' => $throw,
                'outcome' => $outcome,
                'throw' => $throw,
                
            ]
        ]);
    }
}
