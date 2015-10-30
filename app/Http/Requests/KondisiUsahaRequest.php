<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class KondisiUsahaRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return  Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'unit_usaha_id' => 'required',
            'tahun' => 'required',
            'bulan' => 'required',
            'aset' => 'required',
            'omset' => 'required',
            'tujuan_pemasaran_list' => 'required',
            'tempat_pemasaran_list' => 'required',
            'bahan_baku_list' => 'required',
            'permodalan_list' => 'required',
            'manajement' => 'required',
        ];
    }
}
