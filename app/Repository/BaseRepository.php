<?php


namespace App\Repository;


 use App\Collection;

 abstract class BaseRepository implements BaseInterfaceRepository
{

    protected $model;
    protected $instance;

    public function __construct()
    {
        $this->instance = $this->getInstance();
    }
    public function all()
    {
        return $this->instance->all();
    }



    public function paginate($count)
    {
        return $this->instance->paginate($count);
    }

    public function find($id)
    {
        return $this->instance->findOrFail($id);
    }

    public function store($data = [])
    {
        $fields = request()->only($this->instance->getFillable());
        foreach ($fields as $key=>$value){
            $this->instance->$key = $value;
        }
        $this->instance->save();
        return $this->instance->format();
    }

    public function update($id, $data= [])
    {
        $model = $this->find($id);
        $model->update(request()->only($model->getFillable()));
    }

    public function delete($id)
    {
        $model = $this->find($id);
        $model->delete();
    }

    public function findBy(string $field, string $value)
    {

    }


    protected abstract function getInstance();
}