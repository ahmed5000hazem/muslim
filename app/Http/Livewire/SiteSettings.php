<?php

namespace App\Http\Livewire;

use Filament\Forms;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class SiteSettings extends Component implements Forms\Contracts\HasForms 
{
    use Forms\Concerns\InteractsWithForms; 
    // public static function form($form)
    // {
    //     return $form
    //         ->schema([
    //             // ...
    //         ]);
    // }
    protected function getFormSchema(): array 
    {
        return [
            Forms\Components\TextInput::make('site-title')->extraAttributes(['class' => 'dark:text-gray-900'])->required(),
            Forms\Components\TextInput::make('banner-text'),
            Forms\Components\FileUpload::make('attachment')->directory('/site')
        ];
    } 
    public function render()
    {
        return view('livewire.site-settings');
    }

}
