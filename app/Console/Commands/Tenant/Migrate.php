<?php

namespace App\Console\Commands\Tenant;

use App\Company;
use App\Tenant\Database\DatabaseManager;
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
     * @var DatabaseManager
     */
    protected $db;

    /**
     * Create a new command instance.
     *
     * @param Migrator $migrator
     * @param DatabaseManager $db
     */
    public function __construct(Migrator $migrator, DatabaseManager $db)
    {
        parent::__construct($migrator);
        $this->setName('tenants:migrate');
        $this->db = $db;
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
        $this->input->setOption('database', 'tenant');

        $tenants = Company::get();

        $tenants->each(function ($tenant) {
            $this->db->createConnection($tenant);
            $this->db->connectToTenant();

            parent::handle();

            $this->db->purge();
        });

    }

    protected function getMigrationPaths()
    {
        return [database_path('migrations/tenant')];
    }
}
