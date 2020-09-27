<?php

namespace Tests\Feature;

use App\Report;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReportTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */


    public function testCreateReport()
    {
        $response = $this->post('/report',['name'=>"test"]);
        $response->assertStatus(200);
    }

    public function testCreateReportValidation()
    {
        $response = $this->post('/report',[]);
        $response->assertJson(['status'=>'error',"message"=> "", 'errors'=>['name'=>["The name field is required."]]]);
        $response->assertStatus(200);
    }

    public function testDeleteReport()
    {
        $report  = factory(Report::class)->create();

        $response = $this->delete('/report/'. $report->id);
        $response->assertStatus(200);

        $report = Report::find($report->id);
        $this->assertEquals($report, null);
    }

    public function testUpdateReport()
    {
        $report  = factory(Report::class)->create();

        $response = $this->put('/report/'. $report->id, ['name'=>"News"]);
        $response->assertStatus(200);

        $report = Report::find($report->id);
        $this->assertEquals($report->name, "News");

    }
}
