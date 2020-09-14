<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Schema\Blueprint;
use App\User;

class ModelVeiculos extends Model
{ 
  
    use SoftDeletes;

    protected $table =    'veiculos';
    protected $fillable = ['id','proprietario','renavam','marca','modelo','ano','placa','created_at','updated_at','deleted_at'];
        
}
   
