<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'tb_m_project';


    public function client(){
        return $this->belongsTo('App\Models\Client', 'client_id');
    }
}