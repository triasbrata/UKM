<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;
class KategoriProdukRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'label'=>'required',
            'foto'=>'required|mimes:jpg,png,jpeg,jpe,bmp',
        ];
    }
}
