<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HistoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_layanan' => 'required',
            // 'no_sp' => 'required|string',
            'id_user' => 'required',
            'nik' => 'required',
        ];
    }
}
