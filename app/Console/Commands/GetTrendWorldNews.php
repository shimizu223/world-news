<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\NewsApiService;
use App\Enums\Country;
use App\Enums\Category;
use App\Models\DailyWorldNews;
use App\Models\WorldNews;

class GetTrendWorldNews extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'app:GetTrendWorldNews';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description';

	/**
	 * Execute the console command.
	 */
	public function handle(NewsApiService $newsApiService)
	{
		foreach (Country::cases() as $country) {
			foreach (Category::cases() as $category) {
				$news = $newsApiService->getTopHeadlines($country->value, $category->value);
				foreach ($news["articles"] as $article) {
					DailyWorldNews::create([
						"country_cd" => $country->value,
						"category_cd" => $category->value,
						"title" => $article["title"],
						"description" => $article["description"],
						"url" => $article["url"],
					]);
				}
			}
		}
	}
}
