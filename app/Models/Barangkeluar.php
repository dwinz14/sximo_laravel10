<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class barangkeluar extends Sximo  {
	
	protected $table = 'tb_transaksi_keluar';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT tb_transaksi_keluar.* FROM tb_transaksi_keluar  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE tb_transaksi_keluar.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
