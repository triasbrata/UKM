<?php 

namespace App;
/**
* Contain all rule
*/
class RuleValidationIzin 
{
	
	public function lists()
	{
		return [
			'required'=> 'Tidak boleh kosong',
			'min:3'=> 'Minimal 3 karakter',
			'alpha'=> 'Harus huruf',
			'alpha_num'=> 'Harus huruf dan angka',
		];
	}
}