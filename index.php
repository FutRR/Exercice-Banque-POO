<h1>II. Banque</h1>

<p>Vous êtes chargé(e) de créer un projet orienté objet permettant de gérer des titulaires<br>
    et leurs comptes bancaires respectifs.<br>
    Un compte bancaire est composé des éléments suivants :<br>
    Un libellé (compte courant, livret A, ...)<br>
    Un solde initial<br>
    Une devise monétaire<br>
    Un titulaire unique<br>
    Un titulaire comporte :<br>
    Un nom<br>
    Un prénom<br>
    Une date de naissance<br>
    Une ville<br>
    L'ensemble de ses comptes bancaires.<br>
    Sur un compte bancaire, on doit pouvoir :<br>
    Créditer le compte de X euros<br>
    Débiter le compte de X euros<br>
    Effectuer un virement d'un compte à l'autre.<br>
    On doit pouvoir :<br>
    Afficher toutes les informations d'un(e) titulaire (dont l'âge) et l'ensemble des comptes<br>
    appartenant à celui(celle)-ci.<br>
    Afficher toutes les informations d'un compte bancaire, notamment le nom / prénom du<br>
    titulaire du compte.</p>

<h2>Résultats</h2>
<?php

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$t1 = new Titulaire("Dupont", "Michel", "15-04-1986", "Melun");
$t2 = new Titulaire("Obama", "Barack", "01-08-1966", "Washington");


$c1 = new Compte("Compte Courant", "500.00", "€", $t1);
$c2 = new Compte("Livret A", "1250.00", "€", $t1);

$c3 = new Compte("Compte Courant", "50000.00", "$", $t2);
$c4 = new Compte("Livret A", "125000.00", "$", $t2);



echo $t1->getInfos();
echo $c1->getInfos();
echo $c2->getInfos();

echo $c2->addSolde(20);
echo $c1->removeSolde(400000000000);

echo $c2->virement(20, $c1);

echo $c1->getInfos();

echo $t2->getInfos();