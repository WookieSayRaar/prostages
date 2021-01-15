<?php

namespace App\Entity;

use App\Repository\EntrepriseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EntrepriseRepository::class)
 */
class Entreprise
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $siteWeb;

    /**
     * @ORM\Column(type="integer")
     */
    private $tel;

    /**
     * @ORM\OneToMany(targetEntity=Stage::class, mappedBy="Entreprise")
     */
    private $entreprises;

    public function __construct()
    {
        $this->entreprises = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getSiteWeb(): ?string
    {
        return $this->siteWeb;
    }

    public function setSiteWeb(string $siteWeb): self
    {
        $this->siteWeb = $siteWeb;

        return $this;
    }

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(int $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * @return Collection|Stage[]
     */
    public function getEntreprises(): Collection
    {
        return $this->entreprises;
    }

    public function addEntreprise(Stage $entreprise): self
    {
        if (!$this->entreprises->contains($entreprise)) {
            $this->entreprises[] = $entreprise;
            $entreprise->setEntreprise($this);
        }

        return $this;
    }

    public function removeEntreprise(Stage $entreprise): self
    {
        if ($this->entreprises->removeElement($entreprise)) {
            // set the owning side to null (unless already changed)
            if ($entreprise->getEntreprise() === $this) {
                $entreprise->setEntreprise(null);
            }
        }

        return $this;
    }
}
