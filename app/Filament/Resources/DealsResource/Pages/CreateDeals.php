<?php

namespace App\Filament\Resources\DealsResource\Pages;

use App\Filament\Resources\DealsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDeals extends CreateRecord
{
    protected function getRedirectUrl(): string {
        return $this->getResource()::getUrl('index');
    }
    protected static string $resource = DealsResource::class;
}
