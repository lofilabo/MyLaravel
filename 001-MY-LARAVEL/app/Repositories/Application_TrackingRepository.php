<?php

namespace App\Repositories;

use App\Models\Application_Tracking;
use App\Repositories\BaseRepository;

/**
 * Class Application_TrackingRepository
 * @package App\Repositories
 * @version October 8, 2021, 3:01 pm UTC
*/

class Application_TrackingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'bruid',
        'candidates',
        'columns',
        'columnOrder',
        'user_id',
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
        return Application_Tracking::class;
    }
}
