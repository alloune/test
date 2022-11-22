<?php

namespace Tests\Feature;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectTest extends TestCase
{

    use RefreshDatabase;
    protected $seed = true;
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
    public function test_project_name_present_in_index_view()
    {
        //given
        $project = Project::first();

        //when
        $response = $this->get('/project' );

        //then
        $response->assertSee( $project->name );
    }
    public function test_project_name_present_in_show_view()
    {
        //given
        $project = Project::first();

        //when
        $response = $this->get('/project/'.$project->id );

        //then
        $response->assertSee( $project->name );
    }
    public function test_author_name_is_present_in_show_view()
    {
        //given
        $project = Project::first();

        //when
        $response = $this->get('/project/'.$project->id );

        //then
        $response->assertSee( $project->author_name );
    }

    public function test_relationship_between_project_and_user(){
        //given
        $project = Project::first()->make(['user_id'=> 2]);

        //when
        $response = $project->user_id;

        //then
        $expected = 2;
        $this->assertEquals($expected, $response);
    }

}
