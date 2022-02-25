<?php

namespace App\Orchid\Screens;


use App\Models\Tag;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Fields\Cropper;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;

class TagEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Creating and editing tag';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Creating and editing tag';
    
    /**
     * @var bool
     */
    public $exists = false;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Tag $tag): array
    {
        $this->exists = $tag->exists;

        if($this->exists){
            $this->name = 'Edit tag';
        }

        return [
            'tags' => $tag
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
            Button::make('Create tag')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->exists),

            Button::make('Update')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->exists),

            Button::make('Remove')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->exists),
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
            Layout::rows([
                Input::make('tag.title')
                    ->title('Title')
                    ->placeholder('Attractive but mysterious title')
                    ->help('Specify a short descriptive title for this montre.'),

                    Input::make('tag.slug')
                    ->title('slug')
                    ->placeholder('Brief description for preview'),

            ])
        ];
    }
        /**
     * @param Tag    $tag
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createOrUpdate(Tag $tag, Request $request)
    {
        $tag->fill($request->get('tag'))->save();

        Alert::info('You have successfully created an tag.');

        return redirect()->route('platform.tag.list');
    }

    /**
     * @param Tag $tag
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Tag $tag)
    {
        $tag->delete();

        Alert::info('You have successfully deleted the tag.');

        return redirect()->route('platform.tag.list');
    }
}
