<?php

namespace App\Filament\Admin\Resources\ContactsResource\Pages;

use App\Filament\Admin\Resources\ContactsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContacts extends EditRecord
{
    protected static string $resource = ContactsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
