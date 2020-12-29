<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Menu
 * @package App\Models
 * @version December 11, 2020, 2:22 pm UTC
 *
 * @property string $title
 * @property string $menuable_type
 * @property integer $menuable_id
 */
class Menu extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'menus';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'menuable_type',
        'menuable_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'menuable_type' => 'string',
        'menuable_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'menuable_id' => 'required'
    ];

    
}
