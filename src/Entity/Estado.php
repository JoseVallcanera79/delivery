<?php

namespace App\Entity;

use App\Repository\EstadoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EstadoRepository::class)
 */
class Estado
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $estado;

    /**
     * @ORM\OneToOne(targetEntity=Pedido::class, mappedBy="estado", cascade={"persist", "remove"})
     */
    private $pedido;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(?string $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getPedido(): ?Pedido
    {
        return $this->pedido;
    }

    public function setPedido(?Pedido $pedido): self
    {
        // unset the owning side of the relation if necessary
        if ($pedido === null && $this->pedido !== null) {
            $this->pedido->setEstado(null);
        }

        // set the owning side of the relation if necessary
        if ($pedido !== null && $pedido->getEstado() !== $this) {
            $pedido->setEstado($this);
        }

        $this->pedido = $pedido;

        return $this;
    }
}
