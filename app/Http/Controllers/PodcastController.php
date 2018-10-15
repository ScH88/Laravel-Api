<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Response;
use App\Http\Requests;
use App\Podcast;
use Illuminate\Pagination\LengthAwarePaginator;
//use App\Http\Resources\Podcast as PodcastResource;

class PodcastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = "Podcast Listing";
        //URL for the return value of all episodes as JSON objects
        $url = "http://localhost:8080/WeeklyPodcastManager/public/api/podcasts";
        //Get the contents of the JSON url, then decode from JSON to array. Then, get it's "data" values
        $episodes = (json_decode(file_get_contents($url), JSON_UNESCAPED_SLASHES))['data'];
        //Create an array to store key-value pairs
        $data = array(
          //Store the retrieved episodes under a variable titled 'episodes'
          'episodes' => $episodes
        );
        //Return the "index" view from the "pages" subdirectory in "resources", and attach the data variable to it
        return view('pages/index')->with($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //URL for the return value of a single episode as a JSON object, with parameter id appended at the end
      $url = "http://localhost:8080/WeeklyPodcastManager/public/api/podcast/".$id;
      //Get the contents of the JSON url, then decode from JSON to array. Then, get it's "data" values
      $episode = json_decode(file_get_contents($url), JSON_UNESCAPED_SLASHES)['data'];
      //Create an array to store key-value pairs
      $data = array(
        //Store the retrieved episode under a variable titled 'episode'
        'episode' => $episode
      );
      //Return the "episode" view from the "pages" subdirectory in "resources", and attach the data variable to it
      return view('pages/episode')->with($data);
    }
}
