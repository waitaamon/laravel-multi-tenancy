<?php

namespace App\Console\Commands\Tenant;

use Illuminate\Console\Command;
use Illuminate\Database\Console\Migrations\MigrateCommand;
use Illuminate\Database\Migrations\Migrator;

class Migrate extends MigrateCommand
{
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run migration for tenants';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Migrator $migrator)
    {
        parent::__construct($migrator);
        $this->setName('tenants:migrate');
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if(!$this->confirmToProceed()) {
            return;
        }

        parent::handle();
    }

    protected function getMigrationPath()
    {
        return [database_path('migrations/path')];
    }
}
