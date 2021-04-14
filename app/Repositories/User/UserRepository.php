<?php 

namespace App\Repositories\User;

use Illuminate\Database\Eloquent\Model;
use App\User;

class UserRepository implements UserRepositoryInterface
{
    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct()
    {
        $this->model = new User();
    }

    // Get all instances of model
    public function all()
    {
        return $this->model->latest();
    }

    // create a new record in the database
    public function create(array $data)
    {
       
        return User::create($data);
    }

    // update record in the database
    public function update(array $data, $id)
    {
        $model = $this->model->find($id);
        $model->update($data);
        return $model;
    }

    // remove record from the database
    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }

    // show the record with the given id
    public function show($id)
    {
        return $this->model->findOrFail($id);
    }

    // Get the associated model
    public function getModel()
    {
        return $this->model;
    }

    // Set the associated model
    public function setModel($model)
    {
        $this->model = $model;
        return $this->model;
    }

    // Eager load database relationships
    public function with($relations)
    {
        return $this->model->with($relations);
    }

    public function firstOrCreate($condition,$data){
        return $this->model->firstOrCreate(
            $condition,
            $data
        );
    }

    public function findByColumn($condition){
        return $this->model->where($condition);
    }

    public function whereBetween($column,$data){
        return $this->model->whereBetween($column,$data);
    }
}