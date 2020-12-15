@extends('templates.master')

@section('title')

Round Details

@endsection

@section('content')

<h2>Round Details</h2>
<ul>
    <li>Your move: {{ $round['player_move'] }}</li>
    <li>My move: {{ $round['computer_move'] }}</li>
    <li>Outcome: {{ $round['outcome'] }}</li>
    <li>Time: {{ $round['time'] }}</li>
</ul>
<!-- link to return to Game History page -->
<div class='game-history'>
    <a href='/history'>Back to Game History</a>
</div>

<!-- link to return to home page to play again -->
<div>
    <a class='play-button' href='/'>Play Again!</a>
</div>

@endsection
