<?php

namespace App\Http\Livewire\Contact;

use App\Models\Message;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class GetMessages extends Component implements HasTable
{
    use InteractsWithTable;
    
    public function getTableQuery()
    {
        return Message::query();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('name')->sortable()->searchable(),
            TextColumn::make('email')->sortable()->searchable(),
            TextColumn::make('subject')->sortable()->searchable(),
            TextColumn::make('message')
                ->sortable()
                ->searchable()
                ->extraAttributes(['class' => 'text-ellipsis'])
                ->url(fn (Message $record): string => route('admin.contact.show', ['message'=> $record->id])),
            TextColumn::make('read_at')->sortable()->searchable()->default('UN Read')->extraAttributes(function (Model $record) {
                return $record->read_at ? ['class' => 'text-green-600'] : ['class' => 'text-red-600'];
            }),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('mark as read')->action(function ($record) {
                $res = Message::where('id', $record->id)->update(['read_at' => now('Africa/Cairo')]);
            })->visible(fn ($record) => !$record->read_at),
            
        ];
    }
    
    public function isTableSearchable(): bool
    {
        return true;
    }

    protected function applySearchToTableQuery(Builder $query): Builder
    {
        if (filled($searchQuery = $this->getTableSearchQuery())) {
            $query->whereIn('id', Message::search($searchQuery)->keys());
        }
    
        return $query;
    }

    protected function getTableFilters(): array
    {
        return [
            Filter::make('un Read')->query(fn (Builder $query): Builder => $query->where('read_at', null)),
            Filter::make('Read')->query(fn (Builder $query): Builder => $query->where('read_at', '!=' ,null)),
        ];
    }
    
    protected function getTableRecordsPerPageSelectOptions(): array 
    {
        return [10, 25, 50, 100];
    }

    public function render()
    {
        return view('livewire.contact.get-messages');
    }
}
