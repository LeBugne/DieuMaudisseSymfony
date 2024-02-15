<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]

class Utilisateur extends Personne
{
    #[ORM\Column(nullable: true)]
    private ?int $nb_florains = null;

    #[ORM\Column(nullable: true)]
    private ?int $status_abonnement = null;

    #[ORM\Column(nullable: true)]
    private ?int $status_activites = null;

    #[ORM\OneToMany(targetEntity: Reclamation::class, mappedBy: 'utilisateur', orphanRemoval: true)]
    private Collection $reclamations;

    #[ORM\OneToMany(targetEntity: Inscription::class, mappedBy: 'utilisateur', orphanRemoval: true)]
    private Collection $inscriptions;

    #[ORM\OneToMany(targetEntity: Evaluations::class, mappedBy: 'utilisateur')]
    private Collection $evaluations;

    #[ORM\OneToMany(targetEntity: Prestations::class, mappedBy: 'fournisseur')]
    private Collection $prestations_fournisseur;

    #[ORM\OneToMany(targetEntity: Prestations::class, mappedBy: 'client')]
    private Collection $prestations_client;

    public function __construct()
    {
        $this->reclamations = new ArrayCollection();
        $this->inscriptions = new ArrayCollection();
        $this->evaluations = new ArrayCollection();
        $this->prestations_fournisseur = new ArrayCollection();
        $this->prestations_client = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }


    public function getNbFlorains(): ?int
    {
        return $this->nb_florains;
    }

    public function setNbFlorains(?int $nb_florains): static
    {
        $this->nb_florains = $nb_florains;

        return $this;
    }

    public function getStatusAbonnement(): ?int
    {
        return $this->status_abonnement;
    }

    public function setStatusAbonnement(?int $status_abonnement): static
    {
        $this->status_abonnement = $status_abonnement;

        return $this;
    }

    public function getStatusActivites(): ?int
    {
        return $this->status_activites;
    }

    public function setStatusActivites(?int $status_activites): static
    {
        $this->status_activites = $status_activites;

        return $this;
    }

    /**
     * @return Collection<int, Reclamation>
     */
    public function getReclamations(): Collection
    {
        return $this->reclamations;
    }

    public function addReclamation(Reclamation $reclamation): static
    {
        if (!$this->reclamations->contains($reclamation)) {
            $this->reclamations->add($reclamation);
            $reclamation->setIdUtilisateur($this);
        }

        return $this;
    }

    public function removeReclamation(Reclamation $reclamation): static
    {
        if ($this->reclamations->removeElement($reclamation)) {
            // set the owning side to null (unless already changed)
            if ($reclamation->getIdUtilisateur() === $this) {
                $reclamation->setIdUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Inscription>
     */
    public function getInscriptions(): Collection
    {
        return $this->inscriptions;
    }

    public function addInscription(Inscription $inscription): static
    {
        if (!$this->inscriptions->contains($inscription)) {
            $this->inscriptions->add($inscription);
            $inscription->setIdUtilisateur($this);
        }

        return $this;
    }

    public function removeInscription(Inscription $inscription): static
    {
        if ($this->inscriptions->removeElement($inscription)) {
            // set the owning side to null (unless already changed)
            if ($inscription->getIdUtilisateur() === $this) {
                $inscription->setIdUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Evaluations>
     */
    public function getEvaluations(): Collection
    {
        return $this->evaluations;
    }

    public function addEvaluation(Evaluations $evaluation): static
    {
        if (!$this->evaluations->contains($evaluation)) {
            $this->evaluations->add($evaluation);
            $evaluation->setIdUtilisateur($this);
        }

        return $this;
    }

    public function removeEvaluation(Evaluations $evaluation): static
    {
        if ($this->evaluations->removeElement($evaluation)) {
            // set the owning side to null (unless already changed)
            if ($evaluation->getIdUtilisateur() === $this) {
                $evaluation->setIdUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Prestations>
     */
    public function getPrestationsFournisseur(): Collection
    {
        return $this->prestations_fournisseur;
    }

    public function addPrestationsFournisseur(Prestations $prestationsFournisseur): static
    {
        if (!$this->prestations_fournisseur->contains($prestationsFournisseur)) {
            $this->prestations_fournisseur->add($prestationsFournisseur);
            $prestationsFournisseur->setIdFournisseur($this);
        }

        return $this;
    }

    public function removePrestationsFournisseur(Prestations $prestationsFournisseur): static
    {
        if ($this->prestations_fournisseur->removeElement($prestationsFournisseur)) {
            // set the owning side to null (unless already changed)
            if ($prestationsFournisseur->getIdFournisseur() === $this) {
                $prestationsFournisseur->setIdFournisseur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Prestations>
     */
    public function getPrestationsClient(): Collection
    {
        return $this->prestations_client;
    }

    public function addPrestationsClient(Prestations $prestationsClient): static
    {
        if (!$this->prestations_client->contains($prestationsClient)) {
            $this->prestations_client->add($prestationsClient);
            $prestationsClient->setIdClient($this);
        }

        return $this;
    }

    public function removePrestationsClient(Prestations $prestationsClient): static
    {
        if ($this->prestations_client->removeElement($prestationsClient)) {
            // set the owning side to null (unless already changed)
            if ($prestationsClient->getIdClient() === $this) {
                $prestationsClient->setIdClient(null);
            }
        }

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): static
    {
        $this->login = $login;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->login;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }
}
