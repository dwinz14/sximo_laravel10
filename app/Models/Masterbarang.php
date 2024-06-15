<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class masterbarang extends Sximo  {
	
	protected $table = 'tb_barang';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT tb_barang.* FROM tb_barang  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE tb_barang.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
