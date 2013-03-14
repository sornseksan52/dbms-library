Create TABLE persons(
    id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
    name CHAR(60) NOT NULL,
    PRIMARY KEY(id)
);
Create TABLE shirts(
    id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
    style ENUM('t-shirt','polo','dress') NOT NULL,
    color ENUM('red','blue','orange','white','black') NOT NULL,
    owner SMALLINT UNSIGNED NOT NULL REFERENCES persons,
    PRIMARY KEY(id)
);
show tables;
