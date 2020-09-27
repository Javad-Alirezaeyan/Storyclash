<?php

namespace Tests\Feature;

use App\Collection;
use App\Report;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CollectionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testCreateCollection()
    {
        $response = $this->post('/collection',['name'=>"test"]);
        $response->assertStatus(200);
    }

    public function testCreateCollectionValidation()
    {
        $response = $this->post('/collection',[]);
        $response->assertJson(['status'=>'error',"message"=> "", 'errors'=>['name'=>["The name field is required."]]]);
        $response->assertStatus(200);
    }

    public function testDeleteCollection()
    {
        $collection = factory(Collection::class)->create();

        $response = $this->delete('/collection/'. $collection->id);
        $response->assertStatus(200);

        $collection = Collection::find($collection->id);
        $this->assertEquals($collection, null);
    }

    public function testUpdateCollection()
    {
        $collection = factory(Collection::class)->create();
        $response = $this->put('/collection/'. $collection->id, ['name'=>"Sport"]);
        $response->assertStatus(200);

        $collection = Collection::find($collection->id);
        $this->assertEquals($collection->name, "Sport");


    }
}
