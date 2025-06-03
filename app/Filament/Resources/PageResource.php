<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Cấu hình website';
    protected static ?string $pluralModelLabel = 'Danh sách cấu hình';
    protected static ?string $modelLabel = 'Cấu hình';
    protected static ?string $navigationGroup = 'Cấu hình';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Tên trang web
                Forms\Components\TextInput::make('site_name')
                    ->label('Tên trang web')
                    ->required()
                    ->maxLength(255),

                // Logo trang web
                Forms\Components\FileUpload::make('logo_path')
                    ->label('Logo trang web')
                    ->image()
                    ->directory('logos')  // Lưu trữ logo trong thư mục 'logos'
                    ->required(),

                // Kích hoạt trang


                // Mô tả trang web cho SEO
                Forms\Components\TextInput::make('site_description')
                    ->label('Mô tả trang web')
                    ->maxLength(255)
                    ->helperText('Mô tả này sẽ được sử dụng trong SEO'),

                // Favicon
                Forms\Components\FileUpload::make('favicon')
                    ->label('Favicon')
                    ->image()
                    ->directory('favicons'),

                // Tiêu đề Open Graph
                Forms\Components\TextInput::make('og_title')
                    ->label('Tiêu đề Open Graph')
                    ->maxLength(255),

                // Mô tả Open Graph
                Forms\Components\TextInput::make('og_description')
                    ->label('Mô tả Open Graph')
                    ->maxLength(255),

                // Hình ảnh Open Graph
                Forms\Components\FileUpload::make('og_image')
                    ->label('Hình ảnh Open Graph')
                    ->image()
                    ->directory('og_images'),
                 Forms\Components\Toggle::make('is_active')
                    ->label('Kích hoạt')
                    ->default(true),  // Mặc định là kích hoạt
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Tên trang web
                Tables\Columns\TextColumn::make('site_name')
                    ->label('Tên trang web')
                    ->searchable()
                    ->sortable(),

                // Logo trang web
                Tables\Columns\ImageColumn::make('logo_path')
                    ->label('Logo')
                    ->rounded()
                    ->width(60)
                    ->height(60),

                // Trạng thái kích hoạt
                Tables\Columns\BooleanColumn::make('is_active')
                    ->label('Kích hoạt')
                    ->sortable(),

                // Ngày tạo
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ngày tạo')
                    ->dateTime('d/m/Y H:i'),

                // Ngày cập nhật
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Ngày cập nhật')
                    ->dateTime('d/m/Y H:i'),
            ])
            ->filters([
                // Các bộ lọc nếu cần (ví dụ: lọc theo trang web kích hoạt)
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
