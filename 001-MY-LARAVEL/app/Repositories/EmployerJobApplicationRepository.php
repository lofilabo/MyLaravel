<?php

namespace App\Repositories;

use App\Models\EmployerJobApplication;
use App\Repositories\BaseRepository;

/**
 * Class EmployerJobApplicationRepository
 * @package App\Repositories
 * @version August 5, 2021, 12:43 pm UTC
*/

class EmployerJobApplicationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return EmployerJobApplication::class;
    }
}
