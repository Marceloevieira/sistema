<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductGroup extends Model
{
 	use SoftDeletes;

    protected $table = "product_group";

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description'
    ];

     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
