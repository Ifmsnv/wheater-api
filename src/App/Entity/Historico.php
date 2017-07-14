<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="historico")
 */
class Historico implements \JsonSerializable
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @var int
     */
    private $idHistorico;

    /**
     * @ORM\ManyToOne(targetEntity="Estacao")
     * @ORM\JoinColumn(name="idEstacao", referencedColumnName="idEstacao")
     * @var \App\Entity\Estacao
     */
    private $estacao;

    /**
     * @ORM\Column(name="data", type="date")
     * @var \DateTime
     */
    private $data;

    /**
     * @ORM\Column(name="temperaturaAr", type="float", nullable=true)
     * @var float
     */
    private $temperaturaAr;

    /**
     * @ORM\Column(name="temperaturaSolo", type="float", nullable=true)
     * @var float
     */
    private $temperaturaSolo;

    /**
     * @ORM\Column(name="umidadeAr", type="float", nullable=true)
     * @var float
     */
    private $umidadeAr;

    /**
     * @ORM\Column(name="umidadeSolo", type="float", nullable=true)
     * @var float
     */
    private $umidadeSolo;

    /**
     * @ORM\Column(name="molhamentoFoliar", type="float", nullable=true)
     * @var float
     */
    private $molhamentoFoliar;

    function jsonSerialize()
    {
        return [
            'idHistorico' => $this->getIdHistorico(),
            'idEstacao' => $this->getIdEstacao(),
            'data' => $this->getData()->format('c'),
            'temperaturaAr' => $this->getTemperaturaAr(),
            'temperaturaSolo' => $this->getTemperaturaSolo(),
            'umidadeAr' => $this->getUmidadeAr(),
            'umidadeSolo' => $this->getUmidadeSolo(),
            'molhamentoFoliar' => $this->getMolhamentoFoliar(),
        ];
    }

    /**
     * @return int|null
     */
    public function getIdEstacao()
    {
        if ($this->getEstacao() instanceof Estacao) {
            return $this->getEstacao()->getIdEstacao();
        }

        return null;
    }

    /**
     * @return int
     */
    public function getIdHistorico(): int
    {
        return $this->idHistorico;
    }

    /**
     * @param int $idHistorico
     */
    public function setIdHistorico(int $idHistorico)
    {
        $this->idHistorico = $idHistorico;
    }

    /**
     * @return Estacao
     */
    public function getEstacao(): Estacao
    {
        return $this->estacao;
    }

    /**
     * @param Estacao $estacao
     */
    public function setEstacao(Estacao $estacao)
    {
        $this->estacao = $estacao;
    }

    /**
     * @return \DateTime
     */
    public function getData(): \DateTime
    {
        return $this->data;
    }

    /**
     * @param \DateTime $data
     */
    public function setData(\DateTime $data)
    {
        $this->data = $data;
    }

    /**
     * @return float
     */
    public function getTemperaturaAr(): float
    {
        return $this->temperaturaAr;
    }

    /**
     * @param float $temperaturaAr
     */
    public function setTemperaturaAr(float $temperaturaAr)
    {
        $this->temperaturaAr = $temperaturaAr;
    }

    /**
     * @return float
     */
    public function getTemperaturaSolo(): float
    {
        return $this->temperaturaSolo;
    }

    /**
     * @param float $temperaturaSolo
     */
    public function setTemperaturaSolo(float $temperaturaSolo)
    {
        $this->temperaturaSolo = $temperaturaSolo;
    }

    /**
     * @return float
     */
    public function getUmidadeAr(): float
    {
        return $this->umidadeAr;
    }

    /**
     * @param float $umidadeAr
     */
    public function setUmidadeAr(float $umidadeAr)
    {
        $this->umidadeAr = $umidadeAr;
    }

    /**
     * @return float
     */
    public function getUmidadeSolo(): float
    {
        return $this->umidadeSolo;
    }

    /**
     * @param float $umidadeSolo
     */
    public function setUmidadeSolo(float $umidadeSolo)
    {
        $this->umidadeSolo = $umidadeSolo;
    }

    /**
     * @return float
     */
    public function getMolhamentoFoliar(): float
    {
        return $this->molhamentoFoliar;
    }

    /**
     * @param float $molhamentoFoliar
     */
    public function setMolhamentoFoliar(float $molhamentoFoliar)
    {
        $this->molhamentoFoliar = $molhamentoFoliar;
    }

}