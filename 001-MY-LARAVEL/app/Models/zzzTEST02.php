<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class zzzTEST02
 * @package App\Models
 * @version January 26, 2024, 3:56 pm UTC
 *
 * @property string $info
 */
class zzzTEST02 extends Model
{


    public $table = 'zzz_t_e_s_t02s';
    



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
