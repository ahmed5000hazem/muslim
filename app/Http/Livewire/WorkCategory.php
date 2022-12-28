<?php

namespace App\Http\Livewire;

use App\Models\ArtWorkCategory;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Livewire\Component;

class WorkCategory extends Component implements HasForms
{
    use InteractsWithForms;

    public $category, $type, $artWorkCategory;

    public function mount()
    {
        $this->artWorkCategory = ArtWorkCategory::where('type', $this->type)->first()->toArray();
        // dump($this->type);
        // dd($this->artWorkCategory);
        $this->form->fill($this->artWorkCategory);
    }

    protected function getFormSchema(): array 
    {
        return [
            TextInput::make('title')->required(),
            Textarea::make('description'),
            TextInput::make('type')->disabled()->hidden(),
            Toggle::make('visible'),
        ];
    }

    public function submit()
    {
        ArtWorkCategory::where('type', $this->type)->update($this->form->getState());
        Notification::make()->title($this->category . ' Category ' . ' Updated')->success()->send();
    }

    public function render()
    {
        return view('livewire.work-category');
    }
}
