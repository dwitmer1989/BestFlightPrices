#!/bin/bash


cities=$(curl -k GET "https://iatacodes.org/api/v6/autocomplete?query=madrid&api_key=c1cb873d-ff8c-4a9b-a057-f1d52728e246");

echo $cities


