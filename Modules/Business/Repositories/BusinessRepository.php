<?php

namespace Modules\Business\Repositories;

use Modules\Business\Entities\Business;
use App\Repositories\BaseRepository;

/**
 * Class BusinessRepository
 * @package Modules\Business\Repositories
 * @version November 27, 2020, 6:42 pm UTC
*/

class BusinessRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'is_verified',
        'status',
        'business_code',
        'userid'
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
        return Business::class;
    }
}
