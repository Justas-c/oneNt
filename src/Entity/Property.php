<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;
/**
 * @ORM\Entity(repositoryClass="App\Repository\PropertyRepository")
 */
class Property implements JsonSerializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $gatve;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $plotas;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $kambariu_skaicius;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $miestas;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $butonr;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $aukstas;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $apdaila;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $content;

     /**
      * @ORM\Column(type="integer", nullable=true)
      */
    private $kaina;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $type;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nuotraukos;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $rajonas;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGatve(): ?string
    {
        return $this->gatve;
    }

    public function setGatve(?string $gatve): self
    {
        $this->gatve = $gatve;

        return $this;
    }

    public function getPlotas(): ?int
    {
        return $this->plotas;
    }

    public function setPlotas(?int $plotas): self
    {
        $this->plotas = $plotas;

        return $this;
    }

    public function getKambariuSkaicius(): ?int
    {
        return $this->kambariu_skaicius;
    }

    public function setKambariuSkaicius(?int $kambariu_skaicius): self
    {
        $this->kambariu_skaicius = $kambariu_skaicius;

        return $this;
    }

    public function getMiestas(): ?string
    {
        return $this->miestas;
    }

    public function setMiestas(?string $miestas): self
    {
        $this->miestas = $miestas;

        return $this;
    }

    public function getButonr(): ?string
    {
        return $this->butonr;
    }

    public function setButonr(?string $butonr): self
    {
        $this->butonr = $butonr;

        return $this;
    }

    public function getAukstas(): ?int
    {
        return $this->aukstas;
    }

    public function setAukstas(?int $aukstas): self
    {
        $this->aukstas = $aukstas;

        return $this;
    }

    public function getapdaila(): ?string
    {
        return $this->apdaila;
    }

    public function setapdaila(?string $apdaila): self
    {
        $this->apdaila = $apdaila;

        return $this;
    }

    public function getKaina(): ?string
    {
        return $this->kaina;
    }

    public function setKaina(?string $kaina): self
    {
        $this->apdaila = $kaina;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getNuotraukos(): ?string
    {
        return $this->nuotraukos;
    }

    public function setNuotraukos(?string $nuotraukos): self
    {
        $this->nuotraukos = $nuotraukos;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getRajonas(): ?string
    {
        return $this->rajonas;
    }

    public function setRajonas(?string $rajonas): self
    {
        $this->rajonas = $rajonas;

        return $this;
    }

    public function jsonSerialize()
{
    return
    [
        'id'   => $this->getId(),
        'gatve' => $this->getGatve(),
        'plotas' => $this->getPlotas(),
        'miestas' => $this->getMiestas(),
        'butonr' => $this->getButonr(),
        'aukstas' => $this->getAukstas(),
        'apdaila' => $this->getapdaila(),
        'kaina' => $this->getKaina(),
        'nuotraukos' => $this->getNuotraukos(),
        'type' => $this->getType(),
        'rajonas' => $this->getRajonas(),
        'KambariuSkaicius' => $this->getKambariuSkaicius(),

    ];
}


}
