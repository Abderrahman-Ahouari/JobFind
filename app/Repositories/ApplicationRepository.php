<?php

namespace App\Repositories;

use App\Models\Application;
use App\Repositories\Interfaces\ApplicationRepositoryInterface;


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

    public function update($id, array $data)
    {
        $Application = Application::findOrFail($id);
        $Application->update($data);
    }

    public function delete($id)
    {
        Application::destroy($id);
    }

}