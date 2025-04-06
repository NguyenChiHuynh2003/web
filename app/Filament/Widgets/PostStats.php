<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class PostStats extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Tổng bài viết', Post::count()),
            Card::make('Bài viết mới nhất', Post::latest('created_at')->first()?->title ?? 'Không có'),
        ];
    }
}
