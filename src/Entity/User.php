<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $enterprise;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $simulationId;

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

    public function getEnterprise(): ?string
    {
        return $this->enterprise;
    }

    public function setEnterprise(string $enterprise): self
    {
        $this->enterprise = $enterprise;

        return $this;
    }

    public function getSimulationId(): ?int
    {
        return $this->simulationId;
    }

    public function setSimulationId(?int $simulationId): self
    {
        $this->simulationId = $simulationId;

        return $this;
    }
}
