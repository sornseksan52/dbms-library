drop database library;
create database library;
Create TABLE users(
    username VARCHAR(60) NOT NULL,
    email_addr VARCHAR(60) NOT NULL,
    passwd VARCHAR(60) NOT NULL,
    PRIMARY KEY(username)
);
drop table users;
insert into users values ('mht','qrnnis2623891@gmail.com',md5('mht5566'));
Create TABLE books(
    bookname varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    author varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    number varchar(60) NOT NULL,
    state varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    publish year NOT NULL,
    class varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY(number)
);
insert into books values('徹底研究PHP','Larry Edward','505513','unavailable',2011,'php');
insert into books values('PHP for the Web2','Amy Edward','505523','available',2011,'php');
insert into books values('王者歸來 : PHP完全開發範例集','潘凱華','507658','在架上',2011,'php');
insert into books values('PHP大師 : 寫出頂尖的程式碼','Mitchell, Lorna','505513','在架上',2012,'php');
select *
from books
where bookname like '%徹底研究%';
drop table books;
create table user_borrowed(
    username VARCHAR(60) NOT NULL,
    bookname varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    number varchar(60) NOT NULL,
    FOREIGN KEY(username) REFERENCES users(username),
    FOREIGN KEY(number) REFERENCES books(number),
    PRIMARY KEY(number)
);
drop table user_borrowed;
insert into user_borrowed values('mht','PHP for the Web','505513');
show tables;
