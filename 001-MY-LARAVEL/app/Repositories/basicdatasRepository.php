<?php

namespace App\Repositories;

use App\Models\basicdatas;
use App\Repositories\BaseRepository;

/**
 * Class basicdatasRepository
 * @package App\Repositories
 * @version March 4, 2021, 3:28 pm UTC
*/

class basicdatasRepository extends BaseRepository
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
        return basicdatas::class;
    }
}
