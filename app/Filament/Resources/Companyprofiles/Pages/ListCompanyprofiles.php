<?php

namespace App\Filament\Resources\Companyprofiles\Pages;

use App\Filament\Resources\Companyprofiles\CompanyprofileResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCompanyprofiles extends ListRecords
{
    protected static string $resource = CompanyprofileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
