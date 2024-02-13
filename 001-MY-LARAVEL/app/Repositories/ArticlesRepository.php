<?php

namespace App\Repositories;

use App\Models\Articles;
use App\Repositories\BaseRepository;

/**
 * Class ArticlesRepository
 * @package App\Repositories
 * @version March 23, 2021, 1:29 pm UTC
*/

class ArticlesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'bruid',
        'title',
        'body',
        'summary',
        'exfield1',
        'exfield2',
        'exfield3',
        'exfield4',
        'extref1',
        'extref2',
        'extref3',
        'extref4',
        'extref5',
        'posteddate',
        'posteddatetext'
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
        return Articles::class;
    }
}
