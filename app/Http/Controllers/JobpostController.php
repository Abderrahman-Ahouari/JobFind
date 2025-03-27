<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\JobpostRepository;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class JobpostController extends Controller
{
    protected $jobPostRepository;

    public function __construct(JobPostRepository $jobPostRepository)
    {
        $this->jobPostRepository = $jobPostRepository;
    }

    public function getAll(){
        return response()->json($this->jobPostRepository->getAll());
    }

    public function find($id)
    {
        return response()->json($this->jobPostRepository->find($id));
    }

    // public function create(Request $request)
    // {
    //     $validated = $request->validate([
    //         'title' => 'required|string',
    //         'description' => 'required|string',
    //         'location' => 'required|string',
    //         'salary' => 'required',
    //         'image' => 'nullable',
    //     ]);
    //     // return $validated;
    //     $validated['recruiter_id'] = Auth::id();
    //     $this->jobPostRepository->create($validated);
    // }

    public function create(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'location' => 'required|string',
            'salary' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ]);
    
        $validated['recruiter_id'] = Auth::id();
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('jobpost_photos', 'public');
            $validated['image'] = $imagePath;
        }
    
        $this->jobPostRepository->create($validated);
    }
    

    public function update($id, Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'location' => 'nullable|string',
            'salary' => 'nullable',
            'image' => 'nullable',
        ]);
        $this->jobPostRepository->update($id, $validated);

    }

    public function delete($id)
    {
        $this->jobPostRepository->delete($id);
    }


}
