<?php

namespace App\Filament\Resources\Companyprofiles\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CompanyprofileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Group::make()
                ->schema([
                    Group::make()
                ->schema([
                    Section::make('Company Profile Details')->components([
                        TextInput::make('name')->prefixIcon('heroicon-o-building-office-2')
                            ->required()->columnSpan(2),
                        TextInput::make('gst_number')->prefixIcon('heroicon-o-document-text'),
                        TextInput::make('phone1')
                            ->tel()->prefixIcon('heroicon-o-phone')->required(),
                        TextInput::make('phone2')
                            ->tel()->prefixIcon('heroicon-o-phone'),
                        TextInput::make('email')->prefixIcon('heroicon-o-envelope')
                            ->label('Email address')
                            ->email()->required(),
                        Textarea::make('location')->required()->columnSpanFull(),
                    ])->columnSpan(2)->columns(3),
                    Section::make('Company Social Links')->components([
                        Textarea::make('fb_link')->hintIcon('heroicon-o-link'),
                        Textarea::make('insta_link')->hintIcon('heroicon-o-link'),
                        Textarea::make('twitter_link')->hintIcon('heroicon-o-link'),
                        Textarea::make('youtube_link')->hintIcon('heroicon-o-link'),
                        Textarea::make('whatsapp_link')->hintIcon('heroicon-o-link'),
                    ])->columnSpan(2)->columns(3),
                ])->columnSpan(2),
                    Section::make('Website SEO Details')->components([
                        FileUpload::make('logo')->image()->directory('logo'),
                        FileUpload::make('fav_icon')->image()->directory('favicon'),
                        Textarea::make('meta_title'),
                        Textarea::make('meta_description'),
                        Textarea::make('meta_keywords'),
                    ])->columnSpan(1),
                ])->columnSpanFull()->columns(3),

                Section::make('Terms and Conditions')->components([
                    RichEditor::make('terms_and_conditions')
                        ->hiddenLabel(),
                ])->columnSpanFull(),
                // Section::make('Other Settings')->components([

                // ]),
            ])->columns(3);
    }
}
