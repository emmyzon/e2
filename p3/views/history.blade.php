@extends('templates.master')

@section('title')

Game History

@endsection

@section('content')

<h2>Game History</h2>

<div>
    @foreach($rounds as $round)
    <p class='round-details'><a href='/round?id={{ $round['id'] }}'>{{ $round['time'] }}</p>
    @endforeach
</div>

<!-- link to return to home page to play again -->
<div>
    <a class='play-button' href='/'>Play Again!</a>
</div>

@endsection
