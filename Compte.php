<?php

class Compte
{
    // Declaring the properties
    private string $libellé;
    private float $solde;
    private string $devise;
    private Titulaire $titulaire;

    public function __construct(string $libellé, float $solde, string $devise, Titulaire $titulaire)
    {
        $this->libellé = $libellé;
        $this->solde = $solde;
        $this->devise = $devise;
        //Initializing titulaire twice : once to a string and once to an array
        $this->titulaire = $titulaire;
        $this->titulaire->addComptes($this);
    }

    //Getters & Setters//

    public function getLibellé(): string
    {
        return $this->libellé;
    }

    public function setLibellé(string $libellé)
    {
        $this->libellé = $libellé;

        return $this;
    }

    public function getSolde(): float
    {
        return $this->solde;
    }

    public function setSolde(float $solde)
    {
        $this->solde = $solde;

        return $this;
    }

    public function getDevise(): string
    {
        return $this->devise;
    }

    public function setDevise(string $devise)
    {
        $this->devise = $devise;

        return $this;
    }

    public function getTitulaire(): Titulaire
    {
        return $this->titulaire;
    }

    public function setTitulaire(Titulaire $titulaire)
    {
        $this->titulaire = $titulaire;

        return $this;
    }

    //Additioning the method parameter to the object's balance for a deposit function

    public function addSolde(float $crediter)
    {
        $this->solde += $crediter;
        return "Ajout de $crediter " . $this->devise . " au " . $this->libellé . "<br>
                Solde total du $this<br><br>";
    }

    //Substracting the method parameter to the object's balance for a withdraw function
    //if/else condition so the user can't withdraw more money that they have available 
    public function removeSolde(float $retrait)
    {
        if ($retrait <= $this->solde) {
            $this->solde -= $retrait;
            return "Retrait de $retrait " . $this->devise . " au " . $this->libellé . "<br>
                Solde total du $this<br><br>";
        } else {
            return "Vous ne pouvez pas retirer autant<br>";
        }
    }

    //Substracting the function's parameter from the object's balance and adding it to another object's balance for a transfer function

    public function virement(float $virement, Compte $compte)
    {
        $this->solde -= $virement;
        $compte->addSolde($virement);
        return "Virement de $virement $this->devise de $this->libellé à $compte->libellé <br><br>";
    }

    //Displaying the required information

    public function getInfos()
    {
        return "$this - " . $this->titulaire->getNom() . " " . $this->titulaire->getPrenom() . "<br><br>";
    }

    public function __toString()
    {
        return "$this->libellé : $this->solde $this->devise";
    }

}