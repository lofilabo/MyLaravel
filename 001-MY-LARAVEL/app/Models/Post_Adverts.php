<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Post_Adverts
 * @package App\Models
 * @version October 14, 2021, 11:12 am UTC
 *
 * @property string $job_title
 * @property string $client
 * @property string $location
 * @property string $countryCode
 * @property string $category
 * @property string $industry
 * @property string $number_of_positions
 * @property string $contract_duration
 * @property string $contract_type
 * @property string $minimum_salary
 * @property string $maximum_salary
 * @property string $currency
 * @property string $payment_cycle
 * @property string $job_description
 * @property string $extref1
 * @property string $extref2
 * @property string $extref3
 * @property string $exfield0
 * @property string $exfield1
 * @property string $exfield2
 * @property string $exfield3
 */
class Post_Adverts extends Model
{

    use HasFactory;

    public $table = 'post__adverts';




    public $fillable = [
        'job_title',
        'client',
        'location',
        'countryCode',
        'category',
        'industry',
        'number_of_positions',
        'contract_duration',
        'contract_type',
        'minimum_salary',
        'maximum_salary',
        'currency',
        'payment_cycle',
        'job_description',
        'employer_id',
        'extref2',
        'extref3',
        'exfield0',
        'exfield1',
        'exfield2',
        'exfield3'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'job_title' => 'string',
        'client' => 'string',
        'location' => 'string',
        'countryCode' => 'string',
        'category' => 'string',
        'industry' => 'string',
        'number_of_positions' => 'string',
        'contract_duration' => 'string',
        'contract_type' => 'string',
        'minimum_salary' => 'string',
        'maximum_salary' => 'string',
        'currency' => 'string',
        'payment_cycle' => 'string',
        'job_description' => 'string',
        'employer_id' => 'string',
        'extref2' => 'string',
        'extref3' => 'string',
        'exfield0' => 'string',
        'exfield1' => 'string',
        'exfield2' => 'string',
        'exfield3' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'job_title' => 'required',
        'location' => 'required',
        'countryCode' => 'required',
        'category' => 'required',
        'contract_duration' => 'required',
        'job_description' => 'required'
    ];


}
