<?php

namespace App\Repositories;

use App\Models\employer;
use App\Repositories\BaseRepository;

/**
 * Class employerRepository
 * @package App\Repositories
 * @version May 25, 2021, 2:22 pm UTC
*/

class employerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'userid',
        'contact_name',
        'contact_email',
        'contact_phone_no',
        'company',
        'registered_address',
        'registered_company_no',
        'billing_address',
        'vat_number',
        'website',
        'logo_file',
        'about_us',
        'password',
        't3',
        't4',
        't5',
        't6',
        't7',
        't8',
        't9'
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
        return employer::class;
    }
}
