<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InstallVIS extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vis:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will install the VIS into system';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // do a fresh migration
	    $this->info('Setting up a fresh VIS installation' . "\n");

	    $main = $this->output->createProgressBar(3);

	    $this->info('Migrating database...' . "\n");
	    $this->call('migrate:fresh');
	    $main->advance();
	    $this->info(' Migration finished');

	    $this->info("\nSeeding data into database\n");
	    $this->call('db:seed');
	    $main->advance();
	    $this->info(' Seeding finished');

	    $this->line('');

	    // create storage links
	    $this->info('Creating symlinks');
	    $this->call('storage:link');
		$main->advance();
		$this->info("Done creating storage symlinks\n");

	    $this->info('Installing VIS done');

	    return 0;
    }
}
