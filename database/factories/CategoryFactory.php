<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = fake()->sentence(mt_rand(1, 3));
        $slug = $this->generateSlug($title);
        return [
            'title' => $title,
            'slug' => $slug,
        ];
    }
    protected function generateSlug($title)
    {
        // Remove special characters
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $title);

        // Convert to lowercase
        $slug = strtolower($slug);

        // Remove leading/trailing hyphens
        $slug = trim($slug, '-');

        // If slug is empty, use 'untitled'
        if (empty($slug)) {
            $slug = 'untitled';
        }

        return $slug;
    }
}
