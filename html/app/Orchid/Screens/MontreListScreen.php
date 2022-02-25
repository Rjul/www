<?php

namespace App\Orchid\Screens;

use App\Orchid\Layouts\MontreListLayout;
use App\Models\Montre;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class MontreListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'All Montre';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'All Montre';


    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'montre' => Montre::paginate()
        ];
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [
            Link::make('Create new')
            ->icon('pencil')
            ->route('platform.montre.edit')
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): array
    {
        return [
            MontreListLayout::class
        ];
    }
}
