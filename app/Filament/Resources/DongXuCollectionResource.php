<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DongXuCollectionResource\Pages;
use App\Models\DongXuCollection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class DongXuCollectionResource extends Resource
{
    protected static ?string $model = DongXuCollection::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Bộ xu cổ';
    protected static ?string $pluralModelLabel = 'Bộ xu cổ';
    protected static ?string $navigationGroup = 'Quản lý bộ xu';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('ma')->required()->label('Mã xu'),
                TextInput::make('chat_lieu')->label('Chất liệu'),
                TextInput::make('phan_loai')->label('Phân loại'),
                TextInput::make('nien_dai')->label('Niên đại'),
                Textarea::make('mo_ta')->label('Mô tả')->rows(3),

                FileUpload::make('anh_mt')
                    ->label('Ảnh mặt trước')
                    ->disk('public')
                    ->directory(fn ($record) => "coin-img/" . ($record?->ma ?? 'temp'))
                    ->image()
                    ->imagePreviewHeight('100'),

                FileUpload::make('anh_ms')
                    ->label('Ảnh mặt sau')
                    ->disk('public')
                    ->directory(fn ($record) => "coin-img/" . ($record?->ma ?? 'temp'))
                    ->image()
                    ->imagePreviewHeight('100'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ma')->label('Mã xu')->sortable()->searchable(),
                TextColumn::make('chat_lieu')->label('Chất liệu'),
                TextColumn::make('phan_loai')->label('Phân loại'),
                TextColumn::make('nien_dai')->label('Niên đại'),
                TextColumn::make('mo_ta')->label('Mô tả')->limit(30),

                ImageColumn::make('anh_mt')
                    ->label('Mặt trước')
                    ->disk('public')
                    ->getStateUsing(fn ($record) => str_replace('storage/', '', $record->anh_mt))
                    ->height(50),

                ImageColumn::make('anh_ms')
                    ->label('Mặt sau')
                    ->disk('public')
                    ->getStateUsing(fn ($record) => str_replace('storage/', '', $record->anh_ms))
                    ->height(50),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDongXuCollections::route('/'),
            'create' => Pages\CreateDongXuCollection::route('/create'),
            'edit' => Pages\EditDongXuCollection::route('/{record}/edit'),
        ];
    }
}
