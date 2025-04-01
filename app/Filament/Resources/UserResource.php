<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\CheckboxList;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Filters\TrashedFilter; // ✅ Thêm dòng này
use Illuminate\Database\Eloquent\SoftDeletes;
use Filament\Resources\Pages\Page;
use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Filament\Resources\UserResource\Pages\EditUser;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Quản lý';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('is_admin')
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required(fn (Page $livewire) => $livewire instanceof CreateUser)
                    ->dehydrateStateUsing(fn (?string $state) => filled($state) ? Hash::make($state) : null)
                    ->dehydrated(fn (?string $state) => filled($state))
                    ->label(fn (Page $livewire) => $livewire instanceof EditUser ? 'New Password' : 'Password'),
                Forms\Components\FileUpload::make('image'),
                Forms\Components\TextInput::make('SDT')
                    ->maxLength(255)
                    ->default(null),
                CheckboxList::make('roles')
                    ->relationship('roles', 'name')
                    ->columns(2)
                    ->helperText('Chọn 1 vai trò')
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),
                IconColumn::make('is_admin')
                    ->boolean()
                    ->sortable()
                    ->searchable(),
                TextColumn::make('email')->searchable(),
                TextColumn::make('roles.name')->sortable(),
                TextColumn::make('email_verified_at')->dateTime()->sortable(),
                TextColumn::make('created_at')->dateTime()->sortable(),
            
                TextColumn::make('SDT')->searchable(),
                // Hiển thị cột deleted_at nếu model sử dụng SoftDeletes
                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->visible(fn () => in_array(SoftDeletes::class, class_uses(User::class))),
                // Hiển thị hình ảnh đã upload
                ImageColumn::make('image')
                    ->circular() // tùy chọn hiển thị hình tròn
                    ->height(50)
                    ->width(50),
            ])
            ->filters([
                TrashedFilter::make(), // ✅ Sửa lại đúng class
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    // Nếu không sử dụng relation manager thì có thể bỏ qua phần này
    // public static function getRelations(): array
    // {
    //     return [
    //         // RolesRelationManager::class,
    //     ];
    // }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
