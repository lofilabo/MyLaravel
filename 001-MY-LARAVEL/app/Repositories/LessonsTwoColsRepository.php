<?php

namespace App\Repositories;

use App\Models\LessonsTwoCols;
use App\Repositories\BaseRepository;

/**
 * Class LessonsTwoColsRepository
 * @package App\Repositories
 * @version April 22, 2021, 3:19 pm UTC
*/

class LessonsTwoColsRepository extends BaseRepository
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
        'author',
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
        return LessonsTwoCols::class;
    }
}
