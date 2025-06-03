<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MoHinhResource\Pages;
use App\Models\MoHinh;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MoHinhResource extends Resource
{
    protected static ?string $model = MoHinh::class;
    protected static ?string $navigationGroup = 'Cấu hình';
    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $navigationLabel = 'Mô hình';
    protected static ?string $pluralModelLabel = 'Danh sách mô hình';
    protected static ?string $modelLabel = 'Mô hình';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('tenMoHinh')
                    ->label('Tên mô hình')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('path')
                    ->label('Đường dẫn mô hình CNN')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('yolo_path')
                    ->label('Đường dẫn mô hình YOLO')
                    ->maxLength(255),

                Forms\Components\Textarea::make('openai_api_key')
                    ->label('OpenAI API Key')
                    ->rows(3),

                Forms\Components\Checkbox::make('is_active')
                    ->label('Kích hoạt mô hình')
                    ->default(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tenMoHinh')
                    ->label('Tên mô hình')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('path')
                    ->label('CNN Model')
                    ->wrap()
                    ->searchable(),

                Tables\Columns\TextColumn::make('yolo_path')
                    ->label('YOLO Model')
                    ->wrap()
                    ->searchable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('openai_api_key')
                    ->label('API Key')
                    ->limit(15)
                    ->toggleable(),

                Tables\Columns\BooleanColumn::make('is_active')
                    ->label('Đang kích hoạt')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ngày tạo')
                    ->dateTime('d/m/Y H:i'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListMoHinhs::route('/'),
            'create' => Pages\CreateMoHinh::route('/create'),
            'edit' => Pages\EditMoHinh::route('/{record}/edit'),
        ];
    }
}
