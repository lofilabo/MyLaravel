<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class Employerjobs
 * @package App\Models
 * @version May 21, 2021, 1:52 pm UTC
 *
 * @property string $bruid
 * @property string $employerid
 * @property string $employerloginname
 * @property string $jobtitle
 * @property string $jobdescription
 * @property string $pitch
 * @property string $salary
 * @property string $employer
 * @property string $company
 * @property string $category
 * @property string $geo_lat
 * @property string $heo_lon
 * @property string $city
 * @property string $state
 * @property string $postcode
 */
class Employerjobs extends Model
{


    public $table = 'employerjobs';
    



    public $fillable = [
        'bruid',
        'employerid',
        'employerloginname',
        'jobtitle',
        'jobdescription',
        'pitch',
        'salary',
        'employer',
        'company',
        'category',
        'geo_lat',
        'heo_lon',
        'city',
        'state',
        'd1',
        'd2',
        'd3',
        'd4',
        'd5',
        'postcode'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'bruid' => 'string',
        'employerid' => 'string',
        'employerloginname' => 'string',
        'jobtitle' => 'string',
        'jobdescription' => 'string',
        'pitch' => 'string',
        'salary' => 'string',
        'employer' => 'string',
        'company' => 'string',
        'category' => 'string',
        'geo_lat' => 'string',
        'heo_lon' => 'string',
        'city' => 'string',
        'state' => 'string',
        'd1' => 'string',
        'd2' => 'string',
        'd3' => 'string',
        'd4' => 'string',
        'd5' => 'string',
        'postcode' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
