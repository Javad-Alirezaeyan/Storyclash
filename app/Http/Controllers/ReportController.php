<?php

namespace App\Http\Controllers;

use App\Http\Request\ReportValidation;
use App\Repository\ReportRepository;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    /**
     * @var ReportRepository
     * this variable keeps a repository that can extracts data about Collections
     */
    protected $reportRepository;

    public function __construct(ReportRepository $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }

    /**
     * @return mixed
     * @throws \Throwable
     * this method creates a new report
     */
    public function store()
    {
        //validation
        if(($res = ReportValidation::validate()) !== true){
            return response()->error($res);
        }

        $report = $this->reportRepository->store();
        $report['html'] = view('collection.liReport', ['report'=> $report])->render();
        return response()->success($report);
    }

    /**
     * @param $id
     * @return mixed
     * this method updates the fields of a report
     */
    public function update($id)
    {
        //validation
        if(($res = ReportValidation::validateWihtoutCollection()) !== true){
            return response()->error($res);
        }

        $this->reportRepository->update($id);
        return response()->success();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $this->reportRepository->delete($id);
        return response()->success(['id'=>$id]);
    }

}
