<?php

namespace App\Entity;

use App\Repository\CurriculumRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CurriculumRepository::class)]
class Curriculum
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $lastname = null;

    #[ORM\Column(length: 50)]
    private ?string $firstname = null;

    #[ORM\Column(length: 50)]
    private ?string $city = null;

    #[ORM\Column]
    private ?int $age = null;

    #[ORM\Column(length: 50)]
    private ?string $levelOfStudies = null;

    #[ORM\Column]
    private ?int $totalExperience = null;

    #[ORM\Column(length: 100)]
    private ?string $linkLinkedin = null;

    #[ORM\Column(length: 100)]
    private ?string $linkGithub = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getLevelOfStudies(): ?string
    {
        return $this->levelOfStudies;
    }

    public function setLevelOfStudies(string $levelOfStudies): self
    {
        $this->levelOfStudies = $levelOfStudies;

        return $this;
    }

    public function getTotalExperience(): ?int
    {
        return $this->totalExperience;
    }

    public function setTotalExperience(int $totalExperience): self
    {
        $this->totalExperience = $totalExperience;

        return $this;
    }

    public function getLinkLinkedin(): ?string
    {
        return $this->linkLinkedin;
    }

    public function setLinkLinkedin(string $linkLinkedin): self
    {
        $this->linkLinkedin = $linkLinkedin;

        return $this;
    }

    public function getLinkGithub(): ?string
    {
        return $this->linkGithub;
    }

    public function setLinkGithub(string $linkGithub): self
    {
        $this->linkGithub = $linkGithub;

        return $this;
    }
}
