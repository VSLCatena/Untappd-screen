<?php

namespace App\Http\Controllers;

use App\Models\Beer;
use App\Models\Brewery;
use Illuminate\Http\JsonResponse;

class EditBeersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function getBeerList(): JsonResponse {
        /** @var Brewery[] $breweries */
        $breweries = Brewery::all();
        /** @var Brewery[] $mappedBreweries */
        $mappedBreweries = [];
        foreach ($breweries as $brewery) {
            $mappedBreweries[$brewery->id] = $brewery;
        }

        /** @var Beer[] $beers */
        $beers = Beer::all();
        /** @var Beer[] $mappedBeers */
        $mappedBeers = [];

        foreach ($beers as $beer) {
            $mappedBeers[] = [
                'id' => $beer->id,
                'brewery' => $mappedBreweries[$beer->brewery_id]->name,
                'beer' => $beer->name,
                'image' => ''
            ];
        }

        return response()->json($mappedBeers);
    }

    function search($text): JsonResponse {
        return response()->json([
            [
                'id' => 1,
                'brewery' => 'Brewery test',
                'beer' => 'Beer test',
                'image' => ''
            ],
            [
                'id' => 2,
                'brewery' => 'Brewery test 2',
                'beer' => 'Beer test 2',
                'image' => ''
            ],
            [
                'id' => 3,
                'brewery' => 'Brewery test 3',
                'beer' => 'Beer test 3',
                'image' => ''
            ]
        ]);
    }

    function addBeer($beerId) {
        $this->doBeerRefresh($beerId);
    }

    function removeBeer($beerId) {
        $beer = Beer::findOrFail($beerId);
        $breweryId = $beer->brewery_id;
        $beer->delete();

        $beerCount = Beer::whereBreweryId($breweryId)->count();
        if ($beerCount <= 0) {
            $brewery = Brewery::find($breweryId);
            if ($brewery != null) {
                $brewery->delete();
            }
        }

    }

    function refreshBeer($beerId) {
        $beer = Beer::findOrFail($beerId);
        $this->refreshBeer($beer->id);
    }

    private function doBeerRefresh($beerId) {
        $apiBeer = $this->getBeerFromApi($beerId);
        $apiBrewery = $this->getBreweryFromApi($apiBeer->id);

        $apiBeer->save();
        $apiBrewery->save();
    }

    private function getBeerFromApi(int $beerId): Beer {
        $beer = new Beer();
        $beer->id = $beerId;
        $beer->name = "Random beer name";
        $beer->description = "Random beer description";
        $beer->label_image = "";
        $beer->style = "IPA";
        $beer->abv = 6.7;
        $beer->ibu = 53;
        $beer->date_created = "";
        $beer->rating_count = 5012;
        $beer->rating_score = 3.23;
        $beer->brewery_id = 23;

        return $beer;
    }

    private function getBreweryFromApi(int $breweryId): Brewery {
        $brewery = new Brewery();
        $brewery->id = $breweryId;
        $brewery->name = "Random brewery name";
        $brewery->description = "Random brewery description";
        $brewery->type = "Micro brewery";
        $brewery->label_image = "";
        $brewery->beer_count = 75;
        $brewery->location_country = "Netherlands";
        $brewery->location_state = "";
        $brewery->location_city = "Leiden";
        $brewery->location_address = "Kolfmakersteeg";
        $brewery->location_latitude = 52.15628;
        $brewery->location_longitude = 4.4854137;
        $brewery->rating_count = 23;
        $brewery->rating_score = 3.7;

        return $brewery;
    }
}
