@extends('templates.master')

@section('title')

Rock Paper Scissors

@endsection

@section('content')

<h2>How to play:</h2>
<ul>
    <li>Choose to throw either Rock, Paper or Scissors.</li>
    <li>I'll throw at the same time.</li>
    <li>Click 'Throw' to see who wins!</li>
    <li>Rock beats Scissors, Scissors beats Paper, and Paper beats Rock. </li>
    <li>If we both throw the same thing, it's a tie.</li>
    <li>Results will display below. To see detailed history of each round, click Game History.</li>

</ul>

<form method='POST' action='/play'>
    <div class='choices'>
        <label for='rock'>
            <input type='radio' name='move' value='rock' id='rock' class='choices'>Rock</label>

        <label for='paper'>
            <input type='radio' name='move' value='paper' id='paper' class='choices'>Paper</label>


        <label for='scissors'>
            <input type='radio' name='move' value='scissors' id='scissors' class='choices'>Scissors</label>
    </div>

    <button id='button' type='submit'>Throw!</button>
    <br>
    @if($app->errorsExist())
    <div class='error'>
        @foreach($app->errors() as $error)
        <p>You must select an option to play!</p>
        @endforeach
    </div>
    @endif

</form>

@if($results)

<h2>Outcome:</h2>
<p>You threw: {{ $results['move'] }}</p>
<p>I threw: {{ $results['throw'] }}</p>
<p>And the outcome is... {{ $results['outcome'] }}</p>

@endif

<div class='game-history'><a href='/history'>Game History</a></div>

@endsection
