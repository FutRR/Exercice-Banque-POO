<?php

class Titulaire
{
    private string $nom;
    private string $prenom;
    private DateTime $birthDate;
    private string $ville;
    private array $comptes;

    public function __construct(string $nom, string $prenom, string $birthDate, string $ville)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->birthDate = new dateTime($birthDate);
        $this->ville = $ville;
        $this->comptes = [];
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom)
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getBirthDate(): DateTime
    {
        return $this->birthDate;
    }

    public function setBirthDate(DateTime $birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getVille(): string
    {
        return $this->ville;
    }

    public function setVille(string $ville)
    {
        $this->ville = $ville;

        return $this;
    }

    public function getComptes()
    {
        return $this->comptes;
    }

    public function setComptes($comptes)
    {
        $this->comptes = $comptes;

        return $this;
    }

    public function addComptes(Compte $compte)
    {
        $this->comptes[] = $compte;
    }

    public function getAge()
    {
        $now = new DateTime();
        $interval = $this->birthDate->diff($now);
        return $interval->format("%Y");
    }

    public function getInfos()
    {
        $result = "$this :<br>";
        foreach ($this->comptes as $compte) {
            $result .= " $compte <br>";
        }
        $result .= "<br>";
        return $result;
    }

    public function __toString()
    {
        return "$this->nom $this->prenom | " . $this->getAge() . " ans | $this->ville ";
    }


}

