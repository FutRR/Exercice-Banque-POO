<?php

class Compte
{
    private string $libellé;
    private float $solde;
    private string $devise;
    private Titulaire $titulaire;

    public function __construct(string $libellé, float $solde, string $devise, Titulaire $titulaire)
    {
        $this->libellé = $libellé;
        $this->solde = $solde;
        $this->devise = $devise;
        $this->titulaire = $titulaire;
        $this->titulaire->addComptes($this);
    }

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

    public function addSolde(float $crediter)
    {
        $this->solde += $crediter;
        return "Ajout de $crediter " . $this->devise . " au " . $this->libellé . "<br>
                Solde total du $this<br><br>";
    }

    public function removeSolde(float $retrait)
    {
        $this->solde -= $retrait;
        return "Retrait de $retrait " . $this->devise . " au " . $this->libellé . "<br>
                Solde total du $this<br><br>";
    }

    public function virement(float $virement, Compte $compte)
    {
        $this->solde -= $virement;
        $compte->addSolde($virement);
        return "Virement de $virement $this->devise de $this->libellé à $compte->libellé <br><br>";
    }

    public function getInfos()
    {
        return "$this - " . $this->titulaire->getNom() . " " . $this->titulaire->getPrenom() . "<br><br>";
    }

    public function __toString()
    {
        return "$this->libellé : $this->solde $this->devise";
    }

}