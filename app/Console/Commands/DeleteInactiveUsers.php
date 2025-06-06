<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;


class DeleteInactiveUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-inactive-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete inactive users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::where('is_active', false)->limit(5)->get();

        if (!$users > 0) {
            $this->info('No inactive users found to delete.');
            return;
        }
        // delete inactive users
        foreach ($users as $user) {
            $user->delete();
        }
        $this->info("Successfully deleted inactive users.");
        return;
    }
}
