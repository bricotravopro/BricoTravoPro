<?php


namespace App\Service;

use GuzzleHttp\Client;

class AppelAPI
{
    /**
     * @param $NumeroSiret
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function APISiret($NumeroSiret)
    {
        $client = new Client();
        $request = $client->get('https://entreprise.data.gouv.fr/api/sirene/v1/siret/'. $NumeroSiret);

        return json_decode($request->getBody(), true);
    }
}