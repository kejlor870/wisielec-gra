var hasla_do_wylosowania = [];
/*
    Pamiętaj aby po dodaniu hasla zmienić 
    pierwszą liczbe w Math.random() od nawiasów 
    na liczbe najwieksza+1 w zapelnionej tablicy

*/
hasla_do_wylosowania[0] = "Ala ma kota";
hasla_do_wylosowania[1] = "Kot ma Ale";
hasla_do_wylosowania[2] = "Lubie psy";
hasla_do_wylosowania[3] = "Domestos";
hasla_do_wylosowania[4] = "Komputer";
hasla_do_wylosowania[5] = "Dis stream";
hasla_do_wylosowania[6] = "Geografia";
hasla_do_wylosowania[7] = "Klawiatura";

var numer_hasla = Math.floor(Math.random()*8+0); // Pamiętaj o zmianie liczby po nawiasie

let haslo = hasla_do_wylosowania[numer_hasla];
