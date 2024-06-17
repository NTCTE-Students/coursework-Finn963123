<!-- resources/views/polls/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h2>Список опросов</h2>
    <ul>
        @foreach($polls as $poll)
            <li>
                <h3>{{ $poll->title }}</h3>
                <p>Варианты ответа:</p>
                <ul>
                    <li>{{ $poll->option1 }}</li>
                    <li>{{ $poll->option2 }}</li>
                    <li>{{ $poll->option3 }}</li>
                </ul>
            </li>
        @endforeach
    </ul>
</div>
@endsection
