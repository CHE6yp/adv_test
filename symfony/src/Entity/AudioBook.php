<?php

namespace App\Entity;

use App\Repository\AudioBookRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AudioBookRepository::class)]
class AudioBook
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $available = null;

    #[ORM\Column(length: 2047, nullable: true)]
    private ?string $url = null;

    #[ORM\Column(nullable: true)]
    private ?float $price = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $currencyId = null;

    #[ORM\Column(nullable: true)]
    private ?int $categoryId = null;

    #[ORM\Column(length: 2047, nullable: true)]
    private ?string $picture = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $author = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $publisher = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $series = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ISBN = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $performed_by = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $format = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(nullable: true)]
    private ?bool $downloadable = null;

    #[ORM\Column(nullable: true)]
    private ?int $age = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lang = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $formats = null;

    #[ORM\Column(length: 2047, nullable: true)]
    private ?string $fragment = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $litres_isbn = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $genres_list = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isAvailable(): ?bool
    {
        return $this->available;
    }

    public function setAvailable(bool $available): self
    {
        $this->available = $available;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCurrencyId(): ?string
    {
        return $this->currencyId;
    }

    public function setCurrencyId(?string $currencyId): self
    {
        $this->currencyId = $currencyId;

        return $this;
    }

    public function getCategoryId(): ?int
    {
        return $this->categoryId;
    }

    public function setCategoryId(?int $categoryId): self
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(?string $author): self
    {
        $this->author = $author;

        return $this;
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

    public function getPublisher(): ?string
    {
        return $this->publisher;
    }

    public function setPublisher(?string $publisher): self
    {
        $this->publisher = $publisher;

        return $this;
    }

    public function getSeries(): ?string
    {
        return $this->series;
    }

    public function setSeries(?string $series): self
    {
        $this->series = $series;

        return $this;
    }

    public function getISBN(): ?string
    {
        return $this->ISBN;
    }

    public function setISBN(?string $ISBN): self
    {
        $this->ISBN = $ISBN;

        return $this;
    }

    public function getPerformedBy(): ?string
    {
        return $this->performed_by;
    }

    public function setPerformedBy(?string $performed_by): self
    {
        $this->performed_by = $performed_by;

        return $this;
    }

    public function getFormat(): ?string
    {
        return $this->format;
    }

    public function setFormat(?string $format): self
    {
        $this->format = $format;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function isDownloadable(): ?bool
    {
        return $this->downloadable;
    }

    public function setDownloadable(?bool $downloadable): self
    {
        $this->downloadable = $downloadable;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getLang(): ?string
    {
        return $this->lang;
    }

    public function setLang(?string $lang): self
    {
        $this->lang = $lang;

        return $this;
    }

    public function getFormats(): ?string
    {
        return $this->formats;
    }

    public function setFormats(?string $formats): self
    {
        $this->formats = $formats;

        return $this;
    }

    public function getFragment(): ?string
    {
        return $this->fragment;
    }

    public function setFragment(?string $fragment): self
    {
        $this->fragment = $fragment;

        return $this;
    }

    public function getLitresIsbn(): ?string
    {
        return $this->litres_isbn;
    }

    public function setLitresIsbn(?string $litres_isbn): self
    {
        $this->litres_isbn = $litres_isbn;

        return $this;
    }

    public function getGenresList(): ?string
    {
        return $this->genres_list;
    }

    public function setGenresList(?string $genres_list): self
    {
        $this->genres_list = $genres_list;

        return $this;
    }
}
