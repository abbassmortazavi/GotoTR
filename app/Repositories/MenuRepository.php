<?php

namespace App\Repositories;

use App\Models\Menu;
use App\Repositories\BaseRepository;

/**
 * Class MenuRepository
 * @package App\Repositories
 * @version December 11, 2020, 2:22 pm UTC
*/

class MenuRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'menuable_type',
        'menuable_id'
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
        return Menu::class;
    }
}
