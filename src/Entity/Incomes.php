<?php

namespace App\Entity;

use App\Repository\IncomesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IncomesRepository::class)
 */
class Incomes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $simulationId;

    /**
     * @ORM\Column(type="integer")
     */
    private $CA;

    /**
     * @ORM\Column(type="integer")
     */
    private $firstNeeds;

    /**
     * @ORM\Column(type="integer")
     */
    private $bankIncomes;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSimulationId(): ?int
    {
        return $this->simulationId;
    }

    public function setSimulationId(int $simulationId): self
    {
        $this->simulationId = $simulationId;

        return $this;
    }

    public function getCA(): ?int
    {
        return $this->CA;
    }

    public function setCA(int $CA): self
    {
        $this->CA = $CA;

        return $this;
    }

    public function getFirstNeeds(): ?int
    {
        return $this->firstNeeds;
    }

    public function setFirstNeeds(int $firstNeeds): self
    {
        $this->firstNeeds = $firstNeeds;

        return $this;
    }

    public function getBankIncomes(): ?int
    {
        return $this->bankIncomes;
    }

    public function setBankIncomes(int $bankIncomes): self
    {
        $this->bankIncomes = $bankIncomes;

        return $this;
    }
}
