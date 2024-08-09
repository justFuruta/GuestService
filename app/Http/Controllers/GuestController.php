<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGuestRequest;
use App\Http\Requests\UpdateGuestRequest;
use App\Http\Resources\GuestResource;
use App\Models\Guest;
use App\Services\GuestService\GuestServiceInterface;
use Illuminate\Http\Response;

class GuestController extends Controller
{
    public function __construct(
        private GuestServiceInterface $service
    )
    {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guests = $this->service->getGuests();

        return GuestResource::collection($guests);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGuestRequest $request)
    {
        $guest = $this->service->storeGuest($request->validated());
        return GuestResource::make($guest)
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Guest $guest)
    {
        return GuestResource::make($guest);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGuestRequest $request, Guest $guest)
    {
        $guest = $this->service->storeGuest($request->validated(), $guest);
        return GuestResource::make($guest)
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guest $guest)
    {
        $this->service->deleteGuest($guest);

        return response()->noContent();
    }
}
