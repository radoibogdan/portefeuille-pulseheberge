<?php 
/* WORKING OPEN_WEATHER CLASS with no EXCEPTIONS THROwN */
class OpenWeather {
    
    private $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function getToday(string $city): ?array 
    {
        $data = $this->callAPI("weather?q={$city}");
        //ecb77cb817d74319be2a586bd8bdc8bf
        return [
                'temp' => $data['main']['temp'],
                'description' => $data['weather'][0]['description'],
                'date' => new DateTime()
            ];
    }

    public function getForecast(string $city): ?array // ?array = peut retourner null
    {
        $data = $this->callAPI("forecast/daily?q={$city}");
        //ecb77cb817d74319be2a586bd8bdc8bf
        foreach($data['list'] as $day) {
            $results[] = [
                'temp' => $day['temp']['day'],
                'description' => $day['weather'][0]['description'],
                'date' => new DateTime('@' . $day['dt'])
            ];
        }
        return $results;
    }

    // EN GENERAL on met les méthodes privées à la fin

    private function callAPI(string $endpoint) : ?array
    {
        $curl = curl_init("http://api.openweathermap.org/data/2.5/{$endpoint}&APPID={$this->apiKey}&units=metric&lang=fr");
        //ecb77cb817d74319be2a586bd8bdc8bf
        curl_setopt_array($curl,[
            CURLOPT_RETURNTRANSFER => TRUE, 
            CURLOPT_CAINFO => dirname(__DIR__) . DIRECTORY_SEPARATOR . 'cert.cer', // l'endroit du SSL
            CURLOPT_TIMEOUT => 1]); 
        // curl_exec => returns TRUE on success or FALSE on failure. However, if the CURLOPT_RETURNTRANSFER option is set, it will return the result on success, FALSE on failure. 
        // the result = le tableau array avec les infos méteo
        $data = curl_exec($curl);
        if($data === false || curl_getinfo($curl, CURLINFO_HTTP_CODE) !== 200) {
            return null; // thus the ?array 
        }
        return json_decode($data, true); // true => tableau associatif        
    }

}