<?php

namespace App\Repositories;

use App\Models\Employerjobs;
use App\Repositories\BaseRepository;

/**
 * Class EmployerjobsRepository
 * @package App\Repositories
 * @version May 21, 2021, 1:52 pm UTC
*/

class EmployerjobsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        'postcode'
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
        return Employerjobs::class;
    }
}
