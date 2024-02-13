<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class status
 * @package App\Models
 * @version December 8, 2023, 1:36 pm UTC
 *
 * @property string $info
 */
class status extends Model
{


    public $table = 'statuses';
    



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
