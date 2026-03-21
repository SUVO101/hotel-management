<?php

namespace App\Filament\Resources\Companyprofiles\Pages;

use App\Filament\Resources\Companyprofiles\CompanyprofileResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCompanyprofile extends ViewRecord
{
    protected static string $resource = CompanyprofileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
