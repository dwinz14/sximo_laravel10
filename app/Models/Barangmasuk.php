<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class barangmasuk extends Sximo  {
	
	protected $table = 'tb_transaksi_masuk';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT tb_transaksi_masuk.* FROM tb_transaksi_masuk  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE tb_transaksi_masuk.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
