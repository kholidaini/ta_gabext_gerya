<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class kosan extends Model
{
    use HasFactory, SoftDeletes;


    /**
     *
     *  @var array
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'tags',
        'type_id',


    ];
    public function foto_kosan(){
        return $this->hasMany(Foto_kosan::class, 'type_id', 'id');
    }

    public function kosan_type(){
        return $this->belongsTo(Kosantype::class, 'type_id', 'id');
    }
}
