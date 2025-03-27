<?php
namespace App\Repositories\Interfaces;


interface ApplicationRepositoryInterface
{
    public function getAll();
    public function find($id);
    public function create(array $data);
    public function delete($id);
    public function getUserApplications($id);
}