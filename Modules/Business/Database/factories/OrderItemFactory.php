<?php

namespace Database\Factories;

use Modules\Business\Entities\OrderItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_id' => $this->faker->randomDigitNotNull,
        'orderable_type' => $this->faker->word,
        'orderable_id' => $this->faker->randomDigitNotNull,
        'count' => $this->faker->randomDigitNotNull,
        'item_price' => $this->faker->randomDigitNotNull,
        'total_price' => $this->faker->randomDigitNotNull,
        'campaing_id' => $this->faker->randomDigitNotNull,
        'item_price_after_discount' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
