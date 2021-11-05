<?php

namespace App\Console\Commands;

use Typesense\Client;
use Illuminate\Console\Command;

class IndexData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:index';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Indexes data in Typesense Server';

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
            $base = base_path('typesense/data');

            $dataFiles = array_diff( scandir( $base ), ['..', '.'] );

            foreach ($dataFiles as $dataFile) {
                $collectionName = basename($dataFile, '.jsonl');

                $dataFileContent = file_get_contents($base . '/' . $dataFile);

                $dataFileContentParsed = explode("\n", $dataFileContent);

                foreach($dataFileContentParsed as $data) {
                    $decodedData = json_decode($data, true);
                    $client->collections[$collectionName]->documents->create($decodedData);
                }
                $this->info('Data indexed successfully.');
            }
        } catch (\Throwable $th) {
            $this->error($th->getMessage());
        }
    }
}
