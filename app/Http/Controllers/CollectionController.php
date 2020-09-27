<?php

namespace App\Http\Controllers;

use App\Http\Request\CollectionValidation;
use App\Repository\CollectionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CollectionController extends Controller
{
    /**
     * @var CollectionRepository
     * this variable keeps a repository that can extracts data about Collections
     */
    protected $collectionRepository;

    public function __construct(CollectionRepository $reportRepository)
    {
        $this->collectionRepository = $reportRepository;
    }

    /**
     * @return mixed
     * @throws \Throwable
     * this method creates a new collection
     */
    public function store()
    {
        //validation
        if(($res = CollectionValidation::validate()) !== true){
            return response()->error($res);
        }
        $collection = $this->collectionRepository->store();
        // attach a HTML content of a record of Collection
        $collection['html'] = view('collection.liCollection', ['collection'=> $collection])->render();
        return response()->success($collection);
    }


    /**
     * @param $id
     * @return mixed
     * this method updates the fields of a Collections
     */
    public function update($id)
    {
        //validation
        if(($res = CollectionValidation::validate()) !== true){
            return response()->error($res);
        }
        $this->collectionRepository->update($id);
        return response()->success();

    }

    /**
     * @param $id
     * @return mixed
     * delete a Collection
     */
    public function destroy($id)
    {
        $this->collectionRepository->delete($id);
        return response()->success(['id'=>$id]);
    }
}
