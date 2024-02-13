<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class basicdatas
 * @package App\Models
 * @version March 4, 2021, 3:28 pm UTC
 *
 * @property string $info
 * @property string $type
 */
class basicdatas extends Model
{


    public $table = 'basicdatas';
    



    public $fillable = [
        'info',
        'type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'info' => 'string',
        'type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'info' => 'required',
        'type' => 'required'
    ];

    
}
