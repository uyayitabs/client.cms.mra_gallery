<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class SetupLaravelVoyager extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'photo_gallery:setup_laravel_voyager';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup Laravel Voyager ./vendor/tcg files';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Copy files from ./storage/app/private/vendor/tcg & overwrite files in the ./vendor/tcg
        File::copyDirectory(storage_path('app/private/vendor/tcg'), base_path('vendor/tcg'));

        // Delete ./vendor/tcg/voyager/resources/views/users
        $voyagerUsersResourcesDir = base_path('vendor/tcg/voyager/resources/views/users');
        if (File::exists($voyagerUsersResourcesDir)) {
            File::deleteDirectory($voyagerUsersResourcesDir);
        }
    }
}
