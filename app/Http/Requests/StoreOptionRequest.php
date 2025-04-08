<?php

namespace App\Http\Requests;

use App\Models\Option;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOptionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('option_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
