<?php

namespace App\Repositories;

use Illuminate\Config\Repository;
use Illuminate\Support\Facades\DB;

class ListeRepository extends Repository
{
    public function list_envoi($paginate)
    {
        return DB::table('envoi_lists')
        //  ->where('Type','=',$type)
            ->where(['Users' => Auth()->user()->agencies_id])
            ->paginate($paginate);
    }

    public function list_reçoi($paginate)
    {
        return DB::table('reçoi_lists')
        //  ->where('Type','=',$type)
            ->where(['Users' => Auth()->user()->agencies_id])
            ->paginate($paginate);
    }
    public function liste_preparation($paginate, $type)
    {
        return DB::table('preparation_listes')
            ->where('Type','!=',$type)
            ->where('Users', Auth()->user()->agencies_id)
            ->paginate($paginate);
    }
}
