<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReplyRequest;
use App\Http\Requests\StoreReplyRequest;
use App\Http\Requests\UpdateReplyRequest;
use App\Models\Komitman;
use App\Models\Reply;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReplyController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('reply_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $replies = Reply::with(['komitmen'])->get();

        return view('admin.replies.index', compact('replies'));
    }

    public function create()
    {
        abort_if(Gate::denies('reply_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $komitmens = Komitman::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.replies.create', compact('komitmens'));
    }

    public function store(StoreReplyRequest $request)
    {
        $reply = Reply::create($request->all());

        return redirect()->route('admin.replies.index');
    }

    public function edit(Reply $reply)
    {
        abort_if(Gate::denies('reply_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $komitmens = Komitman::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reply->load('komitmen');

        return view('admin.replies.edit', compact('komitmens', 'reply'));
    }

    public function update(UpdateReplyRequest $request, Reply $reply)
    {
        $reply->update($request->all());

        return redirect()->route('admin.replies.index');
    }

    public function show(Reply $reply)
    {
        abort_if(Gate::denies('reply_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reply->load('komitmen');

        return view('admin.replies.show', compact('reply'));
    }

    public function destroy(Reply $reply)
    {
        abort_if(Gate::denies('reply_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reply->delete();

        return back();
    }

    public function massDestroy(MassDestroyReplyRequest $request)
    {
        $replies = Reply::find(request('ids'));

        foreach ($replies as $reply) {
            $reply->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
