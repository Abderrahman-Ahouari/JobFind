<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\JobpostRepository;

class JobpostController extends Controller
{
    
    public function getAll(){
        
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
    }

    public function delete($id)
    {
        JobPost::destroy($id);
    }


}
