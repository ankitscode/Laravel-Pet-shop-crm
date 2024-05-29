<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $table = 'doctors';
    protected $primary_key = 'id';


    public function pets(){
        return $this->belongsToMany(Pet::class,'treatments','doc_id','pet_id');
    }
    public function treatments()
    {
        return $this->hasMany(Treatment::class,'doc_id', 'id');
    }
}
