<?php
namespace Infinety\CRUD\Commands;

use Illuminate\Console\Command;

use Storage;

use Carbon\Carbon;

class CrudInstaller extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'infinety-crud:installCrud';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Infinety-Crud General Installer';

    
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
        
        $this->publishProviders();
    }

    /*
     * Publicación de todos los providers
     */
    private function publishProviders()
    {
        $this->info('Publishing Crud Files');
        $this->call('vendor:publish', ['--provider'=>"Infinety\CRUD\CrudServiceProvider"]);

        $this->info('Publishing FileManager Files');
        $this->call('vendor:publish', ['--provider'=>"Infinety\FileManager\FileManagerServiceProvider"]);     
        
        $this->info('Publishing Datatables Files');
        $this->call('vendor:publish', ['--provider'=>"Yajra\Datatables\DatatablesServiceProvider"]);

        $this->info('Publishing LaravelPnotify Files');
        $this->call('vendor:publish', ['--provider'=>"Jleon\LaravelPnotify\NotifyServiceProvider"]);

        $this->info('Publishing MediaLibrary Files');
        $this->call('vendor:publish', ['--provider'=>"Spatie\MediaLibrary\MediaLibraryServiceProvider"]);
            
    }  
}