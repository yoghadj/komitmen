<?php

namespace App\Http\Requests;

use App\Models\Komitman;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreKomitmanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('komitman_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'deskripsi' => [
                'string',
                'required',
            ],
            'tahun' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
