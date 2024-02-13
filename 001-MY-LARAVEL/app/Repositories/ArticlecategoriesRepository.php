<?php

namespace App\Repositories;

use App\Models\Articlecategories;
use App\Repositories\BaseRepository;

/**
 * Class ArticlecategoriesRepository
 * @package App\Repositories
 * @version March 23, 2021, 7:12 pm UTC
*/

class ArticlecategoriesRepository extends BaseRepository
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
        return Articlecategories::class;
    }
}
