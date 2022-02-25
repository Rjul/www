<?php

namespace App\Orchid\Layouts;

use App\Models\Montre;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;


class MontreListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'montre';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            TD::make('title', 'Title')
                ->render(function (Montre $montre) {
                    return Link::make($montre->title)
                        ->route('platform.montre.edit', $montre);
                }),

            TD::make('price', 'Price'),
            TD::make('quatity', 'Quantity'),
            TD::make('created_at', 'Created'),
            TD::make('updated_at', 'Last edit')
        ];
    }
}
