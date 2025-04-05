<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Quản lý';

    public static function form(Form $form): Form
    {
        return $form
    ->schema([
        Forms\Components\TextInput::make('title')
            ->label('Tiêu đề')
            ->required()
            ->maxLength(255),

        Forms\Components\TextInput::make('slug')
            ->label('Đường dẫn (slug)')
            ->helperText('Tự động tạo nếu để trống'),

        Forms\Components\RichEditor::make('content')
            ->label('Nội dung')
            ->required()
            ->toolbarButtons([
                'bold',
                'italic',
                'underline',
                'strike',
                'link',
                'bulletList',
                'orderedList',
                'blockquote',
                'codeBlock',
                'h2',
                'h3',
                'hr',
            ])
            ->columnSpanFull(),

        Forms\Components\DatePicker::make('published_at')
            ->label('Ngày đăng'),
    ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->sortable()->searchable()->label('Tiêu đề'),
                TextColumn::make('content')->sortable()->searchable()->label('Nội dung'),
                TextColumn::make('created_at')
                    ->dateTime('d-M-Y')
                    ->sortable()
                    ->searchable()
                    ->label('Ngày tạo'),
                TextColumn::make('updated_at')
                    ->dateTime('d-M-Y')
                    ->sortable()
                    ->searchable()
                    ->label('Ngày sửa'),
            ])
            ->filters([
                // Nếu cần thêm bộ lọc, khai báo ở đây
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make() // Thêm nút xóa cho mỗi bản ghi
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Nếu có mối quan hệ với các model khác, khai báo ở đây
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
