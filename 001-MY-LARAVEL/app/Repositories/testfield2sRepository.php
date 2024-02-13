<?php

namespace App\Repositories;

use App\Models\testfield2s;
use App\Repositories\BaseRepository;

/**
 * Class testfield2sRepository
 * @package App\Repositories
 * @version March 7, 2021, 4:44 pm UTC
*/

class testfield2sRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'info',
        'type'
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
        return testfield2s::class;
    }
}
