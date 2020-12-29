<?php

namespace Modules\Business\Repositories;

use Modules\Business\Entities\OrderItem;
use App\Repositories\BaseRepository;

/**
 * Class OrderItemRepository
 * @package Modules\Business\Repositories
 * @version December 18, 2020, 8:47 pm UTC
*/

class OrderItemRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'order_id',
        'orderable_type',
        'orderable_id',
        'count',
        'item_price',
        'total_price',
        'campaing_id',
        'item_price_after_discount'
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
        return OrderItem::class;
    }
}
