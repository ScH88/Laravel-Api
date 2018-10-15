<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Podcast extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //Original method for returning all valriables
        //return parent::toArray($request);
        return [
          'id' => $this->id,
          'created_date' => $this->created_date,
          'download_url' => $this->download_url,
          'title' => $this->title,
          'description' => $this->description,
          'episode_number' => $this->episode_number,
          'metadata' => [
            'runtime' => $this->when($this->runtime, $this->runtime),
            'featuring' => $this->when($this->featuring, $this->featuring),
            'special_guest' => $this->when($this->special_guest, $this->special_guest)
          ]
        ];
    }

    public function with($request) {
      return [
        'version' => '1.0.0',
        'author' => 'Scott Huck'
      ];
    }
}
