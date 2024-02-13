<?php

namespace App\Repositories;

use App\Models\zzzCHECKpractice;
use App\Repositories\BaseRepository;

/**
 * Class zzzCHECKpracticeRepository
 * @package App\Repositories
 * @version January 26, 2024, 3:52 pm UTC
*/

class zzzCHECKpracticeRepository extends BaseRepository
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
        return zzzCHECKpractice::class;
    }
}
