<?php

namespace App\Providers;

use App\Repository\CollectionRepository;
use Illuminate\Support\ServiceProvider;

/**
 * Class ReportMenuServiceProvider
 * @package App\Providers
 * this class is responsible for sharing some data between all views
 */
class ReportMenuServiceProvider extends ServiceProvider
{



    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $collections = [];
        // share collections with all pages
        try{
            $collectionRepository = new CollectionRepository();
            $collections = $collectionRepository->allWithReports();
        }catch (\Exception $e){

        }
        view()->share("collections", $collections);

    }
}
