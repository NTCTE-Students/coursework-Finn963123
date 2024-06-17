<?php
// app/Http/Controllers/PollController.php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Poll;
use App\Models\Vote;
class PollController extends Controller
{
    public function create()
    {
        return view('polls.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'option1' => 'required|string|max:255',
            'option2' => 'required|string|max:255',
            'option3' => 'required|string|max:255',
        ]);

        $poll = new Poll();
        $poll->user_id = Auth::id(); // Устанавливаем ID текущего пользователя
        $poll->title = $request->title;
        $poll->option1 = $request->option1;
        $poll->option2 = $request->option2;
        $poll->option3 = $request->option3;
        $poll->save();

        return redirect()->route('polls.index')->with('success', 'Опрос успешно создан!');
    }

    public function index()
    {
        $polls = Poll::all();
        return view('polls.index', compact('polls'));
    }

    public function userPolls()
    {
        $userPolls = Poll::where('user_id', auth()->id())->get();
        return view('polls.user_polls', compact('userPolls'));
    }


    public function show(Poll $poll)
    {
        return view('polls.show', compact('poll'));
    }

    public function vote(Request $request, Poll $poll)
    {
        $request->validate([
            'option' => 'required|in:option1,option2,option3',
        ]);

        // Проверяем, не голосовал ли пользователь ранее
        if ($poll->votes()->where('user_id', auth()->id())->exists()) {
            return redirect()->back()->with('error', 'Вы уже проголосовали в этом опросе!');
        }

        // Создаем запись о голосе
        $vote = new Vote();
        $vote->user_id = auth()->id();
        $vote->poll_id = $poll->id;
        $vote->option = $request->option;
        $vote->save();

        return redirect()->back()->with('success', 'Ваш голос принят!');
    }

}
