<?php
unirest.get("https://cometari-airportsfinder-v1.p.rapidapi.com/api/airports/by-radius?radius=50&lng=-157.895277&lat=21.265600")
    .header("X-RapidAPI-Key", "c1f5d511abmshcafd4c34fd8b398p16de3djsn56bfb5538d50")
    .end(function (result) {
      console.log(result.status, result.headers, result.body);
    });