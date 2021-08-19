<?php

namespace App\Http\Controllers;

use App\Models\Beer;
use App\Models\Brewery;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RandomBeerController extends Controller
{
    //

    function getRandomBeer(): JsonResponse {
        /** @var Beer $beer */
        $beer = Beer::inRandomOrder()->first();
        /** @var Brewery $brewery */
        $brewery = $beer->brewery;
        $contacts = $brewery->contacts;
        return response()->json($this->map($beer, $brewery, $contacts));
    }


    /**
     * @param Beer $beer
     * @param Brewery $brewery
     * @param Collection $contacts
     * @return array
     */
    private function map(Beer $beer, Brewery $brewery, Collection $contacts) {
        $mappedBeer = $beer->map();
        $mappedBrewery = $brewery->map();
        $mappedContacts = $contacts->map(function ($contact) {
            return $contact->map();
        });

        return array_merge(
            $mappedBeer,
            ['brewery' => $mappedBrewery],
            ['contacts' => $mappedContacts]
        );
    }
}
