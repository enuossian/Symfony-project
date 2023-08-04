<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\EmployesRepository;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints as Assert;



#[ORM\Entity(repositoryClass: EmployesRepository::class)]
class Employes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[NotBlank(message:'Ce champ ne peut pas être vide')]
    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[NotBlank(message:'Ce champ ne peut pas être vide')]
    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[NotBlank(message:'Ce champ ne peut pas être vide')]
    #[ORM\Column(length: 255)]
    private ?string $telephone = null;

    #[NotBlank(message:'Ce champ ne peut pas être vide')]
    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[NotBlank(message:'Ce champ ne peut pas être vide')]
    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[NotBlank(message:'Ce champ ne peut pas être vide')]
    #[ORM\Column(length: 255)]
    private ?string $poste = null;

    #[NotBlank(message:'Ce champ ne peut pas être vide')]
    #[ORM\Column]
    private ?int $salaire = null;

    #[NotBlank(message:'Selectionnez une date')]
    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datedenaissance = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function setPoste(string $poste): static
    {
        $this->poste = $poste;

        return $this;
    }

    public function getSalaire(): ?int
    {
        return $this->salaire;
    }

    public function setSalaire(int $salaire): static
    {
        $this->salaire = $salaire;

        return $this;
    }

    public function getDatedenaissance(): ?\DateTimeInterface
    {
        return $this->datedenaissance;
    }

    public function setDatedenaissance(\DateTimeInterface $datedenaissance): static
    {
        $this->datedenaissance = $datedenaissance;

        return $this;
    }
}
