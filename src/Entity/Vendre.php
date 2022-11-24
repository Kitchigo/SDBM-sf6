<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vendre
 *
 * @ORM\Table(name="vendre")
 * @ORM\Entity(repositoryClass="App\Repository\VendreRepository")
 */
class Vendre
{
    /**
     * @var float
     *
     * @ORM\Column(name="PRIX_VENTE", type="float", precision=10, scale=0, nullable=true)
     */
    private ?float $prixVente = null;

    public function getPrixVente(): ?float
    {
        return $this->prixVente;
    }

    /**
     * @var int
     *
     * @ORM\Column(name="QUANTITE", type="integer", precision=10, scale=0, nullable=true)
     */
    private ?float $quantite = null;

    public function getQuantite(): ?float
    {
        return $this->quantite;
    }

    /**
     * @var \Article
     *
     * @ORM\ManyToOne(targetEntity="Article")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_ARTICLE", referencedColumnName="ID_ARTICLE")
     * })
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idArticle;

    /**
     * @var int
     *
     * @ORM\Column(name="ANNEE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $annee;

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(?int $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * @var int
     *
     * @ORM\Column(name="NUMERO_TICKET", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $numeroTicket;


    public function getNumeroTicket(): ?int
    {
        return $this->numeroTicket;
    }


    public function setNumeroTicket(?int $numeroTicket): self
    {
        $this->numeroTicket = $numeroTicket;

        return $this;
    }
    
    public function setPrixVente(?float $prixVente): self
    {
        $this->prixVente = $prixVente;

        return $this;
    }

    public function setQuantite(?float $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

 
    public function getIdArticle(): ?Article
    {
        return $this->idArticle;
    }

    public function setIdArticle(?Article $idArticle): self
    {
        $this->idArticle = $idArticle;

        return $this;
    }

 
}
