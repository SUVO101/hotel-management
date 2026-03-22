<?php

namespace App\Filament\Resources\Companyprofiles\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CompanyprofileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Company Profile Details')->components([
                    TextInput::make('name')->prefixIcon('heroicon-o-building-office-2')
                        ->required(),
                    TextInput::make('gst_number')->prefixIcon('heroicon-o-document-text'),
                    TextInput::make('phone1')
                        ->tel()->prefixIcon('heroicon-o-phone')->required(),
                    TextInput::make('phone2')
                        ->tel()->prefixIcon('heroicon-o-phone'),
                    TextInput::make('email')->prefixIcon('heroicon-o-envelope')
                        ->label('Email address')
                        ->email()->required(),
                    Textarea::make('location')->required(),
                ]),
                Section::make('Company Social Links')->components([
                    TextInput::make('fb_link')->prefixIcon('heroicon-o-link'),
                    TextInput::make('insta_link')->prefixIcon('heroicon-o-link'),
                    TextInput::make('twitter_link')->prefixIcon('heroicon-o-link'),
                    TextInput::make('youtube_link')->prefixIcon('heroicon-o-link'),
                    TextInput::make('whatsapp_link')->prefixIcon('heroicon-o-link'),
                ]),
                Section::make('Website SEO Details')->components([
                    FileUpload::make('logo')->image()->directory('logo'),
                    FileUpload::make('fav_icon')->image()->directory('favicon'),
                    Textarea::make('meta_title'),
                    Textarea::make('meta_description'),
                    Textarea::make('meta_keywords'),
                ]),
                Section::make('Terms and Conditions')->components([
                    RichEditor::make('terms_and_conditions')
                        ->hiddenLabel(),
                ])->columnSpanFull(),
                // Section::make('Other Settings')->components([

                // ]),
            ])->columns(3);
    }
}
