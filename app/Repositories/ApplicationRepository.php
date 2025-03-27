<?php

namespace App\Repositories;

use App\Models\Application;
use App\Repositories\Interfaces\ApplicationRepositoryInterface;
use Illuminate\Support\Facades\DB;


class ApplicationRepository implements ApplicationRepositoryInterface  
{
    public function getAll(){
        return Application::all();
    }

    public function find($id)
    {
        return Application::findOrFail($id);
    }

    public function create(array $data)
    {
        return Application::create($data);
    }

    public function delete($id)
    {
        Application::destroy($id);
    }

    public function getUserApplications($id){
        return DB::table('applications')->where('candidate_id',$id)->get();
    }

}