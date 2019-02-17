<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SongRepository")
 * @Vich\Uploadable()

 */
class Song
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string|null
     * @ORM\Column(type="string", length= 255)
     */
    private $filename;

    /**
     * @var File|null
     * @Vich\UploadableField(mapping="audio_file", fileNameProperty="filename")
     */
    private $audioFile;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $lenght;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\MusicStyle", inversedBy="songs")
     */
    private $styles;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Artist", inversedBy="songs")
     */
    private $artists;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime|null
     */
    private $updated_at;

    public function __construct()
    {
        $this->styles = new ArrayCollection();
        $this->artists = new ArrayCollection();

    }

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

    public function getLenght(): ?int
    {
        return $this->lenght;
    }

    public function setLenght(?int $lenght): self
    {
        $this->lenght = $lenght;

        return $this;
    }

    /**
     * @return Collection|MusicStyle[]
     */
    public function getStyles(): Collection
    {
        return $this->styles;
    }

    public function addStyle(MusicStyle $style): self
    {
        if (!$this->styles->contains($style)) {
            $this->styles[] = $style;
        }

        return $this;
    }

    public function removeStyle(MusicStyle $style): self
    {
        if ($this->styles->contains($style)) {
            $this->styles->removeElement($style);
        }

        return $this;
    }

    /**
     * @return Collection|Artist[]
     */
    public function getArtists(): Collection
    {
        return $this->artists;
    }

    public function addArtist(Artist $artist): self
    {
        if (!$this->artists->contains($artist)) {
            $this->artists[] = $artist;
        }

        return $this;
    }

    public function removeArtist(Artist $artist): self
    {
        if ($this->artists->contains($artist)) {
            $this->artists->removeElement($artist);
        }

        return $this;
    }

    /**
     * @return null|string
     */
    public function getFilename(): ?string
    {
        return $this->filename;
    }

    /**
     * @param null|string $filename
     * @return Song
     */
    public function setFilename(?string $filename): Song
    {
        $this->filename = $filename;
        return $this;
    }

    /**
     * @return null|File
     */
    public function getAudioFile(): ?File
    {
        return $this->audioFile;
    }

    /**
     * @param null|File $audioFile
     * @return Song
     */
    public function setAudioFile(?File $audioFile): Song
    {
        $this->audioFile = $audioFile;

        if ($this->audioFile instanceof UploadedFile) {
            $this->updated_at = new \DateTime('now');
        }
        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

}
