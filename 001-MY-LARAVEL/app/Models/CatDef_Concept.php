<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class CatDef_Concept
 * @package App\Models
 * @version April 13, 2021, 6:05 pm UTC
 *
 * @property string $brid
 * @property string $optionval
 * @property string $parent
 */
class CatDef_Concept extends Model
{


    public $table = 'cat_def__concepts';
    



    public $fillable = [
        'brid',
        'optionval',
        'parent'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'brid' => 'string',
        'optionval' => 'string',
        'parent' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
