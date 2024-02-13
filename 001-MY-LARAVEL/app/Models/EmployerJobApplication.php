<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class EmployerJobApplication
 * @package App\Models
 * @version August 5, 2021, 12:43 pm UTC
 *
 * @property string $userid
 * @property string $employerid
 * @property string $jobid
 * @property string $job_bruid
 * @property string $progress
 * @property string $t1
 * @property string $t2
 * @property string $t3
 * @property string $t4
 * @property string $t5
 * @property string $t6
 * @property string $t7
 * @property string $t8
 * @property string $t9
 * @property string $exref0
 * @property string $exref1
 * @property string $exref2
 * @property string $exref3
 * @property string $exref4
 * @property string $exref5
 * @property string $exref6
 * @property string $exref7
 * @property string $exref8
 * @property string $exref9
 */
class EmployerJobApplication extends Model
{


    public $table = 'employer_job_applications';
    



    public $fillable = [
        'userid',
        'employerid',
        'jobid',
        'job_bruid',
        'progress',
        't1',
        't2',
        't3',
        't4',
        't5',
        't6',
        't7',
        't8',
        't9',
        'exref0',
        'exref1',
        'exref2',
        'exref3',
        'exref4',
        'exref5',
        'exref6',
        'exref7',
        'exref8',
        'exref9'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'userid' => 'string',
        'employerid' => 'string',
        'jobid' => 'string',
        'job_bruid' => 'string',
        'progress' => 'string',
        't1' => 'string',
        't2' => 'string',
        't3' => 'string',
        't4' => 'string',
        't5' => 'string',
        't6' => 'string',
        't7' => 'string',
        't8' => 'string',
        't9' => 'string',
        'exref0' => 'string',
        'exref1' => 'string',
        'exref2' => 'string',
        'exref3' => 'string',
        'exref4' => 'string',
        'exref5' => 'string',
        'exref6' => 'string',
        'exref7' => 'string',
        'exref8' => 'string',
        'exref9' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
