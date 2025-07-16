<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DespesasResource\Pages;
use App\Filament\Resources\DespesasResource\RelationManagers;
use App\Models\Despesas;
use Filament\Forms;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DespesasResource extends Resource
{
    protected static ?string $model = Despesas::class;
    protected static ?string $navigationGroup = 'Financeiro';
    protected static ?string $navigationLabel = 'Despesas';
    protected static ?string $navigationIcon = 'heroicon-o-arrow-trending-down';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('descricao')
                    ->label('Descrição')
                    ->required()
                    ->maxLength(255),
                
                Forms\Components\TextInput::make('valor')
                    ->label('Valor')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(1000000),

                Forms\Components\DatePicker::make('data')
                    ->label('Data')
                    ->required(),
                
                Toggle::make('paga')
                    ->label('Pago/Recebido')
                    ->helperText('Marque se esta transação já foi efetivada (paga ou recebida).')
                    ->default(true),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('descricao')
                    ->label('Descrição')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('valor')
                    ->label('Valor')
                    ->money('BRL')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('data')
                    ->label('Data')
                    ->date()
                    ->sortable(),
                
                IconColumn::make('paga')
                    ->label('Pago/Recebido')
                    ->alignCenter()
                    ->boolean()
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
            'index' => Pages\ListDespesas::route('/'),
            'create' => Pages\CreateDespesas::route('/create'),
            'edit' => Pages\EditDespesas::route('/{record}/edit'),
        ];
    }
}
