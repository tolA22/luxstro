<?php 
namespace App\Repositories\PropertyGuest;

interface PropertyGuestRepositoryInterface
{
    public function all();

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function show($id);

    public function findByColumn($condition);

    public function whereBetween($column,$data);

    public function updateModel($model);
}