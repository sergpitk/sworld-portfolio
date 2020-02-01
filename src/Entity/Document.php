<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DocumentRepository")
 */
class Document
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $modified;

    /**
     * @ORM\Column(type="integer")
     */
    private $user_id;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $pdfFilename;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pdfLink;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $thumbnailFileName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $thumbnailLink;




    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getThumbnailFileName(): ?string
    {
        return $this->thumbnailFileName;
    }

    public function setThumbnailFileName(?string $thumbnailFileName): self
    {
        $this->thumbnailFileName = $thumbnailFileName;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }

    public function getModified(): ?\DateTimeInterface
    {
        return $this->modified;
    }

    public function setModified(?\DateTimeInterface $modified): self
    {
        $this->modified = $modified;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getPdfLink(): ?string
    {
        return $this->pdfLink;
    }

    public function setPdfLink(?string $pdfLink): self
    {
        $this->pdfLink = $pdfLink;

        return $this;
    }

    public function getPdfFilename(): ?string
    {
        return $this->pdfFilename;
    }

    public function setPdfFilename($pdfFilename): self
    {
        $this->pdfFilename = $pdfFilename;

        return $this;
    }

    public function getThumbnailLink(): ?string
    {
        return $this->thumbnailLink;
    }

    public function setThumbnailLink($thumbnailLink): self
    {
        $this->pdfFilename = $thumbnailLink;

        return $this;
    }
}
