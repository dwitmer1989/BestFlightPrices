#!bin/bash
curl -H "Authorization: Bearer "$1 "https://test.api.amadeus.com/v1/shopping/flight-offers?origin=PHL&destination=PEK&departureDate=2019-08-01&max=10"; 