<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class Articlecategories
 * @package App\Models
 * @version March 23, 2021, 7:12 pm UTC
 *
 * @property string $brid
 * @property string $optionval
 * @property string $parent
 */
class Articlecategories extends Model
{


    public $table = 'articlecategories';
    



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
