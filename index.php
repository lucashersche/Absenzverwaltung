<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">
    <head>
        <!-- Meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Absenzverwaltung">
        <!-- titel -->
        <title>Absenzverwaltung</title>
        <!-- llinks -->
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>Absenzverwaltung</h1>
            <br>
            <hr>
            <br>

            <nav class="nav nav-pills nav-justified">
                <a class="nav-item nav-link active" href="index.php">Absenz</a>
                <a class="nav-item nav-link " href="schueler.php">Schüler</a>
                <a class="nav-item nav-link " href="kari.php">Kari</a>
                <a class="nav-item nav-link " href="kopf.php">Kopf</a>
            </nav>

            <br>
            <hr>
            <br>

            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Ungeklärte Absenzen</h5>
                            <p class="card-text">ardi lelek</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Geklärte Absenzen</h5>
                            <p class="card-text">Ardi kein lelek</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            
            $dbdir = '/develop/xampp/db';
            /* Datenbankdatei ausserhalb htdocs öffnen bzw. erzeugen */
            $db = new SQLite3("$dbdir/sq3.db");

            /* Tabelle mit Primärschlüssel erzeugen */
            $db->exec("CREATE TABLE TSchueler (Schuelernummer INTEGER PRIMARY KEY, "
                    . "Vorname, Nachname, Geburtsdatum, Adresse, PLZ, Ort, "
                    . "Telefonnummer, KlassenId);");
            /*$db->exec("CREATE TABLE TKlassen (KlassenId, vorname, "
                    . "personalnummer INTEGER PRIMARY KEY, gehalt, geburtstag);");
            $db->exec("CREATE TABLE TAbsenzen (name, vorname, "
                    . "personalnummer INTEGER PRIMARY KEY, gehalt, geburtstag);");*/
            
            

            /* Drei Datensätze eintragen */
            $sqlstr = "INSERT INTO TSchueler (Schuelernummer, Vorname, Nachname, Geburtsdatum, Adresse, PLZ, Ort, Telefonnummer, KlassenId ) VALUES ";
            $db->query($sqlstr . "(0, 'Lucas', 'Hersche', '2002-02-15', 'Thundorferstrasse 10', 8512, 'Wetzikon', 0799409425, '3i')");
            $db->query($sqlstr . "(1, 'Marlon', 'Schmidheiny', '2001-08-04', 'Aadorferstrasse 10', 9414, 'Wängi', 0523761185, '3i')");
            $db->query($sqlstr . "(2, 'Altin', 'Palushaj', '2001-02-21', 'Weinfelderstrasse 10', 8520, 'Weinfelden', 0768952326, '3i')");

            $res = $db->query("SELECT * FROM TSchueler");

            /* Abfrageergebnis ausgeben */
            while ($dsatz = $res->fetchArray(SQLITE3_ASSOC)) {
                echo $dsatz["Schuelernummer"] . ", "
                . $dsatz["Vorname"] . ", "
                . $dsatz["Nachname"] . ", "
                . $dsatz["Geburtsdatum"] . ", "
                . $dsatz["Adresse"] . ", "
                . $dsatz["PLZ"] . ", "
                . $dsatz["Ort"] . ", "
                . $dsatz["Telefonnummer"] . ", "
                . $dsatz["KlassenId"] . "<br>";
            }
            /* Verbindung zur Datenbankdatei wieder lösen */
            $db->close();
            
            ?>

        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>

