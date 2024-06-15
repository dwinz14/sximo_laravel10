<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class jenisbarang extends Sximo  {
	
	protected $table = 'tb_jenis';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT tb_jenis.* FROM tb_jenis  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE tb_jenis.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
