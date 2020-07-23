<?php

namespace App\Entity;

use App\Repository\ChargesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChargesRepository::class)
 */
class Charges
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
    private $fixedCharge;

    /**
     * @ORM\Column(type="integer")
     */
    private $variableCharge;

    /**
     * @ORM\Column(type="integer")
     */
    private $simulationId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFixedCharge(): ?int
    {
        return $this->fixedCharge;
    }

    public function setFixedCharge(int $fixedCharge): self
    {
        $this->fixedCharge = $fixedCharge;

        return $this;
    }

    public function getVariableCharge(): ?int
    {
        return $this->variableCharge;
    }

    public function setVariableCharge(int $variableCharge): self
    {
        $this->variableCharge = $variableCharge;

        return $this;
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
}
