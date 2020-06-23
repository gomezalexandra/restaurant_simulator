<?php

namespace App\Entity;

use App\Repository\SimulationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=SimulationRepository::class)
 */
class Simulation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Get creative and think of a title!")
     */
    private $first_need;

    /**
     * @ORM\Column(type="integer")
     */
    private $first_income;

    /**
     * @ORM\Column(type="integer")
     */
    private $fixed_charges;

    /**
     * @ORM\Column(type="integer")
     */
    private $variable_expenses;

    /**
     * @ORM\Column(type="integer")
     */
    private $income;

    /**
     * @ORM\Column(type="integer")
     */
    private $userId;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstNeed(): ?int
    {
        return $this->first_need;
    }

    public function setFirstNeed(int $first_need): self
    {
        $this->first_need = $first_need;

        return $this;
    }

    public function getFirstIncome(): ?int
    {
        return $this->first_income;
    }

    public function setFirstIncome(int $first_income): self
    {
        $this->first_income = $first_income;

        return $this;
    }

    public function getFixedCharges(): ?int
    {
        return $this->fixed_charges;
    }

    public function setFixedCharges(int $fixed_charges): self
    {
        $this->fixed_charges = $fixed_charges;

        return $this;
    }

    public function getVariableExpenses(): ?int
    {
        return $this->variable_expenses;
    }

    public function setVariableExpenses(int $variable_expenses): self
    {
        $this->variable_expenses = $variable_expenses;

        return $this;
    }

    public function getIncome(): ?int
    {
        return $this->income;
    }

    public function setIncome(int $income): self
    {
        $this->income = $income;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
