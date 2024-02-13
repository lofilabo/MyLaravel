<?php

namespace App\Repositories;

use App\Models\testfield1s;
use App\Repositories\BaseRepository;

/**
 * Class testfield1sRepository
 * @package App\Repositories
 * @version March 7, 2021, 4:43 pm UTC
*/

class testfield1sRepository extends BaseRepository
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
        return testfield1s::class;
    }
}
