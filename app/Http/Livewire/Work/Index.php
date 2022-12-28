<?php

namespace App\Http\Livewire\Work;

use App\Kernel\EnumManager\ArtWorkTypeEnum;
use App\Models\ArtWork;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class Index extends Component implements HasTable
{
    use InteractsWithTable;

    public function getTableQuery()
    {
        return ArtWork::query();
    }

    public function isTableSearchable(): bool
    {
        return true;
    }

    protected function applySearchToTableQuery(Builder $query): Builder
    {
        if (filled($searchQuery = $this->getTableSearchQuery())) {
            $query->whereIn('id', ArtWork::search($searchQuery)->keys());
        }
    
        return $query;
    }

    protected function getTableFilters(): array
    {
        foreach(ArtWorkTypeEnum::cases() as $type){
            $enum[$type->name] = $type->value;
        }
        return [
            SelectFilter::make('type')->options($enum)->attribute('type'),
            // Filter::make('is_featured')->query(fn (Builder $query): Builder => $query->where('is_featured', true))
        ];
    }

    protected function getTableColumns(): array 
    {
        foreach(ArtWorkTypeEnum::cases() as $type){
            $enum[$type->name] = $type->value;
        }
        return [
            TextColumn::make('title'),
            TextColumn::make('description')->words(15),
            TextColumn::make('work_link'),
            TextColumn::make('type')->enum($enum),
            ImageColumn::make('image')
        ];
    }

    public function render()
    {
        return view('livewire.work.index');
    }
}
