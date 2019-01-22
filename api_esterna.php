<?php
/* API per la stampa delle università italiane e dei loro siti web */
//includiamo file di configurazione
require 'config.php';
//impostiamo informazioni header richiesta HTTP
header("Content-Type: application/json; charset=UTF-8");
//inizializzazione della richiesta HTTP tramite CURL
$url = 'http://universities.hipolabs.com/search?country=italy';
$handle = curl_init($url);

//richiesta della risposta HTTP come stringa
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
//esecuzione della richiesta HTTP
$response = curl_exec($handle);
//estrazione del codice di risposta (HTTP status)
$http_code = intval(curl_getinfo($handle, CURLINFO_HTTP_CODE));

if($http_code == 200) {
   $final_array = array();    //creiamo array vuoto
    //risposta HTTP ok
    $conta = 0;
    $data = json_decode($response, TRUE);
    foreach ($data as $rows){
                $final_array[] = array(
                    "Nome Universita" => $data[$conta]['name'],    //memorizziamo nell'array le info che ci interessano
                    "Pagina Web" => $data[$conta]['web_pages'],
                    "Dominio" => $data[$conta]['domains']
                    );
                    $conta += 1;
        }
    if (count($final_array) == 0) {
        http_response_code(400);        //modifichiamo il codice di risposta di HTTP impostandolo 400
        exit;                           //terminiamo l'esecuzione dello script
        }
} else {
  //risposta HTTP con errore
  http_response_code(400);        //modifichiamo il codice di risposta di HTTP impostandolo 400
  exit;                           //terminiamo l'esecuzione dello script
}
$elencoUnivItaliaJson = json_encode($final_array, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);       //codifichiamo l'array in json per trasferimento dati tramite richiesta HTTP
echo "$elencoUnivItaliaJson";

exit;

?>