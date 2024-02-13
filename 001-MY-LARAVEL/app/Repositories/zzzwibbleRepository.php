<?php

namespace App\Repositories;

use App\Models\zzzwibble;
use App\Repositories\BaseRepository;

/**
 * Class zzzwibbleRepository
 * @package App\Repositories
 * @version January 29, 2024, 3:56 pm UTC
*/

class zzzwibbleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'info',
        'note'
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
        return zzzwibble::class;
    }
}
