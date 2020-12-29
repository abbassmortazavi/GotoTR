<?php

namespace Database\Factories;

use Modules\Business\Entities\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'total_price' => $this->faker->randomDigitNotNull,
        'total_item_price' => $this->faker->randomDigitNotNull,
        'delivery_price' => $this->faker->randomDigitNotNull,
        'total_price_after_disco' => $this->faker->randomDigitNotNull,
        'unt' => $this->faker->word,
        'status' => $this->faker->randomDigitNotNull,
        'item_count' => $this->faker->randomDigitNotNull,
        'restaurant_approved_at' => $this->faker->word,
        'description' => $this->faker->text,
        'owner_id' => $this->faker->randomDigitNotNull,
        'owner_type' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
