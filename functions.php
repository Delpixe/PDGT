<?php
/* File contenente le funzioni usate dal client */
/* funzione per la stampa a schermo indentata delle info relative ai tassi universitari */
function stampa_tasso_universitario($http_code, $response) {
  if ($http_code == 200) {
    //risposta HTTP ok
    $data = json_decode($response, true);
    //stampa info tassi universitari
    echo "\n\n ----------------------------------------------------------------------------------------\n";
    echo "| Anno |\t Regione \t| Tasso maschi\t| Tasso femmine\t| Tasso femmine e maschi |";
    echo "\n ----------------------------------------------------------------------------------------\n";
    foreach ($data as $info) {
      // stampa 'Anno' e Regione
      printf("| %s |", $info['Anno']);
       
      if (strlen($info['Regione'])< 7 ) {
        printf(" %s\t\t\t|", $info['Regione']);
      } else if (strlen($info['Regione'])<= 15 ) {
        printf(" %s\t\t|", $info['Regione']);
      } else if (strlen($info['Regione'])<= 25 ) {
        printf(" %s\t|", $info['Regione']);
      }
      //stampa 'tassi'
      printf("\t%05.2f\t|\t%05.2f\t|\t\t%05.2f\t |\n", $info['Tasso maschi'],$info['Tasso femmine'],$info['Tasso femmine e maschi']); //messo a capo per facilitare la lettura
      
    }   // end foreach
    echo "-----------------------------------------------------------------------------------------\n";
  } else {
      //se ritorna un codice di errore dalla richiesta HTTP
      echo "\nATTENZIONE ---> La richiesta HTTP ha restituito il codice d'errore #{$http_code}." . PHP_EOL;
  }    //end if-else
}    //end function


/* funzione per la stampa a schermo indentata delle info relative ai tassi superiori */
function stampa_tasso_superiore($http_code, $response) {
    if ($http_code == 200) {
      //risposta HTTP ok
      $data = json_decode($response, true);
      //stampa info tassi universitari
      echo "\n\n----------------------------------------------------------------------\n";
      echo "| Anno |\t Regione \t| Tasso di scolarizzazione Superiore |";
      echo "\n----------------------------------------------------------------------\n";
      foreach ($data as $info) {
        // stampa 'Anno' e Regione
        printf("| %s |", $info['Anno'],$info['Regione'],$info['Tasso di scolarizzazione']);
        if (strlen($info['Regione'])< 7 ) {
            printf(" %s\t\t\t|", $info['Regione']);
          } else if (strlen($info['Regione'])<= 15 ) {
            printf(" %s\t\t|", $info['Regione']);
          } else if (strlen($info['Regione'])<= 25 ) {
            printf(" %s\t|", $info['Regione']);
          }
        
          printf("\t\t %05.2f \t\t     |\n",$info['Tasso di scolarizzazione']);
      }   // end foreach
      echo "----------------------------------------------------------------------\n";
    } else {
        //se ritorna un codice di errore dalla richiesta HTTP
        echo "\nATTENZIONE ---> La richiesta HTTP ha restituito il codice d'errore #{$http_code}." . PHP_EOL;
    }    //end if-else
  }    //end function

function stampa_tassi($http_code, $response) {
    if ($http_code == 200) {
        //risposta HTTP ok
        $data = json_decode($response, true);
        //stampa info tassi universitari
        echo "\n\n---------------------------------------------------------------------------------\n";
        echo "| Anno |\t Regione \t|    Tasso Superiori\t|    Tasso Universita\t|";
        echo "\n---------------------------------------------------------------------------------\n";
        foreach ($data as $info) {
            // stampa 'Anno' e Regione
            printf("| %s |", $info['Anno'],$info['Regione']);
            if (strlen($info['Regione'])< 7 ) {
                printf(" %s\t\t\t|", $info['Regione']);
              } else if (strlen($info['Regione'])<= 15 ) {
                printf(" %s\t\t|", $info['Regione']);
              } else if (strlen($info['Regione'])<= 25 ) {
                printf(" %s\t|", $info['Regione']);
              }

            printf("\t %05.2f\t\t|\t %05.2f\t\t|\n",$info['Tasso Superiori'],$info['Tasso Universita']);
        }   // end foreach
        echo "---------------------------------------------------------------------------------\n";
    } else {
        //se ritorna un codice di errore dalla richiesta HTTP
        echo "\nATTENZIONE ---> La richiesta HTTP ha restituito il codice d'errore #{$http_code}." . PHP_EOL;
    }    //end if-else
}    //end function
  
function api_esterna($http_code, $response){
  //memorizziamo l'url a cui effettuare la richiesta HTTP
  if ($http_code == 200) {
    //risposta HTTP ok
    $data = json_decode($response, true);
    //stampa info tassi universitari
    echo "\n\n-------------------------------------------------------------------------------------------------------------------------------------------------\n";
    echo "|\t\t\t Nome Università \t\t\t\t|\t Pagina Web \t\t\t|\t Dominio \t\t|";
    echo "\n-------------------------------------------------------------------------------------------------------------------------------------------------";
    foreach ($data as $info) {
      //nome università tabbato bene per lunghezza
        printf("\n");
        if (strlen($info['Nome Universita'])<= 22 ) {
          printf(" %s\t\t\t\t\t\t\t|", $info['Nome Universita']);
        }else if (strlen($info['Nome Universita'])<= 30 ) {
          printf(" %s\t\t\t\t\t\t|", $info['Nome Universita']);
        }else if (strlen($info['Nome Universita'])<= 37 ) {
          printf(" %s\t\t\t\t\t|", $info['Nome Universita']);
        }else if (strlen($info['Nome Universita'])<= 45 ) {
          printf(" %s\t\t\t\t|", $info['Nome Universita']);
        }else if (strlen($info['Nome Universita'])< 55 ) {
          printf(" %s\t\t\t|", $info['Nome Universita']);
        }else if (strlen($info['Nome Universita'])<= 60 ) {
          printf(" %s\t\t|", $info['Nome Universita']);
        }else if (strlen($info['Nome Universita'])<= 65 ) {
          printf(" %s\t|", $info['Nome Universita']);
        }
        //pagina web 
        if (strlen(implode(" ",$info['Pagina Web']))<= 8 ) {
          printf("  %s\t\t\t\t|", implode(" ",$info['Pagina Web']));
        } else if (strlen(implode(" ",$info['Pagina Web']))< 21 ) {
          printf("  %s\t\t\t|", implode(" ",$info['Pagina Web']));
        } else if (strlen(implode(" ",$info['Pagina Web']))<= 28 ) {
          printf("  %s\t\t|", implode(" ",$info['Pagina Web']));
        } else {//if (strlen(implode(" ",$info['Pagina Web']))<= 30 ) {
          printf("  %s\t|", implode(" ",$info['Pagina Web']));
        }
        //dominio
        if (strlen(implode(" ",$info['Dominio'])) < 6 ) {
          printf("  %s\t\t\t\t|", implode(" ",$info['Dominio']));
        } else if (strlen(implode(" ",$info['Dominio']))< 13 ) {
          printf("  %s\t\t\t|", implode(" ",$info['Dominio']));
        } else if (strlen(implode(" ",$info['Dominio']))<= 18 ) {
          printf("  %s\t\t|", implode(" ",$info['Dominio']));
        } else {//if (strlen(implode(" ",$info['Dominio']))<= 30 ) {
          printf("  %s\t|", implode(" ",$info['Dominio']));
        }
    }
    echo "\n-------------------------------------------------------------------------------------------------------------------------------------------------\n";
  } else {
    //se ritorna un codice di errore dalla richiesta HTTP
    echo "\nATTENZIONE FUNCTION ---> La richiesta HTTP ha restituito il codice d'errore #{$http_code}." . PHP_EOL;
  }
}    //end function
?>