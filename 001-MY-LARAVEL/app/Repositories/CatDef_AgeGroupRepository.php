<?php

namespace App\Repositories;

use App\Models\CatDef_AgeGroup;
use App\Repositories\BaseRepository;

/**
 * Class CatDef_AgeGroupRepository
 * @package App\Repositories
 * @version April 13, 2021, 6:05 pm UTC
*/

class CatDef_AgeGroupRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'brid',
        'optionval',
        'parent'
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
        return CatDef_AgeGroup::class;
    }
}
