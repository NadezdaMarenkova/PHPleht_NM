CREATE TABLE uudised(
                        id int primary key AUTO_INCREMENT,
                        teema varchar(30),
                        kuupaev date,
                        kirjeldus TEXT);

insert into uudised(teema, kuupaev, kirjeldus)
VALUES ('ilm', '2023-09-12', 'Täna on soe ilm.');
SELECT * FROM uudised;



ALTER TABLE uudised ADD COLUMN varv varchar(15);



CREATE table kalad (
                       id int Primary Key AUTO_INCREMENT,
                       kalanimi varchar(20),
                       pilt TEXT,
                       varv varchar(10));
INSERT INTO kalad(kalanimi)
VALUES ('forell');
SELECT * FROM kalad;

/////





CREATE TABLE eestilaul(
                          id INT NOT NULL AUTO_INCREMENT primary key,
                          laulunimi varchar(50) not null,
                          laulja varchar(50),
                          punktid int,
                          kommentaarid text,
                          avalik int DEFAULT 1);

INSERT INTO eestilaul(
    laulunimi, laulja, punktid)
values ('Droonid','Nublu', 35);
select * from eestilaul;

//

UPDATE eestilaul set punktid=25
WHERE id = 1;
select * from eestilaul;