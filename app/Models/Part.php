<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;
use Illuminate\Database\Eloquent\SoftDeletes;

class Part extends Model
{
    use HasFactory, SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'name', 
         'serialnumber', 
         'car_id'
    ];


    /**
     * BelongsTo relationship to retrieve Car
     */
    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id');  // create belongs to relationship with the car model connected by the car_id
    }

}
