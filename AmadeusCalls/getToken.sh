#!bin/bash
curl \
-X POST \
-H "Content-Type: application/x-www-form-urlencoded" \
https://test.api.amadeus.com/v1/security/oauth2/token \
-d "grant_type=client_credentials&client_id=0d6lWviz37X1NvULpkFDpQyoca7WhGAS&client_secret=Ayy0eAwV7WLfDf9P"