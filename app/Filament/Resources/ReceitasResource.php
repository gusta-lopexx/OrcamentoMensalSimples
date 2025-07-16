<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReceitasResource\Pages;
use App\Filament\Resources\ReceitasResource\RelationManagers;
use App\Models\Receitas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class ReceitasResource extends Resource
{
    protected static ?string $model = Receitas::class;

    protected static ?string $navigationGroup = 'Financeiro';
    protected static ?string $navigationLabel = 'Receitas';
    protected static ?string $navigationIcon = 'heroicon-o-arrow-trending-up';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                
                Forms\Components\TextInput::make('descricao')
                    ->required()
                    ->maxLength(500),
                Forms\Components\TextInput::make('valor')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(999999.99),
                    
                Forms\Components\DatePicker::make('data')
                    ->required()
                    ->date(),
                
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('descricao')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('valor')
                    ->money('BRL', true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('data')
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReceitas::route('/'),
            'create' => Pages\CreateReceitas::route('/create'),
            'edit' => Pages\EditReceitas::route('/{record}/edit'),
        ];
    }
}
