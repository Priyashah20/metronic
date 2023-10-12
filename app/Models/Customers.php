<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
    protected $table    = 'customers';
    protected $guarded  = ['id'];
    protected $fillable = ['firstname','lastname','surname','email','mobile','date_of_birth','date_of_anniversary'];


    public function scopeActive($p){
        $p->where('status','0');
    }
    public function scopeStatus($q){
        $q->where('status','!=','2');
    }

}


