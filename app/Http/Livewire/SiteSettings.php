<?php

namespace App\Http\Livewire;

use App\Models\HomePage;
use Filament\Forms;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class SiteSettings extends Component implements Forms\Contracts\HasForms 
{
    use Forms\Concerns\InteractsWithForms;
    protected function getFormSchema(): array 
    {
        return [
            Forms\Components\TextInput::make('home-header-title')->label("Site Title"),
            Forms\Components\TextInput::make('home-header-banner_text')->label("Site Banner Text"),
            Forms\Components\FileUpload::make('banner')->directory('/site')->label("Banner")
        ];
    }
    
    public function mount(): void 
    {
        $records = HomePage::all();
        $data = [];
        foreach ($records as $rec) $data[$rec->key] = $rec->value;
        
        $this->form->fill($data);
    }

    public function render()
    {
        return view('livewire.site-settings');
    }

    public function submit(): void
    {
        $keys = array_keys($this->form->getState());
        
        HomePage::whereIn('key', $keys)->delete();
        
        $data = [];

        foreach ($this->form->getState() as $key => $value) {
            $data[] = ["key" => $key, "value" => $value];
        }
        // dd($data);
        HomePage::insert($data);
    }

}
