<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usertype extends Model
{
    use HasFactory;
    protected $table    = 'user_role_type';
    protected $guarded  = ['id'];
    protected $fillable = ['role','status'];

    public function scopeActive($p){
        $p->where('status','0');
    }
    public function scopeStatus($q){
        $q->where('status','!=','2');
    }
}

