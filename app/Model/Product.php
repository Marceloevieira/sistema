<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{

	use SoftDeletes;

    protected $table = "products";

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description', 'type_id', 'group_id','um_id','um2_id','warehouse_id','conversion_factor','conversion_type','image'
    ];

     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Get the product tipo
     *
     * @param  string  $value
     * @return string
     */
    public function getType()
    {
        
        $tipos =     

        $TypeOfProduct = TypeOfProduct::find($this->type_id);    

        return $TypeOfProduct->description;
    }



    /**
     * Get the product tipo
     *
     * @param  string  $value
     * @return string
     */
    public function getGroup()
    {
        $ProductGroup = ProductGroup::find($this->group_id); 
        
        return $ProductGroup->description;
    }



       /**
     * Get the product tipo
     *
     * @param  string  $value
     * @return string
     */
    public function getUM()
    {
        $UnitOfMeasure = UnitOfMeasure::find($this->um_id); 
        
        return $UnitOfMeasure->description;
    }
}
