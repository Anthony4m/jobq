<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\V1\JobListingQuery;
use App\Http\Controllers\Controller;
use App\Http\Requests\ListingRequest;
use App\Http\Requests\UpdateListingRequest;
use App\Http\Resources\ListingCollection;
use App\Http\Resources\Listing;
use App\Models\JobListing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new JobListingQuery();
        $filterItems = $filter->transform($request); //[['column','operator','value']//]
        $includeApplicants = $request->query('includeApplicants');
        $jobListings = JobListing::where($filterItems);
        if ($includeApplicants){
            $jobListings = $jobListings->with('applicants');
        }
        //
        return new ListingCollection($jobListings->paginate()->appends($request->query()));
    }

    public function store(ListingRequest $request)
    {
        try {
            return new Listing(JobListing::create($request->all()));
        }catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(JobListing $jobListing)
    {
        $includeApplicants = request()->query('includeApplicants');
        if ($includeApplicants){
            $jobListing->loadMissing('applicants');
        }
        return new Listing($jobListing);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateListingRequest $request, JobListing $jobListing)
    {
        try {
            $jobListing->update($request->all());
            // Return the updated resource
            return new Listing($jobListing);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobListing $jobListing)
    {
        //
        $jobListing->delete();
    }
}
