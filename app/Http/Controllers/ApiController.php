<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Podcast;
use App\Http\Resources\Podcast as PodcastResource;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Retrieve all podcasts, ordered in descending order by their id value
        $podcasts = Podcast::orderBy('id', 'desc')->paginate(15);
        //Return the list of podcasts as a collection of PodcastResource instances
        return PodcastResource::collection($podcasts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //If the request method is "PUT", define a Podcast episode instance by the request's podcast_id value. If...
        //...not, define a new Podcast instance
        $episode = $request->isMethod('put') ? Podcast::findOrFail($request->podcast_id) : new Podcast();
        //Set the episode's id by retrieving the request's "podcast_id" input value
        $episode->id = $request->input('podcast_id');
        //Set the episode's title by retrieving the request's "title" input value
        $episode->title = $request->input('title');
        //Set the episode's description by retrieving the request's "description" input value
        $episode->description = $request->input('description');
        //Set the episode's created_date by retrieving the request's "title" input value
        $episode->created_date = $request->input('title');
        //Set the episode's download_url by retrieving the request's "download_url" input value
        $episode->download_url = $request->input('download_url');
        //Set the episode's episode_number by retrieving the request's "episode_number" input value
        $episode->episode_number = $request->input('episode_number');
        //Set the episode's runtime by retrieving the request's "runtime" input value
        $episode->runtime = $request->input('runtime');
        //Set the episode's featuring by retrieving the request's "featuring" input value
        $episode->featuring = $request->input('featuring');
        //Set the episode's special_guest by retrieving the request's "special_guest" input value
        $episode->special_guest = $request->input('special_guest');
        //If the episode is saved
        if ($episode->save()) {
          //Return the saved episode as a PodcastResource instance
            return new PodcastResource($episode);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Retrieve a Podcast instance by the request's podcast_id value and assign to variable called "$episode"
        $episode = Podcast::findOrFail($id);
        //Set the episode's id by retrieving the request's "podcast_id" input value
        $episode->id = $id;
        //Set the episode's title by retrieving the request's "title" input value
        $episode->title = $request->input('title');
        //Set the episode's description by retrieving the request's "description" input value
        $episode->description = $request->input('description');
        //Set the episode's created_date by retrieving the request's "title" input value
        $episode->created_date = $request->input('title');
        //Set the episode's download_url by retrieving the request's "download_url" input value
        $episode->download_url = $request->input('download_url');
        //Set the episode's episode_number by retrieving the request's "episode_number" input value
        $episode->episode_number = $request->input('episode_number');
        //Set the episode's runtime by retrieving the request's "runtime" input value
        $episode->runtime = $request->input('runtime');
        //Set the episode's featuring by retrieving the request's "featuring" input value
        $episode->featuring = $request->input('featuring');
        //Set the episode's special_guest by retrieving the request's "special_guest" input value
        $episode->special_guest = $request->input('special_guest');
        //If the episode has been saved
        if ($episode->save()) {
          //Return the updated episode as a PodcastResource instance
            return new PodcastResource($episode);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Retrieve single podcast by passing the parameter ID to the Podcast class' findOrFail Method
        $podcast = Podcast::findOrFail($id);
        //Return single podcast as a PodcastResource instance
        return new PodcastResource($podcast);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //Retrieve single podcast
      $podcast = Podcast::findOrFail($id);
      //If the podcast instance is confirmed deleted
      if ($podcast->delete()) {
        //Return the deleted podcast as a PodcastResource JSON instance
        return new PodcastResource($podcast);
      }
    }
}
