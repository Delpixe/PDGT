# Progetto di PDGT
<br />Progetto d'esame per PDGT A.A. 2017/2018<br />
<br />Studente:   Mattia Del Papa<br />
<br />Matricola:  272016<br />

# Documentazione API

### stampa_db_tasso_sup_json 
Usare questa API per richiedere al server la visualizzazione completa di tutti i tassi di scolarizzazione delle superiori suddiviso per anno e regione presenti nel DB.
Questo file .php non richiede inserimento di parametri. Se la richesta HTTP ha successo restituirà la lista dei vaporetti in formato JSON, altrimenti restituirà lo stato HTTP #400.

***Esempio di lista Json restituita***
---
[
    {
        "Anno":"2004",
        "Regione":"Piemonte",
        "Tasso di scolarizzazione":"72.55"
    },
    {
        "Anno":"2004",
        "Regione":"Valle d'Aosta",
        "Tasso di scolarizzazione":"66.67"ù
    }
    etc.
]
---

### stampa_db_tasso_univ_json
Usare questa API per richiedere al server la visualizzazione completa di tutti i tassi di scolarizzazione delle università suddiviso per anno e regione presenti nel DB.
Questo file .php non richiede inserimento di parametri. Se la richesta HTTP ha successo restituirà la lista dei vaporetti in formato JSON, altrimenti restituirà lo stato HTTP #400.

***Esempio di lista Json restituita***
---
[
    {
        "Anno":"2004",
        "Regione":"Piemonte",
        "Tasso femmine":"18.7",
        "Tasso maschi":"12.7",
        "Tasso femmine e maschi":"15.6"
    },
    {
        "Anno":"2004",
        "Regione":"Valle d'Aosta",
        "Tasso femmine":"18.0",
        "Tasso maschi":"7.6",
        "Tasso femmine e maschi":"12.8"
    }
]
---

### PAR_Anno_Tassi_json
Usare questa API per effettuare una ricerca specifica nel database, questo file può richiedere un parametro, se si vuole un dato più pulito e filtrato, o può tirare su tutti i dati ordinati per Anno e Regione. Se la richiesta HTTP ha successo restituisce la lista dei tassi di scolarizzazione universitario e superiore trovati in formato JSON, altrimenti ritorna lo stato HTTP #400.

<table>
  <tr>
    <td><b>Anno</b></td>
    <td><b>Descrizione</b></td>
  </tr>
  <tr>
    <td>Vuoto</td>
    <td>Carica tutti i dati del db, senza alcun filtro per Anno</td>
  </tr>
  <tr>
    <td>2004</td>
    <td>Carica tutti i dati del db, con il filtro per l'anno 2004</td>
  </tr>
  <tr>
    <td>2005</td>
    <td>Carica tutti i dati del db, con il filtro per l'anno 2005</td>
  </tr>
  <tr>
    <td>2006</td>
    <td>Carica tutti i dati del db, con il filtro per l'anno 2006</td>
  </tr>
  <tr>
    <td>2007</td>
    <td>Carica tutti i dati del db, con il filtro per l'anno 2007</td>
  </tr>
  <tr>
    <td>2008</td>
    <td>Carica tutti i dati del db, con il filtro per l'anno 2008</td>
  </tr>
  <tr>
    <td>2009</td>
    <td>Carica tutti i dati del db, con il filtro per l'anno 2009</td>
  </tr>
  <tr>
    <td>2010</td>
    <td>Carica tutti i dati del db, con il filtro per l'anno 2010</td>
  </tr>
  <tr>
    <td>2011</td>
    <td>Carica tutti i dati del db, con il filtro per l'anno 2011</td>
  </tr>
  <tr>
    <td>2012</td>
    <td>Carica tutti i dati del db, con il filtro per l'anno 2012</td>
  </tr>
  <tr>
    <td>2013</td>
    <td>Carica tutti i dati del db, con il filtro per l'anno 2013</td>
  </tr>
</table>


***Esempio di lista Json restituita***
---
[
    {
        "Anno":"2004",
        "Regione":"Abruzzo",
        "Tasso Superiori":"80.26",
        "Tasso Universita":"16.5"
    },
    {
        "Anno":"2004",
        "Regione":"Basilicata",
        "Tasso Superiori":"76.92",
        "Tasso Universita":"13.0"
    }
]
---

## Una pillola di codice

**Esempi di codice scritto**

*Nel file [http://delpix.altervista.org/PAR_Anno_Tassi_json.php](http://delpix.altervista.org/PAR_Anno_Tassi_json.php)*
```
$sql = 
"SELECT SUP.`Anno`,SUP.`Regione`,SUP.`Tasso di scolarizzazione superiore` as `Tasso Superiori` ,UNI.`Tasso femmine e maschi` as `Tasso Universitario` 
FROM `Tasso Superiore` as SUP INNER JOIN `Tasso Universitario` as UNI on SUP.Regione = UNI.Regione AND SUP.Anno = UNI.Anno 
. $Anno . " ORDER BY SUP.`Regione`";
```

## Documentazione CLIENT

Il client, sviluppato per interagire con le API, è scritto in linguaggio PHP ed è stato ottimizzato per un'esecuzione da CLI. 
Una volta aperto da riga di comando, il programma stampa a video un breve messaggio di introduzione (info programmatore e info del client) seguito da un menù di selezione riguardante le varie funzioni messe a disposizione dal client, ognuna delle quali selezionabile inserendo il numero che le precede ed identifica, seguito dal tasto 'invio'. Selezionando le opzioni '1' e '2' viene stampata a schermo la lista completa dei tassi superiori o dei tassi universitari, rispettivamente, le cui informazioni vengono prelevate tramite richiesta HTTP alle due API 'stampa_db_tasso_sup_json.php' e 'stampa_db_tasso_univ_json.php'. Premendo invece il pulsante '3' si entra in un secondo menù, dove poter scegliere secondo quale anno gli 11 possibili effettuare la ricerca nel database, uno dei quali è la possibilità di non effettuare filtri per visualizzare tutto. Una volta scelto un criterio ed inserita la stringa secondo cui fare il confronto, il client stampa a schermo le informazioni avute in risposta dall'API 'PAR_Anno_Tassi_json.php'. Tramite l'opzione '4' del menù viene eseguita una richiesta HTTP all'API 'api_esterno.php', il cui messaggio di ritorno contenente le informazioni 

??non so cosa metterci ??

L'utente può effettuare tutte le interrogazioni che vuole con il client, una volta trovata l'informazione che stava cercando gli basterà inserire 
il numero '0' o premendo semplicemente il tasto invio dal menù principale per terminare l'esecuzione di quest'ultimo, confermata da un opportuno messaggio.


## Che cosa ho utilizzato per sviluppare:
- http://www.datiopen.it 
- Visual studio Code
- Altersito
- Github
- Gitkraken (per un uso più lineare e strutturato di Git)
