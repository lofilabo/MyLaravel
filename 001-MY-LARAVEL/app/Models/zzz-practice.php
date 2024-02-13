<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class zzz-practice
 * @package App\Models
 * @version December 8, 2023, 1:41 pm UTC
 *
 * @property string $info
 */
class zzz-practice extends Model
{


    public $table = 'zzz-practices';
    



    public $fillable = [
        'info'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'info' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'info' => 'required'
    ];

    
}
