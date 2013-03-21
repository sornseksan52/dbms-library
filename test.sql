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
    bookname varchar(100) NOT NULL,
    author varchar(100) NOT NULL,
    number varchar(60) NOT NULL,
    state varchar(60) NOT NULL,
    reservation_number smallint  NOT NULL,
    publish year NOT NULL,
    PRIMARY KEY(number)
);
insert into books values('PHP for the Web','Larry Edward','505513','available',0,2011);
drop table books;
create table user_borrowed(
    username VARCHAR(60) NOT NULL,
    bookname varchar(100) NOT NULL,
    number varchar(60) NOT NULL,
    borrowed_date DATE NOT NULL,
    due_date DATE NOT NULL,
    FOREIGN KEY(username) REFERENCES users(username),
    FOREIGN KEY(number) REFERENCES books(number),
    PRIMARY KEY(number)
);
drop table user_borrowed;
insert into user_borrowed values('mht','PHP for the Web','505513','2011-09-05','2011-10-05');
show tables;
