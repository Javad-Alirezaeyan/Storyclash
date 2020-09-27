<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    protected $table = "report";
    protected $primaryKey = "id";
    protected $fillable = ['name', 'collection'];

    /**
     * @return array
     *      * this function creates a pretty format for each Report

     */
    public function format(){
       return [
           'id' => $this->id,
           'name' => $this->name,
           'collection'=> $this->collection
       ];
    }





}
