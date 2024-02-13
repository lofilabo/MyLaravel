<?php

namespace App\Repositories;

use App\Models\status;
use App\Repositories\BaseRepository;

/**
 * Class statusRepository
 * @package App\Repositories
 * @version December 8, 2023, 1:36 pm UTC
*/

class statusRepository extends BaseRepository
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
        return status::class;
    }
}
