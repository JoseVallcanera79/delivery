<?php

namespace App\Entity;

use App\Repository\DireccionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DireccionRepository::class)
 */
class Direccion
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
    private $calle;

    /**
     * @ORM\Column(type="integer")
     */
    private $numero;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $puerta_piso_escalera;

    /**
     * @ORM\Column(type="integer")
     */
    private $cod_postal;

    /**
     * @ORM\ManyToOne(targetEntity=Cliente::class, inversedBy="direcciones")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cliente;

    /**
     * @ORM\OneToOne(targetEntity=municipios::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $municipios;

    /**
     * @ORM\OneToOne(targetEntity=provincias::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $provincia;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCalle(): ?string
    {
        return $this->calle;
    }

    public function setCalle(string $calle): self
    {
        $this->calle = $calle;

        return $this;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getPuertaPisoEscalera(): ?int
    {
        return $this->puerta_piso_escalera;
    }

    public function setPuertaPisoEscalera(?int $puerta_piso_escalera): self
    {
        $this->puerta_piso_escalera = $puerta_piso_escalera;

        return $this;
    }

    public function getCodPostal(): ?int
    {
        return $this->cod_postal;
    }

    public function setCodPostal(int $cod_postal): self
    {
        $this->cod_postal = $cod_postal;

        return $this;
    }

    public function getCliente(): ?Cliente
    {
        return $this->cliente;
    }

    public function setCliente(?Cliente $cliente): self
    {
        $this->cliente = $cliente;

        return $this;
    }

    public function getMunicipios(): ?municipios
    {
        return $this->municipios;
    }

    public function setMunicipios(municipios $municipios): self
    {
        $this->municipios = $municipios;

        return $this;
    }

    public function getProvincia(): ?provincias
    {
        return $this->provincia;
    }

    public function setProvincia(provincias $provincia): self
    {
        $this->provincia = $provincia;

        return $this;
    }
}
