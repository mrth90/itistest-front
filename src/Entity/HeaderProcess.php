<?php

namespace App\Entity;

use App\Repository\HeaderProcessRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HeaderProcessRepository::class)]
class HeaderProcess
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $executiondate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $createdat = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?String $datafilename = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?String $etlfilename = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getExecutionDate(): ?\DateTimeInterface
    {
        return $this->executiondate;
    }

    public function setExecutionDate(?\DateTimeInterface $execution_date): static
    {
        $this->executiondate = $execution_date;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdat;
    }

    public function setCreatedAt(?\DateTimeInterface $created_at): static
    {
        $this->createdat = $created_at;

        return $this;
    }

    public function getDataFilename(): ?string
    {
        return $this->datafilename;
    }

    public function setDataFilename(?string $datafilename): static
    {
        $this->datafilename = $datafilename;

        return $this;
    }

    public function getEtlFilename(): ?string
    {
        return $this->etlfilename;
    }

    public function setEtlFilename(?string $etlfilename): static
    {
        $this->etlfilename = $etlfilename;

        return $this;
    }
}
