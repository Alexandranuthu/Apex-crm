<?php

namespace App\Filament\Admin\Resources\ContactsResource\Pages;

use App\Filament\Admin\Resources\ContactsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateContacts extends CreateRecord
{
    protected static string $resource = ContactsResource::class;
}
