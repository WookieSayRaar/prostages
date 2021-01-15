<?php

namespace App\Entity;

use App\Repository\StageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StageRepository::class)
 */
class Stage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $Code;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $Titre;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $Activite;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $Description;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $Email;

    /**
     * @ORM\ManyToMany(targetEntity=Formation::class, inversedBy="formations")
     */
    private $Formation;

    /**
     * @ORM\ManyToOne(targetEntity=Entreprise::class, inversedBy="entreprises")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Entreprise;

    public function __construct()
    {
        $this->Formation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?int
    {
        return $this->Code;
    }

    public function setCode(int $Code): self
    {
        $this->Code = $Code;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getActivite(): ?string
    {
        return $this->Activite;
    }

    public function setActivite(string $Activite): self
    {
        $this->Activite = $Activite;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    /**
     * @return Collection|Formation[]
     */
    public function getFormation(): Collection
    {
        return $this->Formation;
    }

    public function addFormation(Formation $formation): self
    {
        if (!$this->Formation->contains($formation)) {
            $this->Formation[] = $formation;
        }

        return $this;
    }

    public function removeFormation(Formation $formation): self
    {
        $this->Formation->removeElement($formation);

        return $this;
    }

    public function getEntreprise(): ?Entreprise
    {
        return $this->Entreprise;
    }

    public function setEntreprise(?Entreprise $Entreprise): self
    {
        $this->Entreprise = $Entreprise;

        return $this;
    }
}
