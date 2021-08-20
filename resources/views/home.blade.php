<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="./css/bootstrap.min.css" rel="stylesheet" />
        <link href="./css/app.css" rel="stylesheet" />
        <title>Laravel</title>
    </head>
    <body>

    <div class="container-fluid" style="padding-top: 16px">
        <div class="row">
            <div class="col-xs-12 col-md-7 col-lg-6">
                <div class="row">
                    <div class="col-xs-5">
                        <img style="width: 100%" src="{{ $beer['image'] }}" />
                    </div>
                    <div class="col-xs-7">
                        <div class="row">
                            <h1 class="col-xs-12 text-center">{{ $beer['name'] }}</h1>
                        </div>
                        <div class="row">
                            <h3 class="col-xs-6 text-center">{{ $beer['abv'] }}%</h3>
                            <h3 class="col-xs-6 text-center">{{ $beer['style'] }}</h3>
                        </div>
                        <div class="row" style="margin-top: 20px">
                            <div class="col-xs-12">
                                <div class="star-ratings-sprite center-block">
                                    <span style="width:{{ $beer['rating']['score'] * 20 }}%" class="star-ratings-sprite-rating"></span>
                                </div>
                            </div>
                            <div class="col-xs-12 text-center small bold" style="margin-top: 4px;">{{ number_format($beer['rating']['score'], 1) }} <span style="margin-left: 10px; margin-right: 10px;">/</span> {{ $beer['rating']['count'] }} stemmen</div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 50px;">
                    <div class="col-xs-12">
                        {{ $beer['description'] }}
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-offset-1 col-lg-offset-2 col-md-4">
                <div class="row">
                    <img class="col-xs-offset-3 col-xs-6" src="{{ $beer['brewery']['image'] }}" />
                </div>
                <div class="row">
                    <h3 class="col-xs-12 text-center">{{ $beer['brewery']['name'] }}</h3>
                </div>
                <div class="row">
                    <div class="col-xs-6 text-center bold">{{ number_format($beer['brewery']['rating']['score'], 1) }}</div>
                    <div class="col-xs-6 text-center bold">{{ $beer['brewery']['beers_count'] }} beers</div>
                </div>
                <div class="row" style="margin-top: 40px">
                    <div class="col-xs-12">{{ $beer['brewery']['description'] }}</div>
                </div>
{{--                <div class="row">--}}
{{--                    <iframe--}}
{{--                        width="450"--}}
{{--                        height="250"--}}
{{--                        class="center-block"--}}
{{--                        frameborder="0" style="border:0; margin-top: 50px;"--}}
{{--                            src="https://www.google.com/maps/embed/v1/place?q={{ urlencode($beer['brewery']['location']['address']) }}&key={{ env('GOOGLE_MAPS_API_KEY') }}&center={{ $beer['brewery']['location']['latitude'] }},{{ $beer['brewery']['location']['longitude'] }}&zoom=4&maptype=satellite" allowfullscreen>--}}
{{--                    </iframe>--}}
{{--                </div>--}}
                <div class="row" style="margin-top: 30px">
                    <div class="col-xs-12 text-center">
                        @foreach($beer['contacts'] as $contact)
                            <div style="display: inline-block; margin: 20px;">{{ $contact['key'] }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="col-xs-12">
            <pre>{{ var_export($beer) }}</pre>
        </div>
    </body>
</html>
