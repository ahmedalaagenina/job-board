<?php

namespace App\Models;

class Job
{
    public static function getMockData()
    {
        return [
            [
                'id' => 1,
                'title' => 'Software Engineer',
                'description' => 'Develop and maintain software applications.',
                'location' => 'New York, NY',
                'salary' => '$80,000 - $120,000',
            ],
            [
                'id' => 2,
                'title' => 'Data Analyst',
                'description' => 'Analyze data to provide insights for business decisions.',
                'location' => 'San Francisco, CA',
                'salary' => '$70,000 - $100,000',
            ],
            [
                'id' => 3,
                'title' => 'Project Manager',
                'description' => 'Oversee project timelines and deliverables.',
                'location' => 'Chicago, IL',
                'salary' => '$90,000 - $130,000',
            ],
        ];
    }
}
