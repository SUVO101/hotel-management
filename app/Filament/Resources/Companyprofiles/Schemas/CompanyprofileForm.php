<?php

namespace App\Filament\Resources\Companyprofiles\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class CompanyprofileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('gst_number'),
                TextInput::make('logo'),
                TextInput::make('fav_icon'),
                TextInput::make('phone1')
                    ->tel(),
                TextInput::make('phone2')
                    ->tel(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('location'),
                TextInput::make('fb_link'),
                TextInput::make('insta_link'),
                TextInput::make('twitter_link'),
                TextInput::make('youtube_link'),
                TextInput::make('whatsapp_link'),
                TextInput::make('meta_title'),
                TextInput::make('meta_description'),
                TextInput::make('meta_keywords'),
                Textarea::make('terms_and_conditions')
                    ->columnSpanFull(),
            ]);
    }
}
