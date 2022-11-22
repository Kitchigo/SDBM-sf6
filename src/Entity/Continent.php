<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Continent
 *
 * @ORM\Table(name="continent")
 * @ORM\Entity
 */
class Continent
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_CONTINENT", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idContinent;

    /**
     * @var string
     *
     * @ORM\Column(name="NOM_CONTINENT", type="string", length=25, nullable=false)
     */
    private $nomContinent;

    public function getIdContinent(): ?int
    {
        return $this->idContinent;
    }

    public function getNomContinent(): ?string
    {
        return $this->nomContinent;
    }

    public function setNomContinent(string $nomContinent): self
    {
        $this->nomContinent = $nomContinent;

        return $this;
    }


}
