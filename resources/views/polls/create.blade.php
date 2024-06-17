<!-- resources/views/polls/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Создать опрос</h2>
    <form action="{{ route('polls.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Название опроса</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="option1">Вариант ответа 1</label>
            <input type="text" class="form-control" id="option1" name="option1" required>
        </div>
        <div class="form-group">
            <label for="option2">Вариант ответа 2</label>
            <input type="text" class="form-control" id="option2" name="option2" required>
        </div>
        <div class="form-group">
            <label for="option3">Вариант ответа 3</label>
            <input type="text" class="form-control" id="option3" name="option3" required>
        </div>
        <button type="submit" class="btn btn-primary">Создать опрос</button>
    </form>
</div>
@endsection
