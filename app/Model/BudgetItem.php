<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BudgetItem extends Model
{
 	use SoftDeletes;

    protected $table = "budget_items";

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'budget_id','product_id','amount','unitary_value','total_value','discount' ];

     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
