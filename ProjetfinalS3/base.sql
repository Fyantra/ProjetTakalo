
CREATE TABLE utilisateur(
    id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom VARCHAR(255),
    mail VARCHAR(255),
    mdp VARCHAR(255)
);

CREATE TABLE categorie(
    id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom VARCHAR(255)
);

CREATE TABLE objet(
    id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    idcategorie INTEGER NOT NULL,
    idutilisateur INTEGER NOT NULL,
    nom VARCHAR(255),
    description TEXT,
    prix DOUBLE PRECISION,
    FOREIGN KEY(idcategorie) REFERENCES categorie(id) ON DELETE CASCADE,
    FOREIGN KEY(idutilisateur) REFERENCES utilisateur(id) ON DELETE CASCADE
);

CREATE TABLE photo(    id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    idobjet INTEGER NOT NULL,
    photo VARCHAR(255),
    FOREIGN KEY(idobjet) REFERENCES objet(id) ON DELETE CASCADE
);

CREATE TABLE proposition(
    id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    idobjet1 INTEGER NOT NULL,
    idobjet2 INTEGER NOT NULL,
    date DATETIME,
    etat INTEGER,
    FOREIGN KEY(idobjet1) REFERENCES objet(id) ON DELETE CASCADE,
    FOREIGN KEY(idobjet2) REFERENCES objet(id) ON DELETE CASCADE
);

INSERT INTO utilisateur(nom,mail,mdp) VALUES('admin','admin@gmail.com','0000'),('Stephane','stephane@gmail.com','0000'),('Anthonio','anthonio@gmail.com','1111'),('Ricardo','ricardo@gmail.com','2222');

INSERT INTO categorie(nom) VALUES ('vetement'),('appareil'),('meuble');

INSERT INTO objet(idcategorie,idutilisateur,nom,description,prix) VALUES(1,2,'tee-shirt','taille L, marque nike',10000),(1,2,'blouson','taille M, marque addidas',20000),(2,2,'frigo','longueur 2m largeur 1m',3000000),
                                                        (2,3,'ventilateur','marque MIDEA, vitesse 3',60000),(2,3,'radio','Muse M-06 DS Radio de cuisine (FM, ondes moyennes MW) Fonctionne sur secteur et sur piles Entrée AUX pour téléphone portable',40000),
                                                        (3,3,'table','ronge palisandre',100000),
                                                        (3,4,'chaise','pour bebe en plastique',12000),(1,4,'chemise','taille XL',5000),(1,4,'jean','pointure 35',7000);

INSERT INTO photo(idobjet,photo) VALUES(1,'assets/image/tee_shirt.png'),(2,'assets/image/blouson.png'),(3,'assets/image/frigo.png'),(4,'assets/image/ventilateur.png'),(5,'assets/image/radio.png'),
                (6,'assets/image/table.png'),(7,'assets/image/chaise.png'),(8,'assets/image/chemise.png'),(9,'assets/image/jean.png');





