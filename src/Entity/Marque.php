<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Marque
 *
 * @ORM\Table(name="marque", indexes={@ORM\Index(name="FK_MARQUE_FABRICANT", columns={"ID_FABRICANT"}), @ORM\Index(name="FK_MARQUE_PAYS", columns={"ID_PAYS"})})
 * @ORM\Entity
 */
class Marque
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_MARQUE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMarque;

    /**
     * @var string
     *
     * @ORM\Column(name="NOM_MARQUE", type="string", length=40, nullable=false)
     */
    private $nomMarque;

    /**
     * @var \Fabricant
     *
     * @ORM\ManyToOne(targetEntity="Fabricant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_FABRICANT", referencedColumnName="ID_FABRICANT")
     * })
     */
    private $idFabricant;

    /**
     * @var \Pays
     *
     * @ORM\ManyToOne(targetEntity="Pays")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_PAYS", referencedColumnName="ID_PAYS")
     * })
     */
    private $idPays;

    public function getIdMarque(): ?int
    {
        return $this->idMarque;
    }

    public function getNomMarque(): ?string
    {
        return $this->nomMarque;
    }

    public function setNomMarque(string $nomMarque): self
    {
        $this->nomMarque = $nomMarque;

        return $this;
    }

    public function getIdFabricant(): ?Fabricant
    {
        return $this->idFabricant;
    }

    public function setIdFabricant(?Fabricant $idFabricant): self
    {
        $this->idFabricant = $idFabricant;

        return $this;
    }

    public function getIdPays(): ?Pays
    {
        return $this->idPays;
    }

    public function setIdPays(?Pays $idPays): self
    {
        $this->idPays = $idPays;

        return $this;
    }

    public function __toString()
    {
        return $this->nomMarque;
    }
}
