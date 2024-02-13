<?php

namespace App\Repositories;

use App\Models\zzznibble;
use App\Repositories\BaseRepository;

/**
 * Class zzznibbleRepository
 * @package App\Repositories
 * @version January 29, 2024, 3:25 pm UTC
*/

class zzznibbleRepository extends BaseRepository
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
        return zzznibble::class;
    }
}
