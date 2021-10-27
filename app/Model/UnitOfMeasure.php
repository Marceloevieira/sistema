<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UnitOfMeasure extends Model
{
 	use SoftDeletes;

    protected $table = "units_of_measure";

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'measured_unit','description'
    ];

     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
