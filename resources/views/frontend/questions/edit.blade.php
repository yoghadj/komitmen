@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.question.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.questions.update", [$question->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="komitmen_id">{{ trans('cruds.question.fields.komitmen') }}</label>
                            <select class="form-control select2" name="komitmen_id" id="komitmen_id" required>
                                @foreach($komitmens as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('komitmen_id') ? old('komitmen_id') : $question->komitmen->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('komitmen'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('komitmen') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.question.fields.komitmen_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="question">{{ trans('cruds.question.fields.question') }}</label>
                            <input class="form-control" type="text" name="question" id="question" value="{{ old('question', $question->question) }}" required>
                            @if($errors->has('question'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('question') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.question.fields.question_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.question.fields.type') }}</label>
                            <select class="form-control" name="type" id="type" required>
                                <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Question::TYPE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('type', $question->type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.question.fields.type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="checkbox" name="is_required" id="is_required" value="1" {{ $question->is_required || old('is_required', 0) === 1 ? 'checked' : '' }} required>
                                <label class="required" for="is_required">{{ trans('cruds.question.fields.is_required') }}</label>
                            </div>
                            @if($errors->has('is_required'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('is_required') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.question.fields.is_required_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="parent">{{ trans('cruds.question.fields.parent') }}</label>
                            <input class="form-control" type="number" name="parent" id="parent" value="{{ old('parent', $question->parent) }}" step="1">
                            @if($errors->has('parent'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('parent') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.question.fields.parent_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection