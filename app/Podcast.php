<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Podcast extends Model
{
  //Table Name
    protected $table = 'podcasts';
  //Primary Key
  protected $primaryKey = 'id';
  //Timestamps
  public $timestamps = false;
}
