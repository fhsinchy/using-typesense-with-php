<?php

namespace App\Console\Commands;

use Typesense\Client;
use Illuminate\Console\Command;

class CreateCollection extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'collection:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates collection in Typesense';

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
     * @return int
     */
    public function handle(Client $client)
    {
        try {
            $base = base_path('typesense/schemas');

            $schemas = array_diff( scandir( $base ), ['..', '.'] );

            foreach ($schemas as $schema) {
                $client->collections->create(include_once($base . '/' . $schema));
            }

            $this->info('Schemas created successfully.');
        } catch (\Throwable $th) {
            $this->error($th->getMessage());
        }
    }
}
