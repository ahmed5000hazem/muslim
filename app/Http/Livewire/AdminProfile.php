<?php

namespace App\Http\Livewire;

use App\Models\User;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Livewire\Component;

class AdminProfile extends Component implements HasForms
{

    use InteractsWithForms;

    protected function getFormSchema(): array 
    {
        return [
            TextInput::make('name')->label("Name")->required(),
            TextInput::make('email')->label("Email")->required(),
            TextInput::make('phone')->label("Phone")->required(),
            RichEditor::make('about')->label("About Me"),
            FileUpload::make('image')->directory('/site/profile')->label("Profile Image")->required()
        ];
    }

    public function mount(): void 
    {
        $user = User::where('role', 'site-owner')->first()->toArray();
        $this->user = $user;
        $this->form->fill($user);
    }

    public function render()
    {
        return view('livewire.admin-profile');
    }

    public function updateProfile()
    {
        User::where('id', $this->user['id'])->update($this->form->getState());
        Notification::make()->title('profile updated successfully')->success()->send();
    }
}
