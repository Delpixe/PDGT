# Progetto di PDGT
<br />Progetto d'esame per PDGT A.A. 2017/2018<br />
<br />Studente:   Mattia Del Papa<br />
<br />Matricola:  272016<br />
# Esame di PDGT


$sql = "SELECT SUP.`Anno`,SUP.`Regione`,SUP.`Tasso di scolarizzazione superiore` as `Tasso Superiori` ,UNI.`Tasso femmine e maschi` as `Tasso Universitario`\n"
    . "FROM `Tasso Superiore` as SUP\n"
    . "INNER JOIN `Tasso Universitario` as UNI on SUP.`Regione` = UNI.`Regione`\n"
    . "WHERE SUP.`Anno` = 2004 AND UNI.`Anno` = 2004\n"
    . "\n"
    . "";

# Che cosa ho utilizzato per sviluppare:
- http://www.datiopen.it 
- Visual studio Code
- Altersito
- Github
- Gitkraken (per un uso più lineare e strutturato di Git)