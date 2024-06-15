<?php namespace App\Models\Helper;

use Illuminate\Support\Facades\DB;

class Findgroup{

    /**
     * fungsi untuk mengambil data group berdasarkan id group yang di ambil dari session gid
     *
     * @return object
     */
    public function findByid(){
        $group = DB::table('tb_groups')->where('group_id', '=', session('gid'))->first();
        return $group;
    }
}