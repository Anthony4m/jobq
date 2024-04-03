<?php

namespace Tests\Feature;

use App\Models\JobApplication;
use App\Models\JobListing;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class JobApplicationControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    // Test index method
    public function testIndex()
    {
        $response = $this->get('/api/v1/job-applications');
        $response->assertStatus(200);
        // Add more assertions based on your response
    }

    // Test show method
    public function testShow()
    {
        $user = User::factory()->create([
            'firstname' => 'Test',
            'lastname' => 'user',
            'email' => 'test@example.com',
            'password'=>'123456',
        ]);
        JobListing::factory()->create([
        'user_id' => $user->id
        ]);
        $jobApplication = JobApplication::factory(1)->create([
            'user_id' => $user->id,
            'job_listing_id' => JobListing::all()->random()->id
        ]);

        $response = $this->get('/api/V1/job-applications/' . $jobApplication->job_listing_id);
        $response->assertStatus(200);
        // Add more assertions based on your response
    }

    // Test update method
    public function testUpdate()
    {
        $jobApplication = JobApplication::factory()->create();
        $response = $this->put('/api/v1/job-applications/' . $jobApplication->id, [
            // Provide updated data
        ]);
        $response->assertStatus(200);
        // Add more assertions based on your response
    }

    // Test store method
    public function testStore()
    {
        $response = $this->post('/api/v1/job-applications', [
            // Provide data for creating a job application
        ]);
        $response->assertStatus(201);
        // Add more assertions based on your response
    }

    // Test destroy method
    public function testDestroy()
    {
        $jobApplication = JobApplication::factory()->create();
        $response = $this->delete('/api/v1/job-applications/' . $jobApplication->id);
        $response->assertStatus(200);
        // Add more assertions based on your response
    }
}
