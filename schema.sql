-- database for phpcrud
create database if not exists phpcrud;
use phpcrud;
-- create table for users
create table if not exists users (
    id int(3) primary key auto_increment,
    name varchar(30) not null,
    location varchar(30) not null,
);