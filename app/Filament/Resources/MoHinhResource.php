<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MoHinhResource\Pages;
use App\Models\MoHinh;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use Exception;

class MoHinhResource extends Resource
{
    protected static ?string $model = MoHinh::class;
    protected static ?string $navigationGroup ='Cấu hình';
    protected static ?string $navigationIcon = 'heroicon-o-cube'; // icon mô hình
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
                    ->label('Đường dẫn')
                    ->required()
                    ->maxLength(255)
                    ->afterStateUpdated(function ($state) {
                        // Kiểm tra xem đường dẫn mô hình có tồn tại không
                        if (!file_exists($state)) {
                            // Hiển thị thông báo lỗi nếu đường dẫn không hợp lệ
                            throw new Exception("Đường dẫn mô hình không hợp lệ.");
                        }
                    }),
                Forms\Components\Checkbox::make('is_active') // Checkbox kích hoạt mô hình
                    ->label('Kích hoạt mô hình')
                    ->default(false), // Mặc định không kích hoạt
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
                    ->label('Đường dẫn')
                    ->wrap()
                    ->searchable(),
                Tables\Columns\BooleanColumn::make('is_active') // Cột trạng thái 'Kích hoạt'
                    ->label('Đang kích hoạt')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ngày tạo')
                    ->dateTime('d/m/Y H:i'),
            ])
            ->filters([ /* Các bộ lọc nếu cần */ ])
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
