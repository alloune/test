<?php

namespace Tests\Feature;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
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

        $response->assertSuccessful();
    }

    public function test_h1_present_with_specific_title()
    {
        $response = $this->get('/project');
        $response->assertSee("<h1>Liste des projets</h1>", false);
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

    public function test_store_new_project()
    {
        //when
        $response = $this->from('/project/create')
        ->post(route('project.store', [
            'name' => 'Test',
            'description' => 'trop bien',
            'author_name' => 'modo',
            'user_id' => '7',
        ]))
        ->assertRedirect();
    }

    /*public function test_()
    {
        $this->withExceptionHandling()->signIn();


    }*/
}
