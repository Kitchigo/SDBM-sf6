<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Typebiere
 *
 * @ORM\Table(name="typebiere")
 * @ORM\Entity
 */
class Typebiere
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_TYPE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idType;

    /**
     * @var string
     *
     * @ORM\Column(name="NOM_TYPE", type="string", length=25, nullable=false)
     */
    private $nomType;

    public function getIdType(): ?int
    {
        return $this->idType;
    }

    public function getNomType(): ?string
    {
        return $this->nomType;
    }

    public function setNomType(string $nomType): self
    {
        $this->nomType = $nomType;

        return $this;
    }

    public function __toString()
    {
        return $this->nomType;
    }
}
