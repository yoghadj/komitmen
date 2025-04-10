<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAnswerRequest;
use App\Http\Requests\StoreAnswerRequest;
use App\Http\Requests\UpdateAnswerRequest;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Reply;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AnswerController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('answer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $answers = Answer::with(['reply', 'question'])->get();

        return view('frontend.answers.index', compact('answers'));
    }

    public function create()
    {
        abort_if(Gate::denies('answer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $replies = Reply::pluck('nik', 'id')->prepend(trans('global.pleaseSelect'), '');

        $questions = Question::pluck('question', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.answers.create', compact('questions', 'replies'));
    }

    public function store(StoreAnswerRequest $request)
    {
        $answer = Answer::create($request->all());

        return redirect()->route('frontend.answers.index');
    }

    public function edit(Answer $answer)
    {
        abort_if(Gate::denies('answer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $replies = Reply::pluck('nik', 'id')->prepend(trans('global.pleaseSelect'), '');

        $questions = Question::pluck('question', 'id')->prepend(trans('global.pleaseSelect'), '');

        $answer->load('reply', 'question');

        return view('frontend.answers.edit', compact('answer', 'questions', 'replies'));
    }

    public function update(UpdateAnswerRequest $request, Answer $answer)
    {
        $answer->update($request->all());

        return redirect()->route('frontend.answers.index');
    }

    public function show(Answer $answer)
    {
        abort_if(Gate::denies('answer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $answer->load('reply', 'question');

        return view('frontend.answers.show', compact('answer'));
    }

    public function destroy(Answer $answer)
    {
        abort_if(Gate::denies('answer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $answer->delete();

        return back();
    }

    public function massDestroy(MassDestroyAnswerRequest $request)
    {
        $answers = Answer::find(request('ids'));

        foreach ($answers as $answer) {
            $answer->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
