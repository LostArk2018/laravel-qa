<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {

  protected $fillable = ['title', 'body'];

  public function getCreatedDateAttribute() {
    return $this->created_at->diffForHumans();
  }
  
  public function getUrlAttribute() {
    return route("questions.show", $this->id);
  }

  public function setTitleAttribute(string $value): void {
    $this->attributes['title'] = $value;
    $this->attributes['slug'] = str_slug($value);
  }

  public function user() {
    //$question = Question::find(1);
    //return $question->user->email;

    return $this->belongsTo(User::class);
  }

}
