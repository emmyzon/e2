@extends('templates.master')

@section('title')

Round Details

@endsection

@section('content')

<h2>Round Details</h2>
<ul>
    <li>Your move: {{ $round['move'] }}</li>
    <li>My move: {{ $round['throw'] }}</li>

    <li>Outcome: {{ $round['outcome'] }}</li>
    <li>Time: {{ $round['time'] }}</li>


</ul>
@endsection
