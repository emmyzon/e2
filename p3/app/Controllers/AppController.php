<?php
namespace App\Controllers;

class AppController extends Controller
{
    /*** This method is triggered by the route "/" ***/
    public function index()
    {
        $results = $this->app->old('results');
        return $this->app->view('index', [
            'results' => $results,
        ]);
    }
    /*** This method is triggered by the route "/history" ***/
    public function history()
    {
        $rounds = $this->app->db()->all('rounds');
        return $this->app->view('history', [
            'rounds' => $rounds
        ]);
    }
    /*** This method is triggered by the route "/round" ***/
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
            'player_move' => 'required'
        ]);
        # Get player's choice of rock, paper or scissors from form input
        $player_move = $this->app->input('player_move');

        $moves = ['rock', 'paper', 'scissors'];
        $computer_move = $moves[rand(0, 2)];
        $outcome = '';

        # Rock-paper-scissors game logic
        if ($player_move == $computer_move) {
            $outcome = "It's a tie!";
        } elseif ($player_move == $moves[0] and $computer_move == $moves[1]) {
            $outcome = 'You lose!';
        } elseif ($player_move == $moves[0] and $computer_move == $moves[2]) {
            $outcome = 'You win!';
        } elseif ($player_move == $moves[1] and $computer_move == $moves[0]) {
            $outcome = 'You win!';
        } elseif ($player_move == $moves[1] and $computer_move == $moves[2]) {
            $outcome = 'You lose!';
        } elseif ($player_move == $moves[2] and $computer_move == $moves[0]) {
            $outcome = 'You lose!';
        } elseif ($player_move == $moves[2] and $computer_move == $moves[1]) {
            $outcome = 'You win!';
        }
        
        # Save results to database
        $data = [
            'player_move' => $player_move,
            'computer_move' => $computer_move,
            'outcome' => $outcome,
            'time' => date('Y-m-d H:i:s'),
        ];
        $this->app->db()->insert('rounds', $data);

        # Redirect user to home page after playing each round
        $this->app->redirect('/', [
            'results' => [
                'player_move' => $player_move,
                'computer_move' => $computer_move,
                'outcome' => $outcome,
                'throw' => $computer_move,
                
            ]
        ]);
    }
}
