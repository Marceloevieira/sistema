<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Budget extends Model
{
 	use SoftDeletes;

    protected $table = "budgets";

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        	'date','client_id','address','ddd','phone','payment_condition_id','deadline','expiration_date'
    ];

     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    /**
     * Get the budget_itens
     *
     * @param  string  $value
     * @return string
     */
    public function budget_items()
    {
        
        return $this->hasMany('App\Model\Budget_item');
    }

}
