<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodsStore extends Model
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule the schedule
     *
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule = null;
    }
}
