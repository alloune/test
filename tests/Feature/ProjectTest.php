<?php

namespace Tests\Feature;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_projet_code_status()
    {
        $response = $this->get('/project');

        $response->assertStatus(200);
    }

    public function test_h1_present_with_specific_title()
    {
        $response = $this->get('/project');
        $response->assertSee("<h1>Liste des projets</h1>", $escaped = false);
    }

    public function test_project_name_is_valid()
    {
        $response = Project::factory()->create(['name' => 'toto']);

        $expected = 'toto';
       $this->assertEquals($expected, $response->name);
    }
}
