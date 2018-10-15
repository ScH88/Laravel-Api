<?php

namespace Tests\Feature;

use App\Podcast;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\Http\Resources\Podcast as PodcastResource;

class ApiControllerTest extends TestCase {

  use DatabaseMigrations;

  public function return_all_podcasts() {
    //Get a response by calling the "testcollectall" route
    $response = $this->get(route('testcollectall'));
    //Retrieve all podcasts via the Podcast class, ordered in descending order by their id value and paginated
    $podcasts = Podcast::orderBy('id', 'desc')->paginate(15);
    //Call the assertResource method on the response (which will be picked up by the CreatesApplication.php...
    //...file. Pass it the PodcastResource collection to compare)
    $response->assertResource(PodcastResource::collection($podcasts));
  }

}
