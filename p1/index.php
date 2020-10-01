<?php
$moves = ['rock', 'paper', 'scissors'];

$playerOne = $moves[rand(0, 2)];
$playerTwo = $moves[rand(0, 2)];
$outcome = '';

if ($playerOne == $playerTwo) {
    $outcome = "It's a tie!";
} elseif ($playerOne == $moves[0] and $playerTwo == $moves[1]) {
    $outcome = 'Player Two wins!';
} elseif ($playerOne == $moves[0] and $playerTwo == $moves[2]) {
    $outcome = 'Player One wins!';
} elseif ($playerOne == $moves[1] and $playerTwo == $moves[0]) {
    $outcome = 'Player One wins!';
} elseif ($playerOne == $moves[1] and $playerTwo == $moves[2]) {
    $outcome = 'Player Two wins!';
} elseif ($playerOne == $moves[2] and $playerTwo == $moves[0]) {
    $outcome = 'Player Two wins!';
} elseif ($playerOne == $moves[2] and $playerTwo == $moves[1]) {
    $outcome = 'Player One wins!';
}

require 'rock-paper-scissors-view.php';
