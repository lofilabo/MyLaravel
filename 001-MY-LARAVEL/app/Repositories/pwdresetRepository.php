<?php

namespace App\Repositories;

use App\Models\pwdreset;
use App\Repositories\BaseRepository;

/**
 * Class pwdresetRepository
 * @package App\Repositories
 * @version August 3, 2021, 9:53 am UTC
*/

class pwdresetRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'info',
        'type',
        'userid',
        'email',
        'guid'
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
        return pwdreset::class;
    }
}
