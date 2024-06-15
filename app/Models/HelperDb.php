<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Mobilebackend;
use Illuminate\Support\Facades\DB;

class HelperDb extends Model
{
    //
    function getParent($gid)
	{
        $hirarki = DB::table('tb_groups AS a')
                ->selectRaw('a.group_id AS child,
                b.group_id AS parent,
                c.group_id AS grand_parent ')
                ->leftJoin('tb_groups AS b', 'b.group_id', '=', 'a.parent')
                ->leftJoin('tb_groups AS c', 'c.group_id', '=', 'b.parent')
                ->where('a.group_id', '=', $gid)->first();
        return $hirarki;
	}

    function getChild($gid)
    {
        $hirarki = DB::table('tb_groups')
                ->select('group_id')
                ->where('parent', '=', $gid)->get();
        return $hirarki;
    }
}
