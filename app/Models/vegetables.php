<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use OpenApi\Annotations as OA;

/**
 * Class vegetables.
 * 
 * @author  Hilkia Boanerges <hilkia.422021018@civitas.ukrida.ac.id>
 * 
 * @OA\Schema(
 *     description="vegetables model",
 *     title="vegetables model",
 *     required={"title", "author"},
 *     @OA\Xml(
 *         name="vegetables"
 *     )
 * )
 */

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