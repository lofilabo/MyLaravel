<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class zzzpractice
 * @package App\Models
 * @version January 26, 2024, 4:02 pm UTC
 *
 * @property string $info
 */
class zzzpractice extends Model
{


    public $table = 'zzzpractices';
    



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
