<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="estacao")
 */
class Estacao
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEstacao;

    /**
     * @ORM\Column(name="nome", type="string", length=100)
     */
    private $nome;

    /**
     * @return mixed
     */
    public function getIdEstacao()
    {
        return $this->idEstacao;
    }

    /**
     * @param mixed $idEstacao
     */
    public function setIdEstacao($idEstacao)
    {
        $this->idEstacao = $idEstacao;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

}