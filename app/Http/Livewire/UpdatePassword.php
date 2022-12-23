<?php

namespace App\Http\Livewire;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;

class UpdatePassword extends Component implements HasForms
{

    use InteractsWithForms;

    public function mount()
    {
        $this->form->fill();
    }

    protected function getFormSchema(): array 
    {
        return [
            TextInput::make('old_password')->password()->required(),
            TextInput::make('password')->password()->required(),
            TextInput::make('password_confirmation')->password()->required(),
        ];
    }

    public function render()
    {
        return view('livewire.update-password');
    }
}
