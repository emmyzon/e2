<?php
$moves = ['rock', 'paper', 'scissors'];

$move1 = $moves[rand(0, 2)];
var_dump($move1);
$move2 = $moves[rand(0, 2)];
var_dump($move2);

if ($move1 == $move2) {
    var_dump("It's a tie!");
} elseif ($move1 == $moves[0] and $move2 == $moves[1]) {
    var_dump('Player Two wins!');
} elseif ($move1 == $moves[0] and $move2 == $moves[2]) {
    var_dump('Player One wins!');
} elseif ($move1 == $moves[1] and $move2 == $moves[0]) {
    var_dump('Player One wins!');
} elseif ($move1 == $moves[1] and $move2 == $moves[2]) {
    var_dump('Player Two wins!');
} elseif ($move1 == $moves[2] and $move2 == $moves[0]) {
    var_dump('Player Two wins!');
} elseif ($move1 == $moves[2] and $move2 == $moves[1]) {
    var_dump('Player One wins!');
}
