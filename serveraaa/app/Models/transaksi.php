<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class transaksi extends Model
{
    use HasFactory, SoftDeletes;
    /**
     *
     *  @var array
     */
    protected $fillable = [
        'users_id',
        'type_id',
        'price',
        'status',
        'payment',

    ];
    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function kosan(){
        return $this->hasOne(Kosan::class, 'id', 'type_id');
    }

}
