<?php

namespace Modules\Business\Entities;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Business
 * @package Modules\Business\Entities
 * @version November 27, 2020, 6:42 pm UTC
 *
 * @property string $title
 * @property boolean $is_verified
 * @property string $status
 * @property string $business_code
 * @property unsignedInteger $userid
 */
class Business extends Model
{
    use SoftDeletes;

    public $table = 'businesses';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'is_verified',
        'status',
        'business_code',
        'userid'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'is_verified' => 'boolean',
        'status' => 'string',
        'business_code' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'status' => 'required',
        'business_code' => 'required',
        'userid' => 'required'
    ];

    
}
