<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ApplicationRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ApplicationController extends Controller
{ 
    protected $ApplicationRepository;

    public function __construct(ApplicationRepository $ApplicationRepository)
    {
        $this->ApplicationRepository = $ApplicationRepository;
    }

    public function getAll(){
        return response()->json($this->ApplicationRepository->getAll());
    }

    public function find($id)
    {
        return response()->json($this->ApplicationRepository->find($id));
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'jobpost_id' => 'required|exists:jobposts,id',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'cover_letter' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);
    
        $validated['candidate_id'] = Auth::id();
    
        $resumePath = $request->file('resume')->store('public/resumes');
        $coverLetterPath = $request->file('cover_letter')->store('public/cover_letters');
    
        $validated['resume'] = str_replace('public/', 'storage/', $resumePath);
        $validated['cover_letter'] = str_replace('public/', 'storage/', $coverLetterPath);
    
        $this->ApplicationRepository->create($validated);
    
    }

    public function delete($id)
    {
        $this->ApplicationRepository->delete($id);
    }


}

