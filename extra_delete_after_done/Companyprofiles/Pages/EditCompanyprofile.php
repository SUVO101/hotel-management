<?php

namespace App\Filament\Resources\Companyprofiles\Pages;

use App\Filament\Resources\Companyprofiles\CompanyprofileResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditCompanyprofile extends EditRecord
{
    protected static string $resource = CompanyprofileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
