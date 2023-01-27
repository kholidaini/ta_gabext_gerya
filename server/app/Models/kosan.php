<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kosan extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'description',
        'tags',
        'kosan_type_id',

    ];

    public function fotokosans(){
        return $this->hasMany(FotoKosan::class, 'kosan_id', 'id');

    }

    public function kosantype(){
        return $this->belongsTo(KosanType::class, 'kosan_type_id', 'id');
    }
}
