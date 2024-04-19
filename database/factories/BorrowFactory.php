<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Borrow>
 */
class BorrowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userCount = User::count();
        $bookCount = Book::count();

        return [
            'user_id' => $this->faker->numberBetween(1, $userCount),
            'book_id' => $this->faker->numberBetween(1, $bookCount),
            'borrowed_at' => $this->faker->dateTimeThisMonth,
            'returned_at' => null, // initially, no book is returned
        ];
    }

    public function returned(): self
    {
        return $this->state([
            'returned_at' => $this->faker->dateTimeBetween($this->faker->dateTimeThisMonth, 'now'),
        ]);
    }
}
