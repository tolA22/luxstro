<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;



class UserTest extends TestCase
{

    use DatabaseMigrations;

    protected $seed = true;
    
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testcreateComment()
    {
         $this->seed();
        $response = $this->post('/api/v1/comment',['id'=>1,'comments'=>'Writing a comment for user id 9','password'=>"Password1*"]);

        $response->assertStatus(201);
    }

    public function testValidateId(){
        $this->seed();
        $response = $this->post('/api/v1/comment',['id'=>50,'comments'=>'Writing a comment for user id 9','password'=>"Password1*"]);

        $response->assertStatus(422);
    }

    public function testValidateComment(){
        $this->seed();
        $response = $this->post('/api/v1/comment',['id'=>50,'password'=>"Password1*"]);

        $response->assertStatus(422);
    }

    public function testValidatePassword(){
        $this->seed();
        $response = $this->post('/api/v1/comment',['id'=>5,'comments'=>'Writing a comment for user id 9','password'=>"Password1"]);

        $response->assertStatus(422);
    }
}


