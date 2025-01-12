<?php

namespace App\Enums;

enum Category: string
{
	case 一般 = 'general';
	case ビジネス = 'business';
	case エンターテイメント = 'entertainment';
	case テクノロジー = 'technology';
	case スポーツ = 'sports';
}