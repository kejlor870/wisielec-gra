var samogloski = ["A", "Ą", "E", "Ę", "I", "O", "U", "Y"];
                    var punkty = 0;
                    var nieTrafione = 0;
                    var uzytesamogloskiTAB = new Array(50);
                    var ktorywisielec = 0;

                    for(i=0; i<=50; i++){
                        uzytesamogloskiTAB[i] = 0;

                    }
                    
                    function sprawdz(){
                        var tekst = (document.getElementById('samogloski').value).toUpperCase();
                        var litera = "";
                        var trafiona = false;
                        document.getElementById('samogloski').value=''; // kasuje wpisany tekst do inputa po przeslaniu
                        document.querySelector('link').href = 'style1.css';

                        // sprawdzanie czy wprowadzona litera jest samogloska
                        for(var k=0; k<=8; k++){
                            if(tekst == samogloski[k]){
                                document.getElementById("alertopoprawnosci").innerHTML = "";
                                // wypisuje uzyte samogloski
                                document.getElementById("uzyte_samogloski").innerHTML += tekst + ", &nbsp;";
                                
                                litera = tekst; // przypisujemy litere podana przez uzytkownika zeby ja potem sprawdzic
                                break;
                            }else{
                                document.getElementById("alertopoprawnosci").innerHTML = "Podaj samogloskę!";
                            }

                        }

                        // Skrypt podmiany litery 
                        String.prototype.ustawZnak = function(miejsce, znak)
                        {
                            if (miejsce > this.length - 1) return this.toString();
                            else return this.substr(0, miejsce) + znak + this.substr(miejsce+1);
                        }
                        // sprawdzzanie czy litera jest w hasle i na ktorej pozycji oraz jej podmiana
                        for(var l=0; l<haslo.length; l++){
                            if(haslo.charAt(l) == litera){
                                StrongerHaslo = StrongerHaslo.ustawZnak(l, litera); // podmiana

                                // Sprawdzanie czy litera zostala uzyta 
                                if(uzytesamogloskiTAB[l] !== litera){
                                    punkty += 2;
                                }else{
                                    console.log('Podales juz ta litere '); // blokuje dodawanie punktow przez wpisanie tej samej samogloski
                                    //break;
                                }

                                trafiona = true;
                                uzytesamogloskiTAB[l] = litera;

                                document.getElementById('punkty').innerHTML = "Punkty: <br>" + punkty;  
                                wypisz_haslo();
                            }

                        }

                        // Odejmowanie punktow, zmienianie zdjecia wisielca, aktualizacja punktow
                        if(trafiona == false){
                            ktorywisielec += 1;
                            punkty -= 2;
                            nieTrafione += 1;
                            document.getElementById('punkty').innerHTML = "Punkty: <br>" + punkty;  
                            document.getElementById("zdjeciewisielca").src = "wisielecpng/" + ktorywisielec + ".png";
                            
                        }

                        // Przegrana jesli niee zgadnie 13 razy
                        if(nieTrafione == 13){
                            //window.open('przegranascreen.html');
                            document.getElementById('wynikik').style.visibility = 'visible';
                            document.getElementById('wynik_koncowy').innerHTML = 'Przegrałeś';
                            document.getElementById('koncowa_liczba_punktow').innerHTML = "Twoja liczba punktów: " + punkty;
                            document.getElementById('wynikik').style.background = 'gray';
                        }
                        
                    }

                    
                    function sprawdzhaslo(){
                        var polehaslo = (document.getElementById('polehaslo').value).toUpperCase();
                        document.querySelector('link').href = 'style.css';

                        if(haslo == polehaslo){
                            // animacja tablicy z wynikiem
                            document.getElementById('wynikik').style.visibility = "visible";
                            document.getElementById('wynikik').style.animationName = "wysuwanie";
                            document.getElementById('wynikik').style.animationDuration = "2s";

                            // animacja napisow w wyniku
                            document.getElementById('wynik_koncowy').style.animationName = "pojawianie_sie";
                            document.getElementById('wynik_koncowy').style.animationDuration = "2s";
                            document.getElementById('koncowa_liczba_punktow').style.animationName = "pojawianie_sie";
                            document.getElementById('koncowa_liczba_punktow').style.animationDuration = "3s";

                            // animacja hasla
                            document.getElementById('hasloh1').style.animationName = "pojawianie_sie";
                            document.getElementById('hasloh1').style.animationDuration = "3s";
                            
                            document.getElementById('koncowa_liczba_punktow').innerHTML = "Twoja liczba punktów: " + punkty;
                            document.getElementById('hasloh1').innerHTML = haslo;
                            document.getElementById('alertopoprawnosci').innerHTML = "";
                            //document.querySelector('#wynikik').classList.add('fadeInDown');
                            
                        }else if(haslo != polehaslo){
                            document.getElementById('alertopoprawnosci').innerHTML = "<span class='stroke'><b> To nie takie hasło! </b></span>";
                            
                        }

                    }
