<?php
/* API per la stampa di tutti i vaporetti */
require 'config.php';    //includiamo file di configurazione
header("Content-Type: application/json; charset=UTF-8");   /* info passate tramite header per indicare la tipologia di valore
                                                              ritornato in seguito all'elaborazione del codice della pagina web */
$connection = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);     //connessione al db
if (!$connection) {      //se la connessione non è avvenuta stampiamo un messaggio di avvertimento
  echo "Errore: Impossibile connettersi al database MySQL." . PHP_EOL;
  echo "<br />Debugging errno: " . my_sqli_errno() . PHP_EOL;
  echo "<br />Debugging error: " . my_sqli_error() . PHP_EOL;
  exit;    //terminiamo l'esecuzione dello script
}
$sql = "SELECT * FROM `Tasso Superiore`";    //query che andremo ad eseguire
$final_array = array();    //creiamo array vuoto
if (mysqli_real_query($connection, $sql)) {                  //tramite questa funz. eseguiamo la query memorizz. nella variabile $sql
  if ($result = mysqli_use_result($connection)) {              //tramite questa funzione preleviamo l'ultimo risultato (della query) eseguito sul database $connection
    while ($rows = mysqli_fetch_row($result)) {           //tramite questa funzione analizziamo tutte le righe (una dopo l'altra) partendo dalla 1° fino all'ultima, fermandoci appena viene restituito 'false'
      $final_array[] = array(
                  "Anno" => "$rows[0]",
                  "Regione" => "$rows[1]",
                  "Tasso di scolarizzazione" => "$rows[2]",    //memorizziamo nell'array le info che ci interessano

                );
    }
    //se l'array risulta essere vuoto
    if (count($final_array) == 0) {
      http_response_code(400);        //modifichiamo il codice di risposta di HTTP impostandolo 400
      exit;                           //terminiamo l'esecuzione dello script
    }
  }
} else {
  http_response_code(400);        //modifichiamo il codice di risposta di HTTP impostandolo 400
  exit;                           //terminiamo l'esecuzione dello script
}
$elencoSupJson = json_encode($final_array);       //codifichiamo l'array in json per trasferimento dati tramite richiesta HTTP
mysqli_free_result($result);    //questa funzione serve per indicare che il risultato della query non ci serve più e liberare la memoria
mysqli_close($connection);            //questa funzione termina la connessione col db
echo "$elencoSupJson";
?>