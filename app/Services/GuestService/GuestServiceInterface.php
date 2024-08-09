<?php

namespace App\Services\GuestService;

use App\Models\Guest;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface GuestServiceInterface 
{
    public function getGuests(): LengthAwarePaginator;
    public function storeGuest(array $data, ?Guest $model = null): Guest;
    public function deleteGuest(Guest $guest): void;
}