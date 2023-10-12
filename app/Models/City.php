<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table    ='cities_tables';
    protected $guarded  = ['id'];
    protected $fillable = ['city'];

    public function scopeActive($p){
        $p->where('status','0');
    }
    public function scopeStatus($q){
        $q->where('status','!=','2');
    }

}
