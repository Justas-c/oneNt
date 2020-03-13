<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NewProjectRepository")
 */
class NewProject
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Pavadinimas;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Intro;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresas;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Aprasymas;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mainimg;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $plotas;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPavadinimas(): ?string
    {
        return $this->Pavadinimas;
    }

    public function setPavadinimas(string $Pavadinimas): self
    {
        $this->Pavadinimas = $Pavadinimas;

        return $this;
    }

    public function getIntro(): ?string
    {
        return $this->Intro;
    }

    public function setIntro(?string $Intro): self
    {
        $this->Intro = $Intro;

        return $this;
    }

    public function getAdresas(): ?string
    {
        return $this->adresas;
    }

    public function setAdresas(string $adresas): self
    {
        $this->adresas = $adresas;

        return $this;
    }

    public function getAprasymas(): ?string
    {
        return $this->Aprasymas;
    }

    public function setAprasymas(?string $Aprasymas): self
    {
        $this->Aprasymas = $Aprasymas;

        return $this;
    }

    public function getMainimg(): ?string
    {
        return $this->mainimg;
    }

    public function setMainimg(string $mainimg): self
    {
        $this->mainimg = $mainimg;

        return $this;
    }

    public function getPlotas(): ?string
    {
        return $this->plotas;
    }

    public function setPlotas(?string $plotas): self
    {
        $this->plotas = $plotas;

        return $this;
    }
}
