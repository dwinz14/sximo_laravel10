<?php namespace App\Models\Validations;

class Txtanaman {

    public function rules(){
        return [
            'id_m_jenis_tan' => 'required',
            'id_blok' => 'required',
            'id_m_ledger' => 'required',
            'jarak_tanam' => 'required',
            'id_m_klasifikasi_tan' => 'required',
            'tahun_tanam' => 'required',
            'tahun_tanam_2' => 'required'
        ];
    }
}