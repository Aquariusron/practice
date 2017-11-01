/* create table */
create table bbs(
id int not null auto_increment primary key,
name varchar(25) not null,
title varchar(255),
body text not null,
date datetime not null,
pass char(4) not null
)default character set=utf8;

/* grant */
grant all on tennis.bbs to 'tennisuser'@'localhost' identified by '0832';

/* delete once data */
flush privileges;

/* confirm user */
mysql -u tennisuser -p

/* use DB */
use dbname

/* show tables */
show tables

/* describe tables */
desc tablename

/* create user table *
create table users (
										id int primary key not null auto_increment,
										name varchar(255) not null,
										password varchar(255) not null 
										)default character set=utf8;

/* create users record */
insert into users (name, password) values
	('yamada', sha1('yamadapass')),
	('tanaka', sha1('tanakapass')),
	('kikuchi', sha1('kikuchipass'));

/* grant all */
grant all on tennis.users to 'tennisuser'@'localhost' identified by '0832';
