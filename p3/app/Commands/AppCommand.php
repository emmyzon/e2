<?php

namespace App\Commands;

class AppCommand extends Command
{
    public function fresh()
    {
        $this->migrate();
        $this->seed();
    }

    public function migrate()
    {
        $this->app->db()->createTable('rounds', [
            'move' => 'varchar(8)',
            'throw' => 'varchar(8)',
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
            $move = $moves[rand(0, 2)];
            $throw = $moves[rand(0, 2)];

            # $outcome = '';

            # Determine winner
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

            # Set up a round
            $round = [
                'move' => $move,
                'throw' => $throw,
                'outcome' => $outcome,
                'time' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s')
            ];

            # Insert the round
            $this->app->db()->insert('rounds', $round);
        }
    }
}
