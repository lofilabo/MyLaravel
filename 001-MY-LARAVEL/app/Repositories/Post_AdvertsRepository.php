<?php

namespace App\Repositories;

use App\Models\Post_Adverts;
use App\Repositories\BaseRepository;

/**
 * Class Post_AdvertsRepository
 * @package App\Repositories
 * @version October 14, 2021, 11:12 am UTC
*/

class Post_AdvertsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'job_title',
        'client',
        'location',
        'countryCode',
        'category',
        'industry',
        'number_of_positions',
        'contract_duration',
        'contract_type',
        'minimum_salary',
        'maximum_salary',
        'currency',
        'payment_cycle',
        'job_description',
        'employer_id',
        'extref2',
        'extref3',
        'exfield0',
        'exfield1',
        'exfield2',
        'exfield3'
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
        return Post_Adverts::class;
    }
}
