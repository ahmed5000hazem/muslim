<?php

namespace App\Http\Livewire;

use App\Models\User;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Hash;
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

    public function updatePassword()
    {
        $data = $this->form->getState();

        $user = User::select('password')->where('role', 'site-owner')->first();

        // check password (authorization)
        if(!Hash::check($data['old_password'], $user->password)){
            Notification::make() 
            ->title('in valid password')
            ->danger()
            ->send();
            return;
        }

        if ($data['password'] != $data['password_confirmation']) {
            Notification::make() 
            ->title('password and password confirmation are not the same')
            ->danger()
            ->send();
            return;
        }

        User::where('role', 'site-owner')->update(['password' => bcrypt($data['password'])]);

        Notification::make()->title('password updated')->success()->send();

    }

    public function render()
    {
        return view('livewire.update-password');
    }
}
