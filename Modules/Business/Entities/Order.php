<?php

namespace Modules\Business\Entities;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Order
 * @package Modules\Business\Entities
 * @version December 18, 2020, 8:42 pm UTC
 *
 * @property integer $total_price
 * @property integer $total_item_price
 * @property integer $delivery_price
 * @property integer $total_price_after_disco
 * @property string $unt
 * @property integer $status
 * @property integer $item_count
 * @property string $restaurant_approved_at
 * @property string $description
 * @property integer $owner_id
 * @property string $owner_type
 */
class Order extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'orders';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'total_price',
        'total_item_price',
        'delivery_price',
        'total_price_after_disco',
        'unt',
        'status',
        'item_count',
        'restaurant_approved_at',
        'description',
        'owner_id',
        'owner_type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'total_price' => 'integer',
        'total_item_price' => 'integer',
        'delivery_price' => 'integer',
        'total_price_after_disco' => 'integer',
        'unt' => 'string',
        'status' => 'integer',
        'item_count' => 'integer',
        'restaurant_approved_at' => 'string',
        'description' => 'string',
        'owner_id' => 'integer',
        'owner_type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'total_price' => 'required',
        'total_item_price' => 'required',
        'delivery_price' => 'required',
        'total_price_after_disco' => 'required',
        'status' => 'required',
        'item_count' => 'required',
        'restaurant_approved_at' => 'required',
        'owner_id' => 'required',
        'owner_type' => 'required'
    ];

    
}
