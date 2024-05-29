<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;
    protected $table = 'pets';
    protected $primary_key = 'id';
   
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public $timestamps = false;

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class,'treatments','pet_id', 'doc_id');
    }
    public function treatments()
    {
        return $this->hasMany(Treatment::class, 'pet_id', 'id');
    }
}