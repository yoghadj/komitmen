@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.reply.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.replies.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="nik">{{ trans('cruds.reply.fields.nik') }}</label>
                            <input class="form-control" type="text" name="nik" id="nik" value="{{ old('nik', '') }}" required>
                            @if($errors->has('nik'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nik') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.reply.fields.nik_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="komitmen_id">{{ trans('cruds.reply.fields.komitmen') }}</label>
                            <select class="form-control select2" name="komitmen_id" id="komitmen_id" required>
                                @foreach($komitmens as $id => $entry)
                                    <option value="{{ $id }}" {{ old('komitmen_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('komitmen'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('komitmen') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.reply.fields.komitmen_helper') }}</span>
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