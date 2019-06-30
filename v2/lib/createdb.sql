DROP TABLE IF EXISTS telefoons;
CREATE TABLE telefoons (
    id INT NOT NULL AUTO_INCREMENT,
    model VARCHAR(50),
    fabrikant VARCHAR(50),
    geheugen int,
    prijs int,
    PRIMARY KEY (id)
);