@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.question.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.questions.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.question.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $question->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.question.fields.komitmen') }}
                                    </th>
                                    <td>
                                        {{ $question->komitmen->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.question.fields.question') }}
                                    </th>
                                    <td>
                                        {{ $question->question }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.question.fields.type') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Question::TYPE_SELECT[$question->type] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.question.fields.is_required') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $question->is_required ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.question.fields.parent') }}
                                    </th>
                                    <td>
                                        {{ $question->parent }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.questions.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection