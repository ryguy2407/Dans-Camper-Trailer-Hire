<?php

namespace App;

use App\CamperImage;
use Illuminate\Database\Eloquent\Model;

class Camper extends Model
{
	/*
	 * Get the rates that belong to the camper
	 */
	public function rates()
	{
		return $this->hasMany('App\Rate');
	}

	/*
	 * Get all the images related to the camper
	 */
	public function images()
	{
		return $this->hasMany('App\CamperImage')->orderBy('image_order');
	}

	public function featured()
	{
		return $this->hasMany('App\CamperImage')->where('featured', 1);
	}

	function limit_text($text, $limit) {
		if (str_word_count($text, 0) > $limit) {
			$words = str_word_count($text, 2);
			$pos = array_keys($words);
			$text = substr($text, 0, $pos[$limit]) . '...';
		}
		return $text;
	}
}
