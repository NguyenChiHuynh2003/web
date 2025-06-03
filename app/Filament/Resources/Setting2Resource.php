<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Setting2Resource\Pages;
use App\Models\Setting2;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class Setting2Resource extends Resource
{
    protected static ?string $model = Setting2::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth'; // biểu tượng cài đặt

    protected static ?string $navigationLabel = 'Cấu hình API';
    protected static ?string $pluralModelLabel = 'Cấu hình API';
    protected static ?string $navigationGroup = 'Hệ thống';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('api_url')
                    ->label('API URL')
                    ->required()
                    ->url()
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('api_key')
                    ->label('API Key')
                    ->password()
                    ->dehydrateStateUsing(fn ($state) => trim($state))
                    ->columnSpanFull(),

                Forms\Components\Toggle::make('is_active')
                    ->label('Đang sử dụng')
                    ->helperText('Chỉ một cấu hình nên được bật.')
                    ->default(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('api_url')
                    ->label('API URL')
                    ->limit(40)
                    ->searchable(),

                Tables\Columns\TextColumn::make('api_key')
                    ->label('API Key')
                    ->limit(20),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Kích hoạt')
                    ->boolean(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Cập nhật')
                    ->dateTime('d/m/Y H:i'),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Đang kích hoạt'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('updated_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSetting2s::route('/'),
            'create' => Pages\CreateSetting2::route('/create'),
            'edit' => Pages\EditSetting2::route('/{record}/edit'),
        ];
    }
}
