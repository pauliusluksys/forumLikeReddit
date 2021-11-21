<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome') }}
        </h2>
    </x-slot>

    <div class="container">
        <h1>How to Get Current User Location with Laravel - ItSolutionStuff.com</h1>
        <div class="card">
            <div class="card-body">
                @if($currentUserInfo)
                    <h4>IP: {{ $currentUserInfo->ip }}</h4>
                    <h4>Country Name: {{ $currentUserInfo->countryName }}</h4>
                    <h4>Country Code: {{ $currentUserInfo->countryCode }}</h4>
                    <h4>Region Code: {{ $currentUserInfo->regionCode }}</h4>
                    <h4>Region Name: {{ $currentUserInfo->regionName }}</h4>
                    <h4>City Name: {{ $currentUserInfo->cityName }}</h4>
                    <h4>Zip Code: {{ $currentUserInfo->zipCode }}</h4>
                    <h4>Latitude: {{ $currentUserInfo->latitude }}</h4>
                    <h4>Longitude: {{ $currentUserInfo->longitude }}</h4>
                @endif
            </div>
        </div>
    </div>


</x-guest-layout>
