<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-8-tooth';
    protected static ?string $navigationLabel = 'LLM';
    protected static ?string $pluralModelLabel = 'Danh sách LLM';
    protected static ?string $modelLabel = 'LLM';
    protected static ?string $navigationGroup = 'Cấu hình';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Tên')
                    ->maxLength(255)
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('key')
                    ->label('KEY_API_GPT')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255)
                    ->default(function() {
                        // Lấy key từ database nếu có bản ghi is_active = true, nếu không lấy từ .env
                        $activeSetting = Setting::where('is_active', true)->first();
                        return $activeSetting ? $activeSetting->key : env('KEY_API_GPT');
                    }),

                Forms\Components\Textarea::make('value')
                    ->label('OPENAI_LLM')
                    ->required()
                    ->rows(3)
                    ->default(function() {
                        // Lấy value từ database nếu có bản ghi is_active = true, nếu không lấy từ .env
                        $activeSetting = Setting::where('is_active', true)->first();
                        return $activeSetting ? $activeSetting->value : env('OPENAI_LLM');
                    }),

                Forms\Components\Toggle::make('is_active')
                    ->label('Đang kích hoạt')
                    ->default(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Tên')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('key')
                    ->label('KEY_API_GPT')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('value')
                    ->label('OPENAI_LLM')
                    ->wrap()
                    ->limit(60)
                    ->searchable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Đang kích hoạt')
                    ->boolean(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ngày tạo')
                    ->dateTime('d/m/Y H:i'),
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
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
