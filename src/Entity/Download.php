<?php

namespace App\Entity;

use App\Repository\DownloadRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DownloadRepository::class)
 */
class Download
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $downloaded_at;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="downloads")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Ebook::class, inversedBy="downloads")
     */
    private $ebook;

    public function __construct()
    {
        $this->downloaded_at = new \DateTime('now');
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDownloadedAt(): ?\DateTimeInterface
    {
        return $this->downloaded_at;
    }

    public function setDownloadedAt(\DateTimeInterface $downloaded_at): self
    {
        $this->downloaded_at = $downloaded_at;

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

    public function getEbook(): ?Ebook
    {
        return $this->ebook;
    }

    public function setEbook(?Ebook $ebook): self
    {
        $this->ebook = $ebook;

        return $this;
    }
}
