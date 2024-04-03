<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobApplicationRequest;
use App\Http\Requests\UpdateJobApplicationRequest;
use App\Http\Resources\JobApplicationCollection;
use App\Http\Resources\JobApplicationResource;
use App\Models\JobApplication;

class JobApplicationController extends Controller
{
    //
    public function index()
    {
        return new JobApplicationCollection(JobApplication::paginate());
    }

    public function show(JobApplication $jobApplication)
    {
        return new JobApplicationResource($jobApplication);
    }

    public function update(UpdateJobApplicationRequest $request, JobApplication $jobApplication)
    {
        try {
            $updated = $jobApplication->update($request->all());

            if ($updated) {
                // Return the updated resource with a success message
                return (new JobApplicationResource($jobApplication))->additional(['message' => 'Job Application updated successfully']);
            } else {
                // Handle unsuccessful update
                return response()->json(['error' => 'Failed to update the job application'], 400);
            }
            } catch (\Exception $e) {
                // Handle exception
                return response()->json(['error' => 'Unauthorized'], 403);
            }
    }

    public function store(JobApplicationRequest $request)
    {
        try {
            JobApplication::create($request->all());
            return response()->json(['message' => 'Job Application created successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function destroy(JobApplication $jobApplication)
    {
        $jobApplication->delete();
        return response()->json(['message' => 'Job Application deleted successfully']);
    }
}
