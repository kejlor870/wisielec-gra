<!DOCTYPE html>
<html>
    <head>
        <title> Wisielec | Bartosz Uroda </title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" href="wisielecpng/icon.png">
        <script type="text/javascript" src="hasla.js"></script>
        <style> 
            /* stylowanie tablicy */
            table, tr, th, td{
                border: 1px solid black; 
                margin-left: auto; 
                margin-right: auto; 
                border-collapse: collapse;

            }

            th, tr, td{
                padding: 10px;

            }
    
        </style>
    </head>
    <body>
        <div id="container">
            <div id="haslo"> <!-- tu bedzie sie wyswietlac zasloniete haslo -->
                <h1 id="hasloh1">  </h1>
                <script type="text/javascript" src="hasla.js"></script>
                <script>
                    haslo = haslo.toUpperCase();

                    var StrongerHaslo = haslo.replaceAll(/[A,Ą,E,Ę,I,O,U,Y]/g, "_");
                    
                    function wypisz_haslo(){
                        document.getElementById('hasloh1').innerHTML = StrongerHaslo;

                    }

                    window.onload = wypisz_haslo;


                </script>
            </div>
            <div id="gra">
                <div id="wisielec"> <!-- tutaj bedzie wisielec -->
                    <img src="wisielecpng/0.png" id="zdjeciewisielca">
                    <section id="divPunkty"> 
                        <p id="punkty"> Punkty: <br> 0</p>
                    </section>
                    

                </div>
                <div id="odgadywanie"> <!-- Pole na wpisanie liter oraz przycisk Zgaduj, tablica z punktami-->
                    
                    <section class="zgadywanie">

                        <h1> Wybierz samogłoskę: </h1>
                        
                        <button type="submit" value="A" onclick="sprawdz(this.value)"> A </button>
                        <button type="submit" value="Ą" onclick="sprawdz(this.value)"> Ą </button>
                        <button type="submit" value="E" onclick="sprawdz(this.value)"> E </button>
                        <button type="submit" value="Ę" onclick="sprawdz(this.value)"> Ę </button>
                        <br>
                        <button type="submit" value="I" onclick="sprawdz(this.value)"> I </button>
                        <button type="submit" value="O" onclick="sprawdz(this.value)"> O </button>
                        <button type="submit" value="U" onclick="sprawdz(this.value)"> U </button>
                        <button type="submit" value="Y" onclick="sprawdz(this.value)"> Y </button>

                        <!--
                        <h1> Znasz Hasło? </h1>
                        <input type="text" id="polehaslo">
                        <button type="submit" onclick="sprawdzhaslo()"> Odgadnij </button>
                        -->
                        <p id="alertopoprawnosci" class="animated fadeIn pulse" ></p>

                    </section>

                    <hr style="border: 1px dashed rgb(112, 75, 30);"> 

                    <section class="zgadywanie">  
                        <p id="uzyte_samogloski"> Uzyte samogloski: <br></p>
                    </section>

                    <script type="text/javascript" src="skrypt.js">
                    </script>

                </div>
            </div>

            <div id="wynikik" >
                <form method="POST" >
                    <h1 id="wynik_koncowy"> Zgadłeś </h1>
                    <script type="text/javascript" src="skrypt.js"></script>
                    <p id="koncowa_liczba_punktow"> Twoja liczba punktów: <span id="koncowa_liczba_punktow2" name="koncowa_liczba_punktow3"> </span> </p>

                    <section id="formularz">
                        
                            <h2> Zapisz swój wynik </h2>
                            <p> Imię: </p>
                            <input type="text" name="name" id="inputname">
                            <input type="number" id="pkty" name="pkt" value="" style="visibility: hidden; display: block;">

                            <script>
                                function pobieranie_punktow(){
                                    var lpunktow = Number(document.getElementById('koncowa_liczba_punktow2').innerHTML);
                                    console.log("Twoje zdobyte punkty: " + lpunktow);
                                    document.getElementById('pkty').value = lpunktow;

                                    // animacja tabeli wynikow
                                    document.querySelector('table').style.animationName = "pojawianie_sie";
                                    document.querySelector('table').style.animationDuration = "6s";
                                    document.querySelector('h3').style.animationName = "pojawianie_sie";
                                    document.querySelector('h3').style.animationDuration = "6s";
                                    
                                    // animacja formularza
                                    document.querySelector('#formularz').style.animationName = "pojawianie_sie";
                                    document.querySelector('#formularz').style.animationDuration = "4s";
                                                        
                                }
                            </script>

                            <br><br>
                            <input type="submit" value="Zapisz" >
                            
                    </section>
                </form>
                <?php 
                    $dbname = "wyniki_graczy_wisielec";
                    $dbhost = "localhost";
                    $dbuser = "root";
                    $dbpass = "";

                    $baza = mysqli_connect($dbhost,$dbuser,$dbpass);
                    if (mysqli_connect_errno()) {
                        exit();
                    }
                    mysqli_select_db($baza, $dbname);
                    mysqli_query($baza, "SET CHARACTER SET UTF8");
                    
                    if(isset($_POST['name']) && isset($_POST['pkt'])){
                        $punkty = $_POST['pkt'];
                        $name = $_POST['name'];

                        $sql = "INSERT INTO wyniki VALUES ('', '$name', '$punkty')";
                        $wynik = mysqli_query($baza, $sql);
                        
                    }


                    $sql2 = "SELECT imie, punkty FROM wyniki ORDER BY punkty DESC LIMIT 10";
                    $wynik2 = mysqli_query($baza, $sql2);
                    
                    
                    if (mysqli_num_rows($wynik2) > 0) {
                        echo "<h3 style='margin-top: 2%; '> TOP 10 graczy </h3>";
                        echo "<table>";
                        echo "<th> Imię: </th><th> Punkty: </th>";
                        while($wiersz2 = mysqli_fetch_assoc($wynik2)) {
                            echo "<tr><td>" . $wiersz2["imie"]. "</td><td>" . $wiersz2["punkty"]. "</td></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "<br><br> Brak tablicy wyników";
                    }

                    mysqli_close($baza);

                ?>

            </div>
        </div>
    </body>
</html>