<?php

namespace App\Repositories;

use App\Models\testfield3s;
use App\Repositories\BaseRepository;

/**
 * Class testfield3sRepository
 * @package App\Repositories
 * @version March 7, 2021, 4:44 pm UTC
*/

class testfield3sRepository extends BaseRepository
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
        return testfield3s::class;
    }
}
