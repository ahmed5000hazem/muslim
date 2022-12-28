<?php

namespace App\Http\Livewire\Work;

use App\Kernel\EnumManager\ArtWorkTypeEnum;
use App\Models\ArtWork;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Livewire\Component;

class Create extends Component implements HasForms
{
    use InteractsWithForms;

    public function mount(): void
    {
        $this->form->fill();
    }

    protected function getFormSchema(): array 
    {
        $types = ArtWorkTypeEnum::cases();
        // dd($types);
        foreach ($types as $type) {
            $types_array[$type->name] = $type->value;
        }
        return [
            TextInput::make('title')->required(),
            Textarea::make('description'),
            TextInput::make('work_link'),
            FileUpload::make('image')->directory('artwork')->required(),
            DatePicker::make('published_at'),
            Toggle::make('featured')->label('featured'),
            Select::make('type')->label('work type')->options($types_array)->required()
        ];
    }

    public function create()
    {
        $data = $this->form->getState();
        ArtWork::create($data);
        Notification::make()->title('art work created')->success()->send();
        return redirect()->route('admin.work');
    }

    public function render()
    {
        return view('livewire.work.create');
    }
}
