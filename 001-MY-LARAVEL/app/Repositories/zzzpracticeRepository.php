<?php

namespace App\Repositories;

use App\Models\zzzpractice;
use App\Repositories\BaseRepository;

/**
 * Class zzzpracticeRepository
 * @package App\Repositories
 * @version January 26, 2024, 4:02 pm UTC
*/

class zzzpracticeRepository extends BaseRepository
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
        return zzzpractice::class;
    }
}
