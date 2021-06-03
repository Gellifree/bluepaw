/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  Norbert
 * Created: 2021. jún. 1.
 */

Create table shelter
(
    id int not null AUTO_INCREMENT,
    nev varchar(500) not null,
    leiras text default null,
    aktiv tinyint default 1,
    
    constraint PK_shelterek primary key(id)
);

insert into shelter(nev) values ('Eger');
insert into shelter(nev) values ('Jászberény');