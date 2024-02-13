<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class pulldown1s
 * @package App\Models
 * @version March 4, 2021, 4:31 pm UTC
 *
 * @property string $brid
 * @property string $optionval
 */
class pulldown1s extends Model
{


    public $table = 'pulldown1s';
    



    public $fillable = [
        'brid',
        'optionval'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'brid' => 'string',
        'optionval' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
