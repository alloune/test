<?php

namespace Tests\Feature\Models;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ModelsTest extends TestCase
{
   use RefreshDatabase;
   protected $seed =true;
    public function test_relationship_between_project_and_user(){
        //given
        $project = Project::first()->make(['user_id'=> 2]);

        //when
        $response = $project->user->id;

        //then
        $expected = 2;
        $this->assertEquals($expected, $response);
    }
}
