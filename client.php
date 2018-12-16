<?php
/* File contenente il codice sorgente del client */
//includiamo file contenente le funzioni usate dal client
require 'functions.php';
//stampa info programmatore e client
echo "\n------------------------------------\n";
echo "|  Progetto PDGT  A.A. 2017/2018   |\n";
echo "|   Studente: Mattia Del Papa      |\n";
echo "|        Matricola: 272016         |\n";
echo "|                                  |\n";
echo "| Servizio client per collegamento |\n";
echo "|     al database per il tasso     |\n";
echo "|      di ragazzi che studiano     |\n";
echo "------------------------------------\n\n";
/* impostiamo variabile di controllo ciclo do-while del menù */
$chiudi_client = 1;
/* entriamo nel menù */
do {
  echo "\n\nSelezionare la richiesta da eseguire al database: \n";
  echo "\t[1] Tasso Universitari.\n";
  echo "\t[2] Tasso Superirori.\n";
  echo "\t[3] Tassi Università e Superiori per Anno e Regione.\n";
  echo "\t[4] Api esterna.\n\n";
  //echo "\t[5] opzione5.\n\n";
  echo "\t[0/INVIO] Chiusura del client.\n\n";
  $scelta1 = readline();    //acquisizione scelta dell'utente
  $scelta1 = intval($scelta1);
  if ($scelta1 === 1) {
    //inizializzazione richiesta HTTP tramite CURL
    $handle = curl_init('http://delpix.altervista.org/stampa_db_tasso_univ_json.php');
    //richiesta della risposta HTTP come stringa
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    //esecuzione della richiesta HTTP
    $response = curl_exec($handle);
    //estrazione del codice di risposta (HTTP status)
    $http_code = intval(curl_getinfo($handle, CURLINFO_HTTP_CODE));
    //stampa ordinata delle info dei tassi universitari
    stampa_tasso_universitario($http_code,$response);
  //TERMINE del codice eseguito con la prima scelta del menù
  }  elseif ($scelta1 === 2) {
    //inizializzazione richiesta HTTP tramite CURL
    $handle = curl_init('http://delpix.altervista.org/stampa_db_tasso_sup_json.php');
    //richiesta della risposta HTTP come stringa
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    //esecuzione della richiesta HTTP
    $response = curl_exec($handle);
    //estrazione del codice di risposta (HTTP status)
    $http_code = intval(curl_getinfo($handle, CURLINFO_HTTP_CODE));
    //stampa ordinata delle info dei tassi superiori
    stampa_tasso_superiore($http_code,$response);
  //TERMINE del codice eseguito con la terza scelta del menù
  }elseif ($scelta1 === 3) {
    //ciclo per assicurarsi una corretta scelta da parte dell'utente
    do {
      echo "\nScegliere secondo quale Anno effettuare la ricerca dei tassi:\n";
      echo "\n[1] 2004\n[2] 2005\n[3] 2006\n[4] 2007\n[5] 2008\n[6] 2009";
      echo "\n[7] 2010\n[8] 2011\n[9] 2012\n[10] 2013\n[11] Tutti gli anni\n";
      $scelta2 = null;     //inizializziamo la variabile
      $scelta2 = readline();    //caratteristica scelta dall'utente per il filtraggio
      $scelta2 = intval($scelta2);
      if ((($scelta2 !== 1) && ($scelta2 !== 2) && ($scelta2 !== 3) && ($scelta2 !== 4) && ($scelta2 !== 5) &&
      ($scelta2 !== 6) && ($scelta2 !== 7) && ($scelta2 !== 8) && ($scelta2 !== 9) && ($scelta2 !== 10) && 
      ($scelta2 !== 11))) {
        echo "\n\nATTENZIONE --> È stato inserito un valore non ammesso!\n\n";
      }
    } while (($scelta2 !== 1) && ($scelta2 !== 2) && ($scelta2 !== 3) && ($scelta2 !== 4) && ($scelta2 !== 5) &&
      ($scelta2 !== 6) && ($scelta2 !== 7) && ($scelta2 !== 8) && ($scelta2 !== 9) && ($scelta2 !== 10) && 
      ($scelta2 !== 11) );   //end do-while di controllo
   
    //selezione dell'url a cui effettuare richiesta HTTP
    switch ($scelta2) {
      case 1 :
        $anno = '?Anno=2004';
        break;
      case 2 :
        $anno = '?Anno=2005';
        break;
      case 3 :
        $anno = '?Anno=2006';
        break;
      case 4 :
        $anno = '?Anno=2007';
        break;
      case 5 :
        $anno = '?Anno=2008';
        break;
      case 6 :
        $anno = '?Anno=2009';
        break;
      case 7 :
        $anno = '?Anno=2010';
        break;
      case 8 :
        $anno = '?Anno=2011';
        break;
      case 9 :
        $anno = '?Anno=2012';
        break;
      case 10 :
        $anno = '?Anno=2013';
        break;
      case 11 :
        $anno = '';
        break;
    }
      $handle = curl_init('http://delpix.altervista.org/PAR_Anno_Tassi_json.php' . $anno);
   
    //settaggio della risposta HTTP come stringa
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    //esecuzione della richiesta HTTP
    $response = curl_exec($handle);
    //estrazione del codice di risposta (HTTP status)
    $http_code = intval(curl_getinfo($handle, CURLINFO_HTTP_CODE));
    //stampa ordinata delle info dei vaporetti
    stampa_tassi($http_code,$response);
  //TERMINE del codice eseguito con la seconda scelta del menù
  }  elseif ($scelta1 === 4) {
    //inizializzazione richiesta HTTP tramite CURL
    $handle = curl_init('http://delpix.altervista.org/api_esterna.php');
    //richiesta della risposta HTTP come stringa
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    //esecuzione della richiesta HTTP
    $response = curl_exec($handle);
    //estrazione del codice di risposta (HTTP status)
    $http_code = intval(curl_getinfo($handle, CURLINFO_HTTP_CODE));
    //stampa ordinata delle info dei tassi superiori
    api_esterna($http_code,$response);
  //TERMINE del codice eseguito con la terza scelta del menù
  }  elseif ($scelta1 === 0) {
    $chiudi_client = 0;    //impostando la variabile a 0 interrompiamo l'esecuzione del client
    echo "\n\nTerminazione corretta del client, arrivederci !\n\n";
    exit;    //terminazione del programma
  //TERMINE del codice eseguito con la sesta scelta del menù
  } else {
    //se viene inserito un carattere del menù differente da quelli richiesti
    echo "\n\nATTENZIONE --> È stato inserito un valore diverso da quelli previsti." . PHP_EOL;
  }
} while ($chiudi_client !== 0);    //end do-while
//chiusura della sessione CURL
curl_close($handle);
?>