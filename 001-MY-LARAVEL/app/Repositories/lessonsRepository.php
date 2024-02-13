<?php

namespace App\Repositories;

use App\Models\lessons;
use App\Repositories\BaseRepository;

/**
 * Class lessonsRepository
 * @package App\Repositories
 * @version April 8, 2021, 10:19 am UTC
*/

class lessonsRepository extends BaseRepository
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
        return lessons::class;
    }
}
