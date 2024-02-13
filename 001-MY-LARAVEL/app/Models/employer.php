<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class employer
 * @package App\Models
 * @version May 25, 2021, 2:22 pm UTC
 *
 * @property string $userid
 * @property string $f1
 * @property string $f2
 * @property string $f3
 * @property string $f4
 * @property string $f5
 * @property string $f6
 * @property string $f7
 * @property string $f8
 * @property string $f9
 * @property string $t1
 * @property string $t2
 * @property string $t3
 * @property string $t4
 * @property string $t5
 * @property string $t6
 * @property string $t7
 * @property string $t8
 * @property string $t9
 */
class employer extends Model
{


    public $table = 'employers';




    public $fillable = [
        'userid',
        'contact_name',
        'contact_email',
        'contact_phone_no',
        'company',
        'registered_address',
        'registered_company_no',
        'billing_address',
        'vat_number',
        'website',
        'logo_file',
        'about_us',
        'password',
        't3',
        't4',
        't5',
        't6',
        't7',
        't8',
        't9'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'userid' => 'string',
        'contact_name' => 'string',
        'contact_email' => 'string',
        'contact_phone_no' => 'string',
        'company' => 'string',
        'registered_address' => 'string',
        'registered_company_no' => 'string',
        'billing_address' => 'string',
        'vat_number' => 'string',
        'website' => 'string',
        'logo_file' => 'string',
        'about_us' => 'string',
        'password' => 'string',
        't2' => 'string',
        't3' => 'string',
        't4' => 'string',
        't5' => 'string',
        't6' => 'string',
        't7' => 'string',
        't8' => 'string',
        't9' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
