<?php

namespace App\Repositories;

use App\Models\Jobpost;

class JobPostRepository implements JobPostRepositoryInterface
{
    public function getAll(){
        return Jobpost::all();
    }

    public function find($id)
    {
        return JobPost::findOrFail($id);
    }

    public function create(array $data)
    {
        return JobPost::create($data);
    }

    public function update($id, array $data)
    {
        $jobPost = JobPost::findOrFail($id);
        $jobPost->update($data);
        return $jobPost;
    }

    public function delete($id)
    {
        JobPost::destroy($id);
    }

}