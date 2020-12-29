<?php

namespace Modules\Business\Entities;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class OrderItem
 * @package Modules\Business\Entities
 * @version December 18, 2020, 8:47 pm UTC
 *
 * @property integer $order_id
 * @property string $orderable_type
 * @property integer $orderable_id
 * @property integer $count
 * @property integer $item_price
 * @property integer $total_price
 * @property integer $campaing_id
 * @property integer $item_price_after_discount
 */
class OrderItem extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'order_items';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'order_id',
        'orderable_type',
        'orderable_id',
        'count',
        'item_price',
        'total_price',
        'campaing_id',
        'item_price_after_discount'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'order_id' => 'integer',
        'orderable_type' => 'string',
        'orderable_id' => 'integer',
        'count' => 'integer',
        'item_price' => 'integer',
        'total_price' => 'integer',
        'campaing_id' => 'integer',
        'item_price_after_discount' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'order_id' => 'required',
        'orderable_type' => 'required',
        'orderable_id' => 'required',
        'count' => 'required',
        'item_price' => 'required',
        'total_price' => 'required',
        'campaing_id' => 'required',
        'item_price_after_discount' => 'required'
    ];

    
}
