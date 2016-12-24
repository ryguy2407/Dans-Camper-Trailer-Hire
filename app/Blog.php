<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = ['id'];

    public function markdown($value)
    {
    	$parser = new \cebe\markdown\Markdown();
    	return $parser->parse($value);
    }

    public function media()
    {
    	return $this->hasMany('App\Media');
    }
}
