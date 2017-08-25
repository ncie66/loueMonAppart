drop database if exists appartfinal;

CREATE DATABASE appartfinal;

use appartfinal;
select * from user;


CREATE TABLE user(
id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(255),
mail VARCHAR(255),
password VARCHAR(255),
photo VARCHAR(255)
)engine=innoDb, character set=UTF8;




CREATE TABLE appartfinal(
id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
user_id integer not null,
categorie VARCHAR(255),
titre VARCHAR(255),
description VARCHAR(255),
foreign key (user_id) references user(id)

)engine=innoDb, character set=UTF8;


INSERT INTO `appartfinal` VALUES (17,1,'studio','',''),(18,1,'studio','',''),(19,1,'studio','',''),(20,1,'studio','','');
iNSERT INTO `user` VALUES (1,'test','test@test.com','test'),(8,'test2','touffic@yahoo.fr','test'),(9,'tttt','Appartement F2','fdfdfd'),(10,'tttt','Appartement F2','fdfdfd'),(11,'tttt','Appartement F2','fdfdfd'),(12,'tttt','Appartement F2','fdfdfd'),(13,'tttt','Appartement F2','fdfdfd'),(14,'tttt','Appartement F2','fdfdfd'),(15,'tttt','Appartement F2','fdfdfd'),(16,'','Appartement F2','fdfdfd'),(17,'tttt','studio','aaaa'),(18,'','studio','aaaa'),(19,'fdfd','studio','fdfdf'),(20,'','studio','fdfdf'),(21,'fgdgf','studio','gfgfg'),(22,'','studio','gfgfg');
