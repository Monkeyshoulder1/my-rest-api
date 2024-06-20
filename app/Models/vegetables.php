<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class vegetables extends Model
{
    // use HasFactory;
    use SoftDeletes;
    protected $table = 'vegetables';
    protected $fillable = [
        'name',
        'type',
        'quantity',
        'country',
        'price',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

public function data_adder(){
    return $this->belongsTo(User::class, 'created_by', 'id');
  }
}