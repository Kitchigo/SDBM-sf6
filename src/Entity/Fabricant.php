<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fabricant
 *
 * @ORM\Table(name="fabricant")
 * @ORM\Entity
 */
class Fabricant
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_FABRICANT", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFabricant;

    /**
     * @var string
     *
     * @ORM\Column(name="NOM_FABRICANT", type="string", length=40, nullable=false)
     */
    private $nomFabricant;

    public function getIdFabricant(): ?int
    {
        return $this->idFabricant;
    }

    public function getNomFabricant(): ?string
    {
        return $this->nomFabricant;
    }

    public function setNomFabricant(string $nomFabricant): self
    {
        $this->nomFabricant = $nomFabricant;

        return $this;
    }


}
