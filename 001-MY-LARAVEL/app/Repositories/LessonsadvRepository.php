<?php

namespace App\Repositories;

use App\Models\Lessonsadv;
use App\Repositories\BaseRepository;

/**
 * Class LessonsadvRepository
 * @package App\Repositories
 * @version October 6, 2021, 3:02 pm UTC
*/

class LessonsadvRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'bruid',
        'title',
        'summary',
        'tasks',
        'columns',
        'columnOrder',
        'extref1',
        'extref2',
        'extref3',
        'extref4',
        'extref5',
        'exfield0',
        'exfield1',
        'exfield2',
        'exfield3',
        'exfield4',
        'author'
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
        return Lessonsadv::class;
    }
}
