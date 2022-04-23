<!DOCTYPE html>
<html>
    <head>
        <title> Wisielec | Bartosz Uroda </title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" href="wisielecpng/icon.png">
        
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
                <form method="GET" >
                    <h1 id="wynik_koncowy"> Zgadłeś </h1>
                    <script type="text/javascript" src="skrypt.js"></script>
                    <p id="koncowa_liczba_punktow"> Twoja liczba punktów: <span id="koncowa_liczba_punktow2" name="koncowa_liczba_punktow3"> </span> </p>

                    <section id="formularz">
                        
                            <h2> Zapisz swój wynik </h2>
                            <p> Imię: </p>
                            <input type="text" name="name" id="inputname">
                            <p> Punkty: </p>
                            <input type="number" id="pkty" name="pkt" value="" placeholder="Tylko nie oszukuj ;)">
                            <br><br>
                            <input type="submit" value="Zapisz">
                            
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

                    if(isset($_GET['name']) && isset($_GET['pkt'])){
                        $punkty = $_GET['pkt'];
                        $name = $_GET['name'];

                        $sql = "INSERT INTO wyniki2 VALUES ('', '$name', '$punkty')";
                        
                    }


                    $sql2 = "SELECT imie, punkty FROM wyniki2 ";
                    $wynik2 = mysqli_query($baza, $sql2);
                    
                    
                    if (mysqli_num_rows($wynik2) > 0) {
                        echo "<h3 style='margin-left: auto; margin-right: auto; border-collapse: collapse; margin-top: 2%; '> Tablica wyników </h3>";
                        echo "<table style='border: 1px solid black; margin-left: auto; margin-right: auto; border-collapse: collapse;'>";
                        echo "<th style='border: 1px solid black; border-collapse: collapse; padding: 10px;'> Imię: </th><th style='border: 1px solid black; border-collapse: collapse; padding: 10px;'> Punkty: </th>";
                        while($wiersz2 = mysqli_fetch_assoc($wynik2)) {
                            echo "<tr style='border: 1px solid black; border-collapse: collapse; padding: 10px;'> <td style='border: 1px solid black; border-collapse: collapse; padding: 10px;'>" . $wiersz2["imie"]. "</td><td style='border: 1px solid black; border-collapse: collapse; padding: 10px;'>" . $wiersz2["punkty"]. "</td></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "<br><br> Brak tablicy wyników";
                    }



                ?>

            </div>
        </div>
    </body>
</html>