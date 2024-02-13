<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class pwdreset
 * @package App\Models
 * @version August 3, 2021, 9:53 am UTC
 *
 * @property string $info
 * @property string $type
 * @property string $userid
 * @property string $email
 * @property string $guid
 */
class pwdreset extends Model
{


    public $table = 'pwdresets';
    



    public $fillable = [
        'info',
        'type',
        'userid',
        'email',
        'guid'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'info' => 'string',
        'type' => 'string',
        'userid' => 'string',
        'email' => 'string',
        'guid' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
