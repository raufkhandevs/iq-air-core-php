<?php

// include('db_config.php');

class AirVisual
{
    private $key = 'bc51f413-99ca-4ef2-b5b3-38cace76a08b';

    public function getAllCountries()
    {
        $url = "http://api.airvisual.com/v2/countries?key=$this->key";

        $api_curl = curl_init($url);

        curl_setopt($api_curl, CURLOPT_RETURNTRANSFER, true);

        $json_countries_data = curl_exec($api_curl);

        $countries_data = json_decode($json_countries_data, true);

        curl_close($api_curl);

        if ($countries_data['status'] == 'success') {
            return $countries_data;
        } else {
            return false;
        }
    }

    public function getAllStates($country)
    {
        $country = str_replace(' ', '%20', $country);

        $url = "http://api.airvisual.com/v2/states?country=$country&key=$this->key";

        $api_curl = curl_init($url);

        curl_setopt($api_curl, CURLOPT_RETURNTRANSFER, true);

        $json_states_data = curl_exec($api_curl);

        $states_data = json_decode($json_states_data, true);

        curl_close($api_curl);

        if ($states_data['status'] == 'success') {
            return $states_data;
        } else {
            return false;
        }
    }

    public function getAllCities($country, $state)
    {
        $country = str_replace(' ', '%20', $country);
        $state = str_replace(' ', '%20', $state);

        $url = "http://api.airvisual.com/v2/cities?state=$state&country=$country&key=$this->key";

        $api_curl = curl_init($url);

        curl_setopt($api_curl, CURLOPT_RETURNTRANSFER, true);

        $json_cities_data = curl_exec($api_curl);

        $cities_data = json_decode($json_cities_data, true);

        curl_close($api_curl);

        if ($cities_data['status'] == 'success') {
            return $cities_data;
        } else {
            return false;
        }
    }

    public function getspecifiedCityData($country, $state, $city)
    {
        $country = str_replace(' ', '%20', $country);
        $state = str_replace(' ', '%20', $state);
        $city = str_replace(' ', '%20', $city);

        $url = "http://api.airvisual.com/v2/city?city=$city&state=$state&country=$country&key=$this->key";

        $api_curl = curl_init($url);

        curl_setopt($api_curl, CURLOPT_RETURNTRANSFER, true);

        $json_data = curl_exec($api_curl);

        $data = json_decode($json_data, true);

        curl_close($api_curl);

        if ($data['status'] == 'success') {
            return $data;
        } else {
            return false;
        }
    }

    public function measureAirQuality($level)
    {
        if (0 <= $level && $level <= 50) {
            $data = array(
                'status' => 'Good',
                'bg' => 'bg-good',
                'img' => 'good.svg'
            );
            return $data;
        } elseif (51 <= $level && $level <= 100) {
            $data = array(
                'status' => 'Moderate',
                'bg' => 'bg-moderate',
                'img' => 'Moderate.svg'
            );
            return $data;
        } elseif (101 <= $level && $level <= 150) {
            $data = array(
                'status' => 'Unhealthy for Sensitive Groups',
                'bg' => 'bg-Unhealthy-for-sensitive-groups',
                'img' => 'Unhealthy-for-Sensitive-Groups.svg'
            );
            return $data;
        } elseif (151 <= $level && $level <= 200) {
            $data = array(
                'status' => 'Unhealthy',
                'bg' => 'bg-unhealthy',
                'img' => 'unhealthy.svg'
            );
            return $data;
        } elseif (201 <= $level && $level <= 300) {
            $data = array(
                'status' => 'Very Unhealthy',
                'bg' => 'bg-very-unhealthy',
                'img' => 'Very-Unhealthy.svg'
            );
            return $data;
        } elseif (301 <= $level) {
            $data = array(
                'status' => 'Hazardous',
                'bg' => 'bg-hazardous',
                'img' => 'Hazardous.svg'
            );
            return $data;
        }
    }
}
