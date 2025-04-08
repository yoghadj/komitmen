<?php

namespace App\Http\Requests;

use App\Models\Komitman;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyKomitmanRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('komitman_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:komitmen,id',
        ];
    }
}
