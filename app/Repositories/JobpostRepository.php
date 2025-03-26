<?php

namespace App\Repositories;

use App\Models\Jobpost;
use App\Repositories\Interfaces\JobPostRepositoryInterface;


class JobPostRepository implements JobPostRepositoryInterface
{
    public function getAll(){
        return Jobpost::all();
    }

    public function find($id)
    {
        return Jobpost::findOrFail($id);
    }

    public function create(array $data)
    {
        Jobpost::create($data);
    }

    public function update($id, array $data)
    {
        $jobPost = Jobpost::findOrFail($id);
        $Jobpost->update($data);
    }

    public function delete($id)
    {                               
        Jobpost::destroy($id);
    }

}