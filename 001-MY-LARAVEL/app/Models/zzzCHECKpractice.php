<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class zzzCHECKpractice
 * @package App\Models
 * @version January 26, 2024, 3:52 pm UTC
 *
 * @property string $info
 */
class zzzCHECKpractice extends Model
{


    public $table = 'zzz_c_h_e_c_kpractices';
    



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
