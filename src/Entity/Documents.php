<?php

namespace App\Entity;

use App\Repository\DocumentsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DocumentsRepository::class)
 */
class Documents
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=SpaceDocument::class, inversedBy="documents")
     * @ORM\JoinColumn(nullable=false)
     */
    private $spaceDocument;

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

    public function getSpaceDocument(): ?SpaceDocument
    {
        return $this->spaceDocument;
    }

    public function setSpaceDocument(?SpaceDocument $spaceDocument): self
    {
        $this->spaceDocument = $spaceDocument;

        return $this;
    }
}
