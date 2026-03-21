<?php

namespace App\Filament\Resources\Companyprofiles\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CompanyprofileInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('gst_number')
                    ->placeholder('-'),
                TextEntry::make('logo')
                    ->placeholder('-'),
                TextEntry::make('fav_icon')
                    ->placeholder('-'),
                TextEntry::make('phone1')
                    ->placeholder('-'),
                TextEntry::make('phone2')
                    ->placeholder('-'),
                TextEntry::make('email')
                    ->label('Email address')
                    ->placeholder('-'),
                TextEntry::make('location')
                    ->placeholder('-'),
                TextEntry::make('fb_link')
                    ->placeholder('-'),
                TextEntry::make('insta_link')
                    ->placeholder('-'),
                TextEntry::make('twitter_link')
                    ->placeholder('-'),
                TextEntry::make('youtube_link')
                    ->placeholder('-'),
                TextEntry::make('whatsapp_link')
                    ->placeholder('-'),
                TextEntry::make('meta_title')
                    ->placeholder('-'),
                TextEntry::make('meta_description')
                    ->placeholder('-'),
                TextEntry::make('meta_keywords')
                    ->placeholder('-'),
                TextEntry::make('terms_and_conditions')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
