<?php

namespace App\Repositories;

use App\Models\pulldown1s;
use App\Repositories\BaseRepository;

/**
 * Class pulldown1sRepository
 * @package App\Repositories
 * @version March 4, 2021, 4:31 pm UTC
*/

class pulldown1sRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'brid',
        'optionval'
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
        return pulldown1s::class;
    }
}
