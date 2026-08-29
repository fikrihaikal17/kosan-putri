<?php

namespace App\Filament\Pages\Auth;

use Filament\Auth\Pages\EditProfile as BaseEditProfile;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use SensitiveParameter;

class EditProfile extends BaseEditProfile
{
    public function getTitle(): string | Htmlable
    {
        return 'Profil & Keamanan Akun';
    }

    public function getHeading(): string | Htmlable
    {
        return 'Pengaturan Akun Superadmin';
    }

    public function getSubheading(): string | Htmlable | null
    {
        return 'Kelola nama, alamat email login, serta ubah kata sandi akun admin Anda secara aman.';
    }

    protected function getNameFormComponent(): Component
    {
        return TextInput::make('name')
            ->label('Nama Lengkap')
            ->placeholder('Nama Superadmin')
            ->required()
            ->maxLength(255)
            ->autofocus();
    }

    protected function getEmailFormComponent(): Component
    {
        return TextInput::make('email')
            ->label('Alamat Email Login')
            ->placeholder('admin@kosanputri.com')
            ->helperText('Alamat email ini digunakan untuk masuk ke panel admin.')
            ->email()
            ->required()
            ->maxLength(255)
            ->unique(ignoreRecord: true);
    }

    protected function getCurrentPasswordFormComponent(): Component
    {
        return parent::getCurrentPasswordFormComponent()
            ->label('Kata Sandi Saat Ini')
            ->helperText('Wajib dimasukkan untuk memverifikasi perubahan email atau kata sandi baru.')
            ->placeholder('••••••••');
    }

    protected function getPasswordFormComponent(): Component
    {
        return TextInput::make('password')
            ->label('Kata Sandi Baru')
            ->placeholder('Minimal 8 karakter')
            ->helperText('Kosongkan jika tidak ingin mengganti kata sandi akun.')
            ->password()
            ->revealable()
            ->rule(Password::default())
            ->autocomplete('new-password')
            ->dehydrated(fn (#[SensitiveParameter] $state): bool => filled($state))
            ->dehydrateStateUsing(fn (#[SensitiveParameter] $state): string => Hash::make($state))
            ->same('passwordConfirmation');
    }

    protected function getPasswordConfirmationFormComponent(): Component
    {
        return parent::getPasswordConfirmationFormComponent()
            ->label('Konfirmasi Kata Sandi Baru')
            ->placeholder('Ulangi kata sandi baru');
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Dasar Akun')
                    ->description('Perbarui nama dan alamat email login Anda.')
                    ->schema([
                        $this->getNameFormComponent(),
                        $this->getEmailFormComponent(),
                    ])
                    ->columns(2),

                Section::make('Ubah Kata Sandi (Keamanan)')
                    ->description('Masukkan kata sandi baru dan konfirmasi kata sandi untuk memperbarui akses login.')
                    ->schema([
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),
                        $this->getCurrentPasswordFormComponent(),
                    ])
                    ->columns(1),
            ]);
    }
}
