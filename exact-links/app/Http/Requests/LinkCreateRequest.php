<?php

namespace ExactLinks\App\Http\Requests;

class LinkCreateRequest extends AdminRequest
{
    public function rules()
    {
        return [
            'type' => 'required'
        ];
    }

    public function messages()
    {
        return [];
    }
}
