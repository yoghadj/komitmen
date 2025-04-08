@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.question.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.questions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="komitmen_id">{{ trans('cruds.question.fields.komitmen') }}</label>
                <select class="form-control select2 {{ $errors->has('komitmen') ? 'is-invalid' : '' }}" name="komitmen_id" id="komitmen_id" required>
                    @foreach($komitmens as $id => $entry)
                        <option value="{{ $id }}" {{ old('komitmen_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('komitmen'))
                    <span class="text-danger">{{ $errors->first('komitmen') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.komitmen_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="question">{{ trans('cruds.question.fields.question') }}</label>
                <input class="form-control {{ $errors->has('question') ? 'is-invalid' : '' }}" type="text" name="question" id="question" value="{{ old('question', '') }}" required>
                @if($errors->has('question'))
                    <span class="text-danger">{{ $errors->first('question') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.question_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.question.fields.type') }}</label>
                <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type" required>
                    <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Question::TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_required') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="is_required" id="is_required" value="1" required {{ old('is_required', 0) == 1 ? 'checked' : '' }}>
                    <label class="required form-check-label" for="is_required">{{ trans('cruds.question.fields.is_required') }}</label>
                </div>
                @if($errors->has('is_required'))
                    <span class="text-danger">{{ $errors->first('is_required') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.is_required_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="parent">{{ trans('cruds.question.fields.parent') }}</label>
                <input class="form-control {{ $errors->has('parent') ? 'is-invalid' : '' }}" type="number" name="parent" id="parent" value="{{ old('parent', '') }}" step="1">
                @if($errors->has('parent'))
                    <span class="text-danger">{{ $errors->first('parent') }}</span>
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



@endsection