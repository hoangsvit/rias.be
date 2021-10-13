<?php

namespace App\Console;

use App\Console\Commands\LinkInvoicesToPayoutsCommand;
use App\Console\Commands\SyncPaymentsToAccountableCommand;
use App\Console\Commands\SyncStripePaymentsCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command(SyncStripePaymentsCommand::class)->hourly();
        $schedule->command(SyncPaymentsToAccountableCommand::class)->hourly();
        $schedule->command(LinkInvoicesToPayoutsCommand::class)->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
