@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.answer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.answers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="reply_id">{{ trans('cruds.answer.fields.reply') }}</label>
                <select class="form-control select2 {{ $errors->has('reply') ? 'is-invalid' : '' }}" name="reply_id" id="reply_id" required>
                    @foreach($replies as $id => $entry)
                        <option value="{{ $id }}" {{ old('reply_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('reply'))
                    <span class="text-danger">{{ $errors->first('reply') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.answer.fields.reply_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="question_id">{{ trans('cruds.answer.fields.question') }}</label>
                <select class="form-control select2 {{ $errors->has('question') ? 'is-invalid' : '' }}" name="question_id" id="question_id" required>
                    @foreach($questions as $id => $entry)
                        <option value="{{ $id }}" {{ old('question_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('question'))
                    <span class="text-danger">{{ $errors->first('question') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.answer.fields.question_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="answer">{{ trans('cruds.answer.fields.answer') }}</label>
                <input class="form-control {{ $errors->has('answer') ? 'is-invalid' : '' }}" type="text" name="answer" id="answer" value="{{ old('answer', '') }}" required>
                @if($errors->has('answer'))
                    <span class="text-danger">{{ $errors->first('answer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.answer.fields.answer_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection