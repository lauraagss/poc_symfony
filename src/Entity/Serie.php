<?php

namespace App\Entity;

use App\Repository\SerieRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=SerieRepository::class)
 */
class Serie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank(
     *     message="Veuillez saisir un nom"
     * )
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text", length=255, nullable=true)
     */
    private $summary;

    /**
     * @ORM\Column(type="string", length=255 , nullable=true)
     */
    private $image;

    /**
     * @Assert\NotBlank(
     *     message="Veuillez saisir une date de réalisation"
     * )
     * @ORM\Column(type="datetime")
     */
    private $releaseDate;

    /**
     * @ORM\Column(type="integer")
     */
    private $episodeCurrent = 1;

    /**
     * @ORM\Column(type="integer")
     */
    private $seasonCurrent = 1;

    /**
     * @ORM\Column(type="boolean")
     */
    private $finish = false;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="serie")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="serie")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setSummary(string $summary): self
    {
        $this->summary = $summary;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getReleaseDate(): ?\DateTimeInterface
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(\DateTimeInterface $releaseDate): self
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    public function getEpisodeCurrent(): ?int
    {
        return $this->episodeCurrent;
    }

    public function setEpisodeCurrent(int $episodeCurrent): self
    {
        $this->episodeCurrent = $episodeCurrent;

        return $this;
    }

    public function getSeasonCurrent(): ?int
    {
        return $this->seasonCurrent;
    }

    public function setSeasonCurrent(int $seasonCurrent): self
    {
        $this->seasonCurrent = $seasonCurrent;

        return $this;
    }

    public function getFinish(): ?bool
    {
        return $this->finish;
    }

    public function setFinish(bool $finish): self
    {
        $this->finish = $finish;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
