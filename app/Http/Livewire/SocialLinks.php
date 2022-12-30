<?php

namespace App\Http\Livewire;

use App\Models\HomePage;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class SocialLinks extends Component implements HasForms
{
    use InteractsWithForms;

    protected function getFormSchema(): array 
    {
        return [
            TextInput::make('facebook_link'),
            TextInput::make('youtube_link'),
            TextInput::make('twitter_link'),
        ];
    }

    public function mount()
    {
        $records = HomePage::all();
        foreach ($records as $rec) $data[$rec->key] = $rec->value;
        $this->form->fill($data);
    }

    public function update()
    {
        foreach ($this->form->getState() as $key => $value) {
            $data[] = ["key" => $key, "value" => $value];
        }
        
        $keys = array_keys($this->form->getState());
        HomePage::whereIn('key', $keys)->delete();

        HomePage::insert($data);

        Notification::make()->title('social links updated.')->success()->send();

    }

    public function render()
    {
        return view('livewire.social-links');
    }
}
