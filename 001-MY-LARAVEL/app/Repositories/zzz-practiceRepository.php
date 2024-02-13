<?php

namespace App\Repositories;

use App\Models\zzz-practice;
use App\Repositories\BaseRepository;

/**
 * Class zzz-practiceRepository
 * @package App\Repositories
 * @version December 8, 2023, 1:41 pm UTC
*/

class zzz-practiceRepository extends BaseRepository
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
        return zzz-practice::class;
    }
}
