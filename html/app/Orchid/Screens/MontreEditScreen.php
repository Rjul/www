<?php

namespace App\Orchid\Screens;


use App\Models\Montre;
use App\Models\User;
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

class MontreEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Creating and editing montre';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Creating and editing montre';
    
    /**
     * @var bool
     */
    public $exists = false;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Montre $montre): array
    {
        $this->exists = $montre->exists;

        if($this->exists){
            $this->name = 'Edit post';
        }

        return [
            'montre' => $montre
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
            Button::make('Create montre')
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
                Input::make('montre.title')
                    ->title('Title')
                    ->placeholder('Attractive but mysterious title')
                    ->help('Specify a short descriptive title for this montre.')
                    ->require(),

                TextArea::make('montre.description')
                    ->title('Description')
                    ->rows(3)
                    ->maxlength(200)
                    ->placeholder('Brief description for preview')
                    ->require(),

                TextArea::make('montre.postDescription')
                    ->title('Description before image')
                    ->rows(3)
                    ->maxlength(200)
                    ->placeholder('Brief description for preview')
                    ->require(),

                Cropper::make('montre.imageUrl')
                    ->width(800)
                    ->height(500)
                    ->targetUrl()
                    ->require(),

                Relation::make('montre.author')
                    ->title('Author')
                    ->fromModel(User::class, 'name')
                    ->require(),

                Input::make('montre.price')->type('number')
                    ->title('Price')
                    ->mask([
                        'alias' => 'currency',
                        'prefix' => ' ',
                        'groupSeparator' => ' ',
                        'digitsOptional' => true,
                    ])
                    ->require(),

                Input::make('montre.quatity')->type('number')
                    ->title('Quantity')
                    ->mask([
                        'alias' => 'currency',
                        'prefix' => ' ',
                        'groupSeparator' => ' ',
                        'digitsOptional' => true,
                    ])
                    ->require(),

                Relation::make('montre.tags')
                    ->title('Tag')
                    ->fromModel(Tag::class, 'title')
                    ->require(),

            ])
        ];
    }
        /**
     * @param Montre    $montre
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createOrUpdate(Montre $montre, Request $request)
    {
        $montre->fill($request->get('montre'))->save();

        Alert::info('You have successfully created an montre.');

        return redirect()->route('platform.montre.list');
    }

    /**
     * @param Montre $montre
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Montre $montre)
    {
        $montre->delete();

        Alert::info('You have successfully deleted the montre.');

        return redirect()->route('platform.montre.list');
    }
}
