var hasla_do_wylosowania = [];

hasla_do_wylosowania[0] = "Ala ma kota";
hasla_do_wylosowania[1] = "Kot ma Ale";
hasla_do_wylosowania[2] = "Lubie psy";
hasla_do_wylosowania[3] = "Domestos";
hasla_do_wylosowania[4] = "Komputer";
hasla_do_wylosowania[5] = "Dis stream";
hasla_do_wylosowania[6] = "Geografia";
hasla_do_wylosowania[7] = "Klawiatura";
hasla_do_wylosowania[8] = "Echometria";
hasla_do_wylosowania[9] = "Edukacyjny";
hasla_do_wylosowania[10] = "Sabotować";
hasla_do_wylosowania[11] = "Identyczni";
hasla_do_wylosowania[12] = "idiotyczny";

var tablength = hasla_do_wylosowania.length;

var numer_hasla = Math.floor(Math.random()*tablength+0);

let haslo = hasla_do_wylosowania[numer_hasla];
