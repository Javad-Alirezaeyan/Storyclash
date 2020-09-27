<?php


namespace App\Repository;

use App\Report;

/**
 * Class ReportRepository
 * @package App\Repository
 *
 */
class ReportRepository extends BaseRepository
{


    /**
     * @return Report
     */
    protected function getInstance()
    {
        $this->model = new Report();
        return $this->model;
    }

}