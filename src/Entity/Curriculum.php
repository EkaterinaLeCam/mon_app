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
    private ?string $level_of_studies = null;

    #[ORM\Column]
    private ?int $total_experience = null;

    #[ORM\Column(length: 100)]
    private ?string $link_linkedin = null;

    #[ORM\Column(length: 100)]
    private ?string $link_github = null;

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
        return $this->level_of_studies;
    }

    public function setLevelOfStudies(string $level_of_studies): self
    {
        $this->level_of_studies = $level_of_studies;

        return $this;
    }

    public function getTotalExperience(): ?int
    {
        return $this->total_experience;
    }

    public function setTotalExperience(int $total_experience): self
    {
        $this->total_experience = $total_experience;

        return $this;
    }

    public function getLinkLinkedin(): ?string
    {
        return $this->link_linkedin;
    }

    public function setLinkLinkedin(string $link_linkedin): self
    {
        $this->link_linkedin = $link_linkedin;

        return $this;
    }

    public function getLinkGithub(): ?string
    {
        return $this->link_github;
    }

    public function setLinkGithub(string $link_github): self
    {
        $this->link_github = $link_github;

        return $this;
    }
}
