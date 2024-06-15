<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Usershelper extends Sximo  {
    
    public function __construct() {
		parent::__construct();
		
	}

    public function getUserProfile($token)
	{
		$token = str_replace('Bearer ','', $token);
        $user = \DB::table('tb_token')
                ->leftJoin('tb_users', 'tb_users.id', '=', 'tb_token.userId')
                ->where('token', trim($token) )
                ->first();
		return $user;
	}

	public function getUserProfileById($id)
	{
        $user = \DB::table('tb_users')
                ->where('id', '=', $id)
                ->first();
		return $user;
	}

	public function getGroupByid($id)
	{
		$group = \DB::table('tb_groups')
					->where('group_id', '=', $id)
					->first();
		return $group;
	}

	public function getidGroup($id)
	{
		$group = \DB::table('tb_groups')
				->where('parent', '=' , $id)
				->orWhere('group_id', '=', $id)
				->get();
		$data =  array();
		foreach($group as $row){
			array_push($data, $row->group_id);
		}		
		return $data;
	}

	public function getidGroupString($id)
	{
		$level = $this->getLvlGroup($id);
		$ingrp = "";
		if($level->level == 6){
			$s = DB::table('tb_groups')->Where('group_id', '=', $id)->first();
			$ingrp .= $s->group_id.','.$s->parent;
		}elseif($level->level == 5){
			$s = DB::table('tb_groups')->Where('group_id', '=', $id)->first();
			$ingrp .= $s->group_id;
		}elseif($level->level == 4){
			$s = DB::table('tb_groups')->Where('unit', '=', $level->unit)->get();
			$go = "";
			foreach($s  as $y){
				$go .= $y->group_id.',';
			}
			$ingrp = substr($go, 0,-1);
		}elseif($level->level == 3){
			$s = DB::table('tb_groups')->Where('parent', '=', $id)->get();
			$x = DB::table('tb_groups');
			foreach($s as $r){
				$x->orWhere('unit', '=', $r->unit);
			}
			$go = "";
			foreach($x->get() as $y){
				$go .= $y->group_id.',';
			}
			$ingrp = substr($go, 0,-1);
		}
		return $ingrp;
	}

	public function getidGroupArray($id)
	{
		$level = $this->getLvlGroup($id);
		$ingrp = array();
		if($level->level == 6){
			$s = DB::table('tb_groups')->Where('group_id', '=', $id)->first();
			array_push($ingrp, $s->group_id);
			array_push($ingrp, $s->parent);
		}elseif($level->level == 5){
			$s = DB::table('tb_groups')->Where('group_id', '=', $id)->first();
			array_push($ingrp, $s->group_id);
		}elseif($level->level == 4){
			$s = DB::table('tb_groups')->Where('unit', '=', $level->unit)->get();
			$go = "";
			foreach($s  as $y){
				array_push($ingrp, $y->group_id);
			}
		}elseif($level->level == 3){
			$s = DB::table('tb_groups')->Where('parent', '=', $id)->get();
			$x = DB::table('tb_groups');
			foreach($s as $r){
				$x->orWhere('unit', '=', $r->unit);
			}
			$go = "";
			foreach($x->get() as $y){
				array_push($ingrp, $y->group_id);
			}
			
		}
		return $ingrp;
	}

	function getGroupByUnit($id)
	{
		return DB::table('tb_groups')->Where('group_id', '=', $id)->frist();
	}

	public function getLvlGroup($id)
	{
		$group = \DB::table('tb_groups')
				->where('group_id', '=', $id)
				->first();
		return $group;
	}

	public function getParentGroup($id)
	{
		$group = \DB::table('tb_groups')
				->where('group_id', '=', $id)
				->orWhere ('parent', '=', $id)
				->get();
		return $group;
	}
}
	