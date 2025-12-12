<?php

namespace App\Filament\Resources\PromotionalMessages\Pages;

use App\Filament\Resources\PromotionalMessages\PromotionalMessageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManagePromotionalMessages extends ManageRecords
{
    protected static string $resource = PromotionalMessageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
