<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class zzznibble
 * @package App\Models
 * @version January 29, 2024, 3:25 pm UTC
 *
 * @property string $info
 * @property string $note
 */
class zzznibble extends Model
{


    public $table = 'zzznibbles';
    



    public $fillable = [
        'info',
        'note'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'info' => 'string',
        'note' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'info' => 'required',
        'note' => 'required'
    ];

    
}
