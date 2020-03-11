<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PropertyRepository")
 */
class Property
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
    private $kambariuSkaicius;

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
    private $irengimas;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $content;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $nuotraukos = [];

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
        return $this->kambariuSkaicius;
    }

    public function setKambariuSkaicius(?int $kambariuSkaicius): self
    {
        $this->kambariuSkaicius = $kambariuSkaicius;

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

    public function getIrengimas(): ?string
    {
        return $this->irengimas;
    }

    public function setIrengimas(?string $irengimas): self
    {
        $this->irengimas = $irengimas;

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

    public function getNuotraukos(): ?array
    {
        return $this->nuotraukos;
    }

    public function setNuotraukos(?array $nuotraukos): self
    {
        $this->nuotraukos = $nuotraukos;

        return $this;
    }
}
