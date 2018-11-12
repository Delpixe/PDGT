# Progetto di PDGT
<br />Progetto d'esame per PDGT A.A. 2017/2018<br />
<br />Studente:   Mattia Del Papa<br />
<br />Matricola:  272016<br />
# Alcune pillole di codice

**Esempi di codice scritto**

*__Nel file [http://delpix.altervista.org/PAR_Anno_Tassi_json.php](http://delpix.altervista.org/PAR_Anno_Tassi_json.php) __*
```
$sql = 
"SELECT SUP.`Anno`,SUP.`Regione`,SUP.`Tasso di scolarizzazione superiore` as `Tasso Superiori` ,UNI.`Tasso femmine e maschi` as `Tasso Universitario` 
FROM `Tasso Superiore` as SUP INNER JOIN `Tasso Universitario` as UNI on SUP.Regione = UNI.Regione AND SUP.Anno = UNI.Anno 
. $Anno . " ORDER BY SUP.`Regione`";
```
## Che cosa ho utilizzato per sviluppare:
- http://www.datiopen.it 
- Visual studio Code
- Altersito
- Github
- Gitkraken (per un uso più lineare e strutturato di Git)
