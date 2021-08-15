<?php

namespace App\Http\Controllers;

use App\Models\Beer;
use App\Models\Brewery;
use App\Models\Contact;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RandomBeerController extends Controller
{
    //

    function getRandomBeer(): JsonResponse {
        /** @var Beer $beer */
        $beer = Beer::inRandomOrder()->first()->get();
        /** @var Brewery $brewery */
        $brewery = $beer->brewery;
        $contacts = $brewery->contacts;
        return response()->json($this->map($beer, $brewery, $contacts));
    }


    /**
     * @param Beer $beer
     * @param Brewery $brewery
     * @param Contact[] $contacts
     * @return array
     */
    private function map(Beer $beer, Brewery $brewery, array $contacts) {
        $mappedBeer = $beer->map();
        $mappedBrewery = $brewery->map();
        $mappedContacts = array_map(function ($contact) {
            return $contact->map();
        }, $contacts);

        return array_merge(
            $mappedBeer,
            ['brewery' => $mappedBrewery],
            ['contacts' => $mappedContacts]
        );
    }
}
