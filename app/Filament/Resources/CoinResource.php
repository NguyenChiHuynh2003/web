<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CoinResource\Pages;
use App\Filament\Resources\CoinResource\RelationManagers;
use App\Models\Coin;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CoinResource extends Resource
{
    protected static ?string $model = Coin::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Cấu hình';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('TENXU')
                    ->label('Tên đồng xu')
                    ->required(),

                TextInput::make('IDQG')
                    ->label('Quốc gia')
                    // Thêm mã tương ứng nếu sử dụng bảng quốc gia
                    // Ví dụ: ->relationship('quocgia', 'TENQG')
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('IDXU')
                    ->label('ID Xu'),
                TextColumn::make('TENXU')
                    ->label('Tên đồng xu'),
                TextColumn::make('IDQG')
                    ->label('ID Quốc gia'),

            ])
            ->filters([
                // Bạn có thể thêm bộ lọc ở đây nếu cần
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
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
            // Các quan hệ nếu cần thiết
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCoins::route('/'),
            'create' => Pages\CreateCoin::route('/create'),
            'edit' => Pages\EditCoin::route('/{record}/edit'),
        ];
    }
}
