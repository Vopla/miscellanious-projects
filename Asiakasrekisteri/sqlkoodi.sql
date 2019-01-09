/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  X555L
 * Created: 6.10.2017
 */
drop database if exists asiakasrekisteri;

create database asiakasrekisteri;

use asiakasrekisteri;

create table asiakas(
    id int primary key auto_increment,
    etunimi varchar(50) not null,
    sukunimi varchar(50) not null,
    email varchar(255)
);

insert into asiakas (etunimi,sukunimi,email) values ('Jouni','Juntunen','jouni.juntunen@oamk.fi');
