<?php


namespace App\Repository;


use App\Collection;

class CollectionRepository extends BaseRepository
{

    /**
     * @return mixed
     * this method returns all collection with their reports
     */
    public function allWithReports(){
        return  $this->instance->with('report')->get()->map(function ($item) {
            return $item->format();
        }
        );
    }

    /**
     * @return Collection
     * returning an instance of Collection Model
     */
    protected function getInstance()
    {
        return new Collection();
    }
}