<?php

namespace App\Filament\Resources\ContactsResource\Pages;

use App\Filament\Resources\ContactsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateContacts extends CreateRecord
{
    //return to index page after creating a new contact
    protected function getRedirectUrl(): string {
        return $this->getResource()::getUrl('index');
    }
    protected static string $resource = ContactsResource::class;
}
