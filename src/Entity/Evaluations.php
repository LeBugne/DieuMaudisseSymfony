<?php

namespace App\Entity;

use App\Repository\EvaluationsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EvaluationsRepository::class)]
class Evaluations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 2056, nullable: true)]
    private ?string $commentaire = null;

    #[ORM\Column(nullable: true)]
    private ?int $note = null;

    #[ORM\ManyToOne(inversedBy: 'evaluations')]
    private ?Utilisateur $utilisateur = null;

    #[ORM\OneToOne(mappedBy: 'evaluation', cascade: ['persist', 'remove'])]
    private ?Prestations $prestation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): static
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(?int $note): static
    {
        $this->note = $note;

        return $this;
    }

    public function getIdUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setIdUtilisateur(?Utilisateur $utilisateur): static
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getPrestation(): ?Prestations
    {
        return $this->prestation;
    }

    public function setPrestation(?Prestations $prestation): static
    {
        // unset the owning side of the relation if necessary
        if ($prestation === null && $this->prestation !== null) {
            $this->prestation->setIdEvaluation(null);
        }

        // set the owning side of the relation if necessary
        if ($prestation !== null && $prestation->getIdEvaluation() !== $this) {
            $prestation->setIdEvaluation($this);
        }

        $this->prestation = $prestation;

        return $this;
    }
}
