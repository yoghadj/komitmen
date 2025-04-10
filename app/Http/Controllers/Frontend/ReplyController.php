<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
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

        return view('frontend.replies.index', compact('replies'));
    }
}
