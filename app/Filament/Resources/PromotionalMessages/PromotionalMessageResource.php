<?php

namespace App\Filament\Resources\PromotionalMessages;

use App\Filament\Resources\PromotionalMessages\Pages\ManagePromotionalMessages;
use App\Models\PromotionalMessage;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PromotionalMessageResource extends Resource
{
    protected static ?string $model = PromotionalMessage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Promotional Message';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Titre :')
                    ->required()
                    ->maxLength(150),
                Textarea::make('content')
                    ->label('Contenu :')
                    ->required()
                    ->columnSpanFull(),
                DateTimePicker::make('start_date')
                    ->label('Affiché à partir de :')
                    ->required(),
                DateTimePicker::make('end_date')
                    ->label('Affiché jusqu\'à :')
                    ->required(),
                TextInput::make('type')
                    ->required()
                    ->default('info'),
                Toggle::make('is_active')
                    ->label('Activé ?')
                    ->default(true)
                    ->required(),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title'),
                TextEntry::make('content')
                    ->columnSpanFull(),
                TextEntry::make('start_date')
                    ->dateTime(),
                TextEntry::make('end_date')
                    ->dateTime(),
                TextEntry::make('type'),
                IconEntry::make('is_active')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('Promotional Message')
            ->columns([
                TextColumn::make('title')
                    ->label('Titre')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('start_date')
                    ->label('Date de début')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('end_date')
                    ->label('Date de fin')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('type')
                    ->searchable(),
                IconColumn::make('is_active')
                    ->label('Activé')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->label('Créé le')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Mis à jour le')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManagePromotionalMessages::route('/'),
        ];
    }
}
