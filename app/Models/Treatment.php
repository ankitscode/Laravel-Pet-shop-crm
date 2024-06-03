<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
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

        //laravel accessors
        protected function treatment(): Attribute
        {
            return Attribute::make(
                get: fn (string $value) => ucfirst($value),
            );
        }
    
        protected function note(): Attribute
        {
            return Attribute::make(
                get: fn (string $value) => ucfirst($value),
            );
        }
    
        protected function name(): Attribute
        {
            return Attribute::make(
                get: fn (string $value) => ucfirst($value),
            );
        }
    
        public function getCreatedAtAttribute($value)
        {
            return Carbon::parse($value)->format('Y-m-d H:i:s');
        }
        
        public function getUpdatedAtAttribute($value)
        {
            return Carbon::parse($value)->format('Y-m-d H:i:s');
        }
    }
    

