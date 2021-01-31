<?php

function traer_por_tipo($tipo){
    $apiUrl = 'https://mindicador.cl/api/'.$tipo;
    //Es necesario tener habilitada la directiva allow_url_fopen para usar file_get_contents
    if ( ini_get('allow_url_fopen') ) {
        $json = file_get_contents($apiUrl);
    }else {
        //De otra forma utilizamos cURL
        $curl = curl_init($apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($curl);
        curl_close($curl);
    }
    $response = json_decode($json);
    return $response;
}
function traer_UF(){
    for ($i = 1977; $i <= 2021; $i++) {
        $apiUrl = 'https://mindicador.cl/api/uf/'.strval($i);
        if ( ini_get('allow_url_fopen') ) {
            $json = file_get_contents($apiUrl); 
            $all_data[strval($i)] = $json;
        }else {
            $curl = curl_init($apiUrl);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $json = curl_exec($curl);
            curl_close($curl);
        }   
    }
    for ($i = 1977; $i <= 2021; $i++) {
        $response[strval($i)] = json_decode($all_data[strval($i)]);
    }
    return $response;
}
?>