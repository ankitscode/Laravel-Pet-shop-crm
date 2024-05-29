<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;
    
    protected $table = 'treatments';

   
        public function pets()
        {
            return $this->belongsTo(Pet::class, 'pet_id');
        }
    
        public function doctors()
        {
            return $this->belongsTo(Doctor::class, 'doc_id');
        }
    }
    

