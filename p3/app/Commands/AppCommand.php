<?php

namespace App\Commands;

class AppCommand extends Command
{
    public function refresh()
    {
        $this->migrate();
        $this->seed();
    }

    public function migrate()
    {
        $this->app->db()->createTable('rounds', [
            'player_move' => 'varchar(8)',
            'computer_move' => 'varchar(8)',
            'outcome' => 'varchar(255)',
            'time' => 'timestamp'
        ]);
    }

    public function seed()
    {
        # Create new instance of Faker\Factory class for timestamp seed data
        $faker = \Faker\Factory::create();
        # Use a loop to create 10 past rounds
        for ($i = 0; $i < 10; $i++) {
            $moves = ['rock', 'paper', 'scissors'];
            # Randomly pick moves for each player
            $player_move = $moves[rand(0, 2)];
            $computer_move = $moves[rand(0, 2)];

            # Determine winner
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

            # Set up a round
            $round = [
                'player_move' => $player_move,
                'computer_move' => $computer_move,
                'outcome' => $outcome,
                'time' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s')
            ];

            # Insert the round into the db
            $this->app->db()->insert('rounds', $round);
        }
    }
}
