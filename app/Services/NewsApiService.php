<?php

namespace App\Services;

use GuzzleHttp\Client;

class NewsApiService
{
	protected $client;
	protected $apiKey;

	public function __construct()
	{
		$this->client = new Client([
			'base_uri' => 'https://newsapi.org/v2/',
		]);
		$this->apiKey = config('services.newsapi.key');
	}

	public function getTopHeadlines(string $country, string $category)
	{
		$params = [
			'country'  => $country,
			'category' => $category,
			'apiKey'   => $this->apiKey,
		];

		$response = $this->client->get('top-headlines', [
			'query' => $params
		]);

		return json_decode($response->getBody()->getContents(), true);
	}
}