<?php

namespace App\Repositories;

use App\Models\zzzTEST02;
use App\Repositories\BaseRepository;

/**
 * Class zzzTEST02Repository
 * @package App\Repositories
 * @version January 26, 2024, 3:56 pm UTC
*/

class zzzTEST02Repository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'info'
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
        return zzzTEST02::class;
    }
}
