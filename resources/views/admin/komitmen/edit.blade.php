@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.komitman.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.komitmen.update", [$komitman->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.komitman.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $komitman->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.komitman.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="deskripsi">{{ trans('cruds.komitman.fields.deskripsi') }}</label>
                <input class="form-control {{ $errors->has('deskripsi') ? 'is-invalid' : '' }}" type="text" name="deskripsi" id="deskripsi" value="{{ old('deskripsi', $komitman->deskripsi) }}" required>
                @if($errors->has('deskripsi'))
                    <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.komitman.fields.deskripsi_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tahun">{{ trans('cruds.komitman.fields.tahun') }}</label>
                <input class="form-control {{ $errors->has('tahun') ? 'is-invalid' : '' }}" type="number" name="tahun" id="tahun" value="{{ old('tahun', $komitman->tahun) }}" step="1" required>
                @if($errors->has('tahun'))
                    <span class="text-danger">{{ $errors->first('tahun') }}</span>
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



@endsection