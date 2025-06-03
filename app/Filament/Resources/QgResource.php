<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QGResource\Pages;
use App\Models\QG;
use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Tables;

class QGResource extends Resource
{
    protected static ?string $model = QG::class;

    protected static ?string $navigationIcon = 'heroicon-o-flag'; // icon quốc kỳ
    protected static ?string $navigationLabel = 'Quốc Gia';
    protected static ?string $pluralModelLabel = 'Quốc Gia';
    protected static ?string $navigationGroup = 'Cấu hình';
    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('IDQG')
                ->label('Mã quốc gia')
                ->required()
                ->disabledOn('edit'),
            Forms\Components\TextInput::make('TENQG')
                ->label('Tên quốc gia')
                ->required(),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('IDQG')->label('Mã'),
                Tables\Columns\TextColumn::make('TENQG')->label('Tên quốc gia'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQGS::route('/'),
            'create' => Pages\CreateQG::route('/create'),
            'edit' => Pages\EditQG::route('/{record}/edit'),
        ];
    }
}
