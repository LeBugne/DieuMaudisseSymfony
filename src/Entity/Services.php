<?php

namespace App\Entity;

use App\Repository\ServicesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServicesRepository::class)]
class Services extends Prestations
{
    public function getId(): ?int
    {
        return $this->id;
    }
}
