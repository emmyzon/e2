<?php

session_start();

$choice = $_GET['choice'];

$moves = ['rock', 'paper', 'scissors'];

$throw = $moves[rand(0, 2)];

$outcome = '';

if ($choice == $throw) {
    $outcome = "It's a tie!";
} elseif ($choice == $moves[0] and $throw == $moves[1]) {
    $outcome = 'I win!';
} elseif ($choice == $moves[0] and $throw == $moves[2]) {
    $outcome = 'You win!';
} elseif ($choice == $moves[1] and $throw == $moves[0]) {
    $outcome = 'You win!';
} elseif ($choice == $moves[1] and $throw == $moves[2]) {
    $outcome = 'I win!';
} elseif ($choice == $moves[2] and $throw == $moves[0]) {
    $outcome = 'I win!';
} elseif ($choice == $moves[2] and $throw == $moves[1]) {
    $outcome = 'You win!';
}

$_SESSION['results'] = [
    'choice' => $choice,
    'throw' => $throw,
    'outcome' => $outcome,
];

header('Location: index.php');
