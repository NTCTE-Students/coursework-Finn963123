<!-- resources/views/polls/user_polls.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mt-5 mb-4">Мои опросы</h2>
    @if ($userPolls->isEmpty())
        <p>У вас пока нет опросов.</p>
    @else
        <div class="list-group">
            @foreach($userPolls as $poll)
            <div class="list-group-item">
                <h3 class="mb-3">{{ $poll->title }}</h3>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{ $poll->option1 }}</li>
                    <li class="list-group-item">{{ $poll->option2 }}</li>
                    <li class="list-group-item">{{ $poll->option3 }}</li>
                </ul>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
