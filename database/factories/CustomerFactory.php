<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;


class AdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => 'Didarul Islam',
            'last_name' => 'Akand',
            'email' => 'didarul@gmail.com',
            'phone' => '01777919189',
            'address' => 'Jatrabari, Dhaka',
            'post_code' => '1320',
            'city' => 'Dhaka',
            'country' => 'Bangladesh',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'status' => '1',
        ];
    }
}
