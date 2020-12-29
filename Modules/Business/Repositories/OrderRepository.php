<?php

namespace Modules\Business\Repositories;

use Modules\Business\Entities\Order;
use App\Repositories\BaseRepository;

/**
 * Class OrderRepository
 * @package Modules\Business\Repositories
 * @version December 18, 2020, 8:42 pm UTC
*/

class OrderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'total_price',
        'total_item_price',
        'delivery_price',
        'total_price_after_disco',
        'unt',
        'status',
        'item_count',
        'restaurant_approved_at',
        'description',
        'owner_id',
        'owner_type'
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
        return Order::class;
    }
}
