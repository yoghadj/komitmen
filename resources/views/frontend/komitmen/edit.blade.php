@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.komitman.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.komitmen.update", [$komitman->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.komitman.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $komitman->name) }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.komitman.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="deskripsi">{{ trans('cruds.komitman.fields.deskripsi') }}</label>
                            <input class="form-control" type="text" name="deskripsi" id="deskripsi" value="{{ old('deskripsi', $komitman->deskripsi) }}" required>
                            @if($errors->has('deskripsi'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('deskripsi') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.komitman.fields.deskripsi_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="tahun">{{ trans('cruds.komitman.fields.tahun') }}</label>
                            <input class="form-control" type="number" name="tahun" id="tahun" value="{{ old('tahun', $komitman->tahun) }}" step="1" required>
                            @if($errors->has('tahun'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tahun') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.komitman.fields.tahun_helper') }}</span>
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