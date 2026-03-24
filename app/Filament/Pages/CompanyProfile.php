<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Page;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use App\Models\Companyprofile as CompanyProfileModel;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;


class CompanyProfile extends Page implements HasForms
{
    use InteractsWithForms;
    protected string $view = 'filament.pages.company-profile';
    public ?array $data = [];

    public function mount(): void
    {
        $profile = CompanyProfileModel::first();
        //dd($profile);

        $this->form->fill($profile?->toArray() ?? []);
        // $this->form->fill([
        //     'name' => $profile['name'],
        //     'logo' => $profile->logo,
        //     'location' => $profile->location,
        // ]);
    }

//     public function form(Schema $schema): Schema
// {
//     return $schema
//         ->schema($this->getFormSchema())
//         ->statePath('data'); // 👈 MAIN FIX
// }
//      protected function getFormSchema(): array
//     {
//         return [
//             \Filament\Forms\Components\TextInput::make('name')->required(),

//             \Filament\Forms\Components\FileUpload::make('logo')
//                 ->image(),

//             \Filament\Forms\Components\Textarea::make('location'),
//         ];
//     }
public function form(Schema $schema): Schema
{
    return $schema->components([

                Group::make()
                ->schema([
                    Group::make()
                ->schema([
                    Section::make('Company Profile Details')->components([
                        TextInput::make('name')->prefixIcon('heroicon-o-building-office-2')
                            ->required()->columnSpan(3),
                            TextInput::make('gst_number')->prefixIcon('heroicon-o-document-text'),
                            TextInput::make('phone1')
                            ->tel()->prefixIcon('heroicon-o-phone')->required(),
                            TextInput::make('phone2')
                            ->tel()->prefixIcon('heroicon-o-phone'),
                        TextInput::make('email')->prefixIcon('heroicon-o-envelope')
                            ->label('Email address')
                            ->email()->required()->columnSpan(2),
                            
                        Textarea::make('location')->required()->columnSpan(1),
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
                        Textarea::make('meta_title')
                            ->maxLength(250)
                            ->live(debounce: 1000)
                            ->validationMessages([
                                'max' => 'Title cannot exceed 250 characters.',
                            ])
                            ->helperText(fn($get) => strlen($get('meta_title') ?? '') . '/60 characters'),
                        Textarea::make('meta_description')
                            ->maxLength(250)
                            ->live(debounce: 1000)
                            ->validationMessages([
                                'max' => 'Description cannot exceed 250 characters.',
                            ])
                            ->helperText(fn($get) => strlen($get('meta_description') ?? '') . '/180 characters'),
                        Textarea::make('meta_keywords'),
                    ])->columnSpan(1),
                ])->columnSpanFull()->columns(3),

                Section::make('Terms and Conditions')->components([
                    RichEditor::make('terms_and_conditions')
                        ->hiddenLabel(),
                ])->columnSpanFull(),
                // Section::make('Other Settings')->components([

                // ]),
            ])->columns(3)
        ->statePath('data'); // 👈 MAIN FIX
}

    public function save()
    {
        CompanyProfileModel::updateOrCreate(
            ['id' => 1],
            $this->form->getState()
        );

        \Filament\Notifications\Notification::make()
            ->title('Saved successfully')
            ->success()
            ->send();
    }
}
