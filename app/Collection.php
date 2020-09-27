<?php

namespace App;

use App\Report;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $table = "collection";
    protected $primaryKey = "id";
    protected $fillable = ['name', 'updated_at', 'created_at'];


    /**
     * @return array
     * this function creates a pretty format for each Collection
     */
    public function format(){

        $reports = [];
        if(isset($this->report)){
            foreach ($this->report as $report){
                $reports[] = $report->format();
            }
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'report' => $reports
        ];
    }

    public function report()
    {
        return $this->hasMany('App\Report', 'collection');
    }

}
