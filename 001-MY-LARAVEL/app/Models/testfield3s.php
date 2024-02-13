<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class testfield3s
 * @package App\Models
 * @version March 7, 2021, 4:44 pm UTC
 *
 * @property string $info
 * @property string $type
 */
class testfield3s extends Model
{


    public $table = 'testfield3s';
    



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
