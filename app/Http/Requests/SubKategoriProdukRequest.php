<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;
use App\KategoriProduk;
class SubKategoriProdukRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(KategoriProduk::find($this->input('kategori_produk_id'))){
            return Auth::check();
        }
        require false;
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
            'kategori_produk_id' => 'required',
        ];
    }
}
