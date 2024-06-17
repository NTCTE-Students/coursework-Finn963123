<!-- resources/views/polls/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $poll->title }}</h2>
    <form action="{{ route('polls.vote', $poll) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="option1">
                <input type="radio" name="option" id="option1" value="option1">
                {{ $poll->option1 }}
            </label>
        </div>
        <div class="form-group">
            <label for="option2">
                <input type="radio" name="option" id="option2" value="option2">
                {{ $poll->option2 }}
            </label>
        </div>
        <div class="form-group">
            <label for="option3">
                <input type="radio" name="option" id="option3" value="option3">
                {{ $poll->option3 }}
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Проголосовать</button>
