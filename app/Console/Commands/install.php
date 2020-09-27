<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'storyclash:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
    public function handle()
    {
        if(substr(PHP_VERSION, 0,3) < 7.2){
            $this->warn("php version is less than 7.4");
            if ($this->confirm('Do you want to continue? [y|N]')== false) {
                exit;
            }
        }

        $this->line( "install 'storyclash' application:");
        if(getenv("DB_DATABASE")== ""){
            $this->error("Error: please set the name of database in .env file");
            exit;
        }


        $this->line( "trying connect to the database:") ;
        try {
            DB::connection()->getPdo();
            echo "Connected\n";
        } catch (\Exception $e) {
            try{
                $this->fire();
             } catch (\Exception $e) {
                die("Could not connect to the database.  Please check your configuration in .env. error:" . $e );
            }
        }

        $this->info('migration :');

        try{
            Artisan::call('migrate');
            $this->info('migration was done');

            if ($this->confirm('Would you like if some data are inserted in the database automatically? [y|N]')) {
                $this->info("it takes a few minutes");
                Artisan::call('db:seed --class=CollectionTableSeeder');
                Artisan::call('db:seed --class=ReportTableSeeder');
            }

            // Artisan::call('db:seed --class=UsersTableSeeder');
            $this->info("Laravel development is accessible on port 8000:");
            exec("x-www-browser 127.0.0.1:8000");
            Artisan::call('serve --port=8000');
            $this->line(Artisan::output());
            $this->info("Storyclash application installed successfully");

        }
        catch (\Exception $e) {
            die("error:" . $e );
        }


    }


    public function fire()
    {
        $database = env('DB_DATABASE', false);

        if (! $database) {
            $this->error('Skipping creation of database as env(DB_DATABASE) is empty');
            exit;
        }

        try {
            $pdo = $this->getPDOConnection(env('DB_HOST'), env('DB_PORT'), env('DB_USERNAME'), env('DB_PASSWORD'));

            $pdo->exec("CREATE DATABASE IF NOT EXISTS $database");
          /*  $pdo->exec(sprintf(
                'CREATE DATABASE IF NOT EXISTS %s CHARACTER SET %s COLLATE %s;',
                $database,
                env('DB_CHARSET'),
                env('DB_COLLATION')
            ));*/

            $this->info(sprintf('Successfully created %s database', $database));
        } catch (\PDOException $exception) {

            $this->error(sprintf('Failed to create %s database, %s', $database, $exception->getMessage()));
        }
    }

    /**
     * @param  string $host
     * @param  integer $port
     * @param  string $username
     * @param  string $password
     * @return PDO
     */
    private function getPDOConnection($host, $port, $username, $password)
    {
        return new \PDO(sprintf('mysql:host=%s;port=%d;', $host, $port), $username, $password);
    }
}
