<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyWorldNews extends Model
{
	protected $table    = 'daily_world_news';
	protected $fillable = ['country_cd', 'category_cd', 'title', 'description', 'url'];
}
