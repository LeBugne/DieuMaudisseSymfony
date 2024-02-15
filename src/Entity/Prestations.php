<?php

namespace App\Entity;

use App\Repository\PrestationsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrestationsRepository::class)]
#[ORM\InheritanceType("JOINED")]
#[ORM\DiscriminatorColumn(name: 'type', type: 'string')]
#[ORM\DiscriminatorMap(['prestations' => Prestations::class, 'services' => Services::class, 'pret' => Pret::class])]
class Prestations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 2056, nullable: true)]
    private ?string $descr_prestation = null;

    #[ORM\Column(nullable: true)]
    private ?int $cout_prestation = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_debut = null;

    #[ORM\ManyToOne(inversedBy: 'prestations')]
    private ?Litige $litige = null;

    #[ORM\OneToOne(inversedBy: 'prestation', cascade: ['persist', 'remove'])]
    private ?ListeAttente $liste_attente = null;

    #[ORM\OneToOne(inversedBy: 'prestation', cascade: ['persist', 'remove'])]
    private ?Evaluations $evaluation = null;

    #[ORM\ManyToOne(inversedBy: 'prestations_fournisseur')]
    private ?Utilisateur $fournisseur = null;

    #[ORM\ManyToOne(inversedBy: 'prestations_client')]
    private ?Utilisateur $client = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescrPrestation(): ?string
    {
        return $this->descr_prestation;
    }

    public function setDescrPrestation(?string $descr_prestation): static
    {
        $this->descr_prestation = $descr_prestation;

        return $this;
    }

    public function getCoutPrestation(): ?int
    {
        return $this->cout_prestation;
    }

    public function setCoutPrestation(?int $cout_prestation): static
    {
        $this->cout_prestation = $cout_prestation;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(?\DateTimeInterface $date_debut): static
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getIdLitige(): ?Litige
    {
        return $this->litige;
    }

    public function setIdLitige(?Litige $litige): static
    {
        $this->litige = $litige;

        return $this;
    }

    public function getIdListeAttente(): ?ListeAttente
    {
        return $this->liste_attente;
    }

    public function setIdListeAttente(?ListeAttente $liste_attente): static
    {
        $this->liste_attente = $liste_attente;

        return $this;
    }

    public function getIdEvaluation(): ?Evaluations
    {
        return $this->evaluation;
    }

    public function setIdEvaluation(?Evaluations $evaluation): static
    {
        $this->evaluation = $evaluation;

        return $this;
    }

    public function getIdFournisseur(): ?Utilisateur
    {
        return $this->fournisseur;
    }

    public function setIdFournisseur(?Utilisateur $fournisseur): static
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    public function getIdClient(): ?Utilisateur
    {
        return $this->client;
    }

    public function setIdClient(?Utilisateur $client): static
    {
        $this->client = $client;

        return $this;
    }
}
