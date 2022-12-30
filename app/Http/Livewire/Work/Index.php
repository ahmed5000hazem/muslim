<?php

namespace App\Http\Livewire\Work;

use App\Kernel\EnumManager\ArtWorkTypeEnum;
use App\Models\ArtWork;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
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
            Filter::make('featured')->query(fn (Builder $query): Builder => $query->where('featured', 1)),
            Filter::make('normal work')->query(fn (Builder $query): Builder => $query->where('featured', 0)),
            Filter::make('visible')->query(fn (Builder $query): Builder => $query->where('visible', 1)),
            Filter::make('not visible')->query(fn (Builder $query): Builder => $query->where('visible', 0)),
        ];
    }

    protected function getTableColumns(): array 
    {
        foreach(ArtWorkTypeEnum::cases() as $type) $enum[$type->name] = $type->value;
        
        return [
            TextColumn::make('title')->url(function ($record) {
                return route('admin.work.edit', ['work' => $record->id]);
            }),
            TextColumn::make('description')->words(5),
            ToggleColumn::make('featured'),
            ToggleColumn::make('visible'),
            TextColumn::make('work_link')->url(function ($record) {
                return $record->work_link;
            }),
            TextColumn::make('type')->enum($enum),
            ImageColumn::make('image')
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('delete')->action(function ($record) {
                ArtWork::where('id', $record->id)->delete();
            })->color('danger')->icon('heroicon-o-trash')->label('')->size('lg')
        ];
    }

    public function render()
    {
        return view('livewire.work.index');
    }
}
