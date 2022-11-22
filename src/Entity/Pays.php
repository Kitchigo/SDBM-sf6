<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pays
 *
 * @ORM\Table(name="pays", indexes={@ORM\Index(name="FK_PAYS_CONTINENT", columns={"ID_CONTINENT"})})
 * @ORM\Entity
 */
class Pays
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_PAYS", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPays;

    /**
     * @var string
     *
     * @ORM\Column(name="NOM_PAYS", type="string", length=40, nullable=false)
     */
    private $nomPays;

    /**
     * @var \Continent
     *
     * @ORM\ManyToOne(targetEntity="Continent")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_CONTINENT", referencedColumnName="ID_CONTINENT")
     * })
     */
    private $idContinent;

    public function getIdPays(): ?int
    {
        return $this->idPays;
    }

    public function getNomPays(): ?string
    {
        return $this->nomPays;
    }

    public function setNomPays(string $nomPays): self
    {
        $this->nomPays = $nomPays;

        return $this;
    }

    public function getIdContinent(): ?Continent
    {
        return $this->idContinent;
    }

    public function setIdContinent(?Continent $idContinent): self
    {
        $this->idContinent = $idContinent;

        return $this;
    }


}
