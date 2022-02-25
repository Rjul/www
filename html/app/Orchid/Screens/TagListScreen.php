<?php

namespace App\Orchid\Screens;

use App\Orchid\Layouts\TagListLayout;
use App\Models\Tag;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class TagListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'All Tag';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'All Tag';


    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'tag' => Tag::paginate()
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
            ->route('platform.tag.edit')
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
            TagListLayout::class
        ];
    }
}
