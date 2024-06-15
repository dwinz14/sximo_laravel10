<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class validasimutasi extends Sximo  {
	
	protected $table = 'tx_mutasi_tanaman';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return " SELECT
	tx_mutasi_tanaman.*,
	vw_tx_tanaman_blok_affd.kode_affd,
	vw_tx_tanaman_blok_affd.nama_affd,
	vw_tx_tanaman_blok_affd.nama_kebun,
	vw_tx_tanaman_blok_affd.nama_blok,
	vw_tx_tanaman_blok_affd.kode_blok
	
FROM
	tx_mutasi_tanaman ";
	}	

	public static function queryWhere(  ){
		
		return " JOIN vw_tx_tanaman_blok_affd ON vw_tx_tanaman_blok_affd.id = tx_mutasi_tanaman.id_tx_tanaman 
WHERE
	tx_mutasi_tanaman.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}

	public static function setujuimutasi($id)
	{
		$tx_mutasi_tanaman = DB::table('tx_mutasi_tanaman')->where('id', '=', $id)->first();

		DB::table('tx_tanaman')
		->where('id', '=', $tx_mutasi_tanaman->id_tx_tanaman)
		->update(array(
			'jumlah_tanaman' => $tx_mutasi_tanaman->jumlah_sesudah,
			'proses_mutasi' => 0,
			
		));

		DB::table('tx_mutasi_tanaman')
		->where('id', '=', $id)
		->update(array(
			'protek_acc' => 1,
			'tgl_protek_acc' => date('Y-m-d'),
			'direksi_acc' => 1,
			'tgl_direksi_acc' => date('Y-m-d')
			
		));
	}

	public static function tolakmutasi($id)
	{
		$tx_mutasi_tanaman = DB::table('tx_mutasi_tanaman')->where('id', '=', $id)->first();
		
		DB::table('tx_tanaman')
		->where('id', '=', $tx_mutasi_tanaman->id_tx_tanaman)
		->update(array(
			'proses_mutasi' => 0,
		));
	
		DB::table('tx_mutasi_tanaman')
		->where('id', '=', $id)
		->update(array(
			'protek_acc' => 2,
			'tgl_protek_acc' => date('Y-m-d'),
			'direksi_acc' => 2,
			'tgl_direksi_acc' => date('Y-m-d')
		));
	}
	

}
