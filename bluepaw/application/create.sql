/* Első adatbázis próbálkozás, később elvetésre került!

-- Teszt adatok
-- Shelter tábla létrehozása tesztelési célzattal 
Create table shelter
(
    id int not null AUTO_INCREMENT,
    nev varchar(500) not null,
    leiras text default null,
    aktiv tinyint default 1,
    
    constraint PK_shelterek primary key(id)
);

-- Példa adatok feltöltése

insert into shelter(nev) values ('Eger');
insert into shelter(nev) values ('Jászberény');

-- Adatbázis megtervezése
-- telep, epulet, szoba, alkalmazott, allat, jogviszony, esemeny, orokbefogado

-- Először azokat a táblákat kell létrehoznunk, amikben nem szerepelnek idegen kulcsok

-- Jogviszony, örökbefogadó, telep


-- Telep tábla létrehozása
create table telep
(
    id int primary key not null auto_increment,
    leiras varchar(200),
    nev varchar(50)
);

-- Példa adatok feltöltése
insert into telep(nev) values ('Eger');
insert into telep(nev) values ('Miskolc');


-- Jogviszony létrehozása
create table jogviszony
(
    megnevezes varchar(50) primary key not null,
    fizetes  int not null
);

-- Példaadatok feltöltése
insert into jogviszony(megnevezes, fizetes) values ('Állatgondozó', 120000);
insert into jogviszony(megnevezes, fizetes) values ('Önkéntes', 0);
insert into jogviszony(megnevezes, fizetes) values ('Irodavezető', 280000);
insert into jogviszony(megnevezes, fizetes) values ('Adminisztrátor', 190000);

-- Örökbefogadó tábla
create table orokbefogado
(
    id int not null primary key auto_increment,
    nev varchar(50) not null,
    lakhely varchar(70) default 'ismeretlen',
    haziallatok int default 0,
    javasolt varchar(200) default 'Meghatározatlan'
);

-- Így hogy ezek elkészültek, hozzuk létre a táblákat
-- amiben őket idegen kulccsal kell kapcsolnunk

-- Az Épülettel kell kezdenünk, mert az alkalmazottnak szüksége lesz a szoba
-- táblára, amit csak az épület tábla létrehozása után tudunk létrehozni

-- Épület tábla
create table epulet
(
    id int not null primary key auto_increment,
    megnevezes varchar(100) not null,
    tipus varchar(100) default 'Ismeretlen épület',
    telep int,
    foreign key (telep) references telep(id)
);

insert into epulet (megnevezes, tipus, telep) values ('Kék Mancs Menhely', 'Menhely', 1);
insert into epulet (megnevezes, tipus, telep) values ('Kék Mancs Iroda', 'Iroda', 1);
insert into epulet (megnevezes, tipus, telep) values ('Kék Mancs Raktár', 'Raktár', 2);

--  Szoba létrehozása

create table szoba
(
    id int not null primary key auto_increment,
    tipus varchar(100) not null,
    kapacitas int,
    epulet int,
    foreign key (epulet) references epulet(id)
);

insert into szoba(tipus, kapacitas, epulet) values ('Váró', 20, 1);
insert into szoba(tipus, kapacitas, epulet) values ('Kennel', 2, 1);
insert into szoba(tipus, kapacitas, epulet) values ('Iroda', 20, 2);

-- A szoba tábla létrehozása után, létrehozhatjuk az alkalmazott táblát

create table alkalmazott
(
    id int not null primary key auto_increment,
    nev varchar(50) not null,
    username varchar(50) not null,
    password varchar(50) not null,
    jogviszony varchar(50),
    szoba int,
    foreign key (jogviszony) references jogviszony(megnevezes),
    foreign key (szoba) references szoba(id)
);

insert into alkalmazott(nev, username, password, jogviszony, szoba) values ('Kovács Norbert', 'norbert', 'n', 'Állatgondozó', 1);
insert into alkalmazott(nev, username, password, jogviszony, szoba) values ('Mádli Boglárka', 'bogi', 'b', 'Önkéntes', 1);


-- Esemény tábla létrehozása
create table esemeny
(
    id int not null primary key auto_increment,
    megnevezes varchar(50) not null,
    leiras varchar(255),
    idopont date,
    epulet int,
    foreign key (epulet) references epulet(id)
);

insert into esemeny(megnevezes, leiras, epulet)
values
('Séta', 'Ezen alkalommal a menhely minden kutyáját, egy közös sétára viszik az alkalmazottak.', 1);

-- Résztvesz kapcsolótábla
create table resztvesz
(
    esemeny int,
    alkalmazott int
    foreign key (esemeny) references esemeny(id),
    foreign key (alkalmazott) references alkalmazott(id)
);

insert into resztvesz(esemeny, alkalmazott) values (1,3);
insert into resztvesz(esemeny, alkalmazott) values (1,4);

-- Állat tábla létrehozása
-- Az életkort később megkell oldani
create table allat
(
    id int not null primary key auto_increment,
    nev varchar(200) not null,
    nem varchar(20) not null,
    tipus varchar(100) not null,
    szuletes date, 
    eletkor int,
    orokbefogado int,
    szoba int,
    foreign key (orokbefogado) references orokbefogado(id),
    foreign key (szoba) references szoba(id)
);

insert into allat (nev, nem, tipus, szoba) values ('Csöpi', 'Fiú', 'Kutya', 2);
insert into allat (nev, nem, tipus, szoba) values ('Lucky', 'Lány', 'Kutya', 2);

Ezzel sikerült elkészítenünk az adatbázist, és pár példa adattal
(a teljesség igénye nélkül), feltölteni, a weboldal tesztelése céljából,
és a további munka folytatása szempontjából.



-- Az állat tábla létrehozásakor, kihagytuk az állathoz tartozó kép tárolásához szükséges mezőt.
-- a következő parancsal fogjuk hozzáadni ezt:

*/



/* Módosított adatbázis tábláinak létrehozása */
-- =================================== ---


-- Régió tábla létrehozása
create table regio(
    id int primary key auto_increment,
    nev varchar(50) not null,
    leiras text
);

-- Épület tábla
create table epulet(
    id int primary key auto_increment,
    nev varchar(50) not null,
    leiras text,
    regio int,
    foreign key (regio) references regio(id)
);

-- Iroda
create table iroda(
    id int primary key auto_increment,
    nev varchar(50) not null,
    kapacitas int not null,
    epulet int,
    foreign key (epulet) references epulet(id)
);

-- Kutya
create table kutya(
    id int primary key auto_increment,
    nev varchar(50) not null,
    leiras text,
    nem tinyint,
    szul_ev date,
    kep_eleres varchar(1024),
    epulet int,
    foreign key (epulet) references epulet(id)
);

-- Munkakör
create table munkakor(
    id int primary key auto_increment,
    nev varchar(50) not null,
    leiras text,
    fizetes int
);

-- Alkalmazott
create table alkalmazott(
    id int primary key auto_increment,
    nev varchar(50) not null,
    iroda int,
    munkakor int,
    foreign key (iroda) references iroda(id),
    foreign key (munkakor) references munkakor(id)
);

-- Feladatkor
create table feladatkor(
    id int primary key auto_increment,
    nev varchar(50) not null,
    leiras text
);

-- Rendelkezik kapcsolótábla
create table rendelkezik(
    feladatkor int,
    munkakor int,
    foreign key (feladatkor) references feladatkor(id),
    foreign key (munkakor) references munkakor(id)
);

-- Később adatokat felviszünk