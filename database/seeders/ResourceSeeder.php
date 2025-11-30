<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Resource;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $resources = [
            [
                'title' => 'What is Clean Energy? (United Nations)',
                'type' => 'article',
                'url' => 'https://www.un.org/sustainabledevelopment/energy/',
                'description' => 'An official overview of SDG 7 and the global push toward affordable and clean energy.'
            ],
            [
                'title' => 'How Solar Panels Work',
                'type' => 'video',
                'url' => 'https://www.youtube.com/watch?v=ZzCjZb8mFwM',
                'description' => 'A simple explanation of how solar photovoltaic systems convert sunlight into electricity.'
            ],

            [
                'title' => 'Understanding SDG 7',
                'type' => 'article',
                'description' => 'The United Nations goal for affordable and clean energy explained in simple terms.',
                'url' => 'https://sdgs.un.org/goals/goal7',
            ],
            [
                'title' => 'Global Energy Map',
                'type' => 'tool',
                'description' => 'Interactive map showing energy consumption and production by country.',
                'url' => 'https://ourworldindata.org/energy',
            ],
            [
                'title' => 'Top 10 Energy Saving Tips',
                'type' => 'article',
                'description' => 'Practical steps you can take today to lower your bill.',
                'url' => 'https://energysavingtrust.org.uk/hub/quick-tips-to-save-energy',
            ],
            [
                'title' => 'Wind Power 101',
                'type' => 'video',
                'description' => 'Everything you need to know about wind turbines.',
                'url' => 'https://www.youtube.com/watch?v=xy9nj94xvKA',
            ],
            [
                'title' => 'Household Appliance Calculator',
                'type' => 'tool',
                'description' => 'Calculate how much energy your fridge, TV, and AC use.',
                'url' => 'https://www.omnicalculator.com/everyday-life/appliance-wattage',
            ],
        ];

        foreach ($resources as $resource) {
            Resource::create($resource);
        }
    }
}
