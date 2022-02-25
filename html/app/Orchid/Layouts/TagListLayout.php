<?php

namespace App\Orchid\Layouts;

use App\Models\Tag;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;


class TagListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'tag';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            TD::make('title', 'Title')
                ->render(function (Tag $tag) {
                    return Link::make($tag->title)
                        ->route('platform.tag.edit', $tag);
                }),

            TD::make('slug', 'Slug'),
            TD::make('created_at', 'Created'),
            TD::make('updated_at', 'Last edit')
        ];
    }
}
