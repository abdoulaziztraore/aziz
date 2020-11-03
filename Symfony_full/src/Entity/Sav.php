<?php

namespace App\Entity;

use App\Repository\SavRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SavRepository::class)
 */
class Sav
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $sav_nom;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $sav_prenom;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $sav_adr1;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $sav_adr2;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $sav_codepos;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $sav_ville;

    /**
     * @ORM\Column(type="text")
     */
    private $sav_probleme;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dt_crea;

    /**
     * @ORM\OneToMany(targetEntity=Client::class, mappedBy="sav")
     */
    private $client;

    public function __construct()
    {
        $this->client = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSavNom(): ?string
    {
        return $this->sav_nom;
    }

    public function setSavNom(string $sav_nom): self
    {
        $this->sav_nom = $sav_nom;

        return $this;
    }

    public function getSavPrenom(): ?string
    {
        return $this->sav_prenom;
    }

    public function setSavPrenom(?string $sav_prenom): self
    {
        $this->sav_prenom = $sav_prenom;

        return $this;
    }

    public function getSavAdr1(): ?string
    {
        return $this->sav_adr1;
    }

    public function setSavAdr1(string $sav_adr1): self
    {
        $this->sav_adr1 = $sav_adr1;

        return $this;
    }

    public function getSavAdr2(): ?string
    {
        return $this->sav_adr2;
    }

    public function setSavAdr2(?string $sav_adr2): self
    {
        $this->sav_adr2 = $sav_adr2;

        return $this;
    }

    public function getSavCodepos(): ?string
    {
        return $this->sav_codepos;
    }

    public function setSavCodepos(string $sav_codepos): self
    {
        $this->sav_codepos = $sav_codepos;

        return $this;
    }

    public function getSavVille(): ?string
    {
        return $this->sav_ville;
    }

    public function setSavVille(string $sav_ville): self
    {
        $this->sav_ville = $sav_ville;

        return $this;
    }

    public function getSavProbleme(): ?string
    {
        return $this->sav_probleme;
    }

    public function setSavProbleme(string $sav_probleme): self
    {
        $this->sav_probleme = $sav_probleme;

        return $this;
    }

    public function getDtCrea(): ?\DateTimeInterface
    {
        return $this->dt_crea;
    }

    public function setDtCrea(\DateTimeInterface $dt_crea): self
    {
        $this->dt_crea = $dt_crea;

        return $this;
    }

    /**
     * @return Collection|Client[]
     */
    public function getClient(): Collection
    {
        return $this->client;
    }

    public function addClient(Client $client): self
    {
        if (!$this->client->contains($client)) {
            $this->client[] = $client;
            $client->setSav($this);
        }

        return $this;
    }

    public function removeClient(Client $client): self
    {
        if ($this->client->removeElement($client)) {
            // set the owning side to null (unless already changed)
            if ($client->getSav() === $this) {
                $client->setSav(null);
            }
        }

        return $this;
    }
}
