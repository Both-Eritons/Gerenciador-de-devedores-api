<?php

namespace Api\Entities\Devedor;

use Api\Models\Devedor\DevedorModel;
use DateTime;

class DevedorEntity
{

  private ?int $id = null;
  private string $nome;
  private ?string $email = null;
  private ?string $telefone = null;
  private ?string $apelido = null;
  private ?DateTime $dataRegistro = null;

  public function __construct(DevedorModel $devedor)
  {
    $this->id = $devedor->id;
    $this->nome = $devedor->nome;
    $this->email = $devedor->email;
    $this->telefone = $devedor->telefone;
    $this->apelido = $devedor->apelido;
    $this->dataRegistro = $devedor->dataRegistro;
  }

  function getId(): ?int
  {
    return $this->id;
  }

  function getNome(): ?string
  {
    return $this->nome;
  }
  function getEmail(): ?string
  {
    return $this->email;
  }
  function getTelefone(): ?string
  {
    return $this->telefone;
  }
  function getApelido(): ?string
  {
    return $this->apelido;
  }
  function getDataRegistro(): ?DateTime
  {
    return $this->dataRegistro;
  }

  function setId(int $id): self
  {
    $this->id = $id;
    return $this;
  }
  function setNome(string $nome): self
  {
    $this->nome = $nome;
    return $this;
  }
  function setEmail(string $email): self
  {
    $this->email = $email;
    return $this;
  }
  function setTelefone(string $telefone): self
  {
    $this->telefone = $telefone;
    return $this;
  }
  function setApelido(string $apelido): self
  {
    $this->apelido = $apelido;
    return $this;
  }
  function setDataRegistro(string $data): self
  {
    $this->dataRegistro = $data;
    return $this;
  }

  function toArray(): array{
    $array = array(
      "id" => $this->getId(),
      "nome" => $this->getNome(),
      "email" => $this->getEmail(),
      "telefone" => $this->getTelefone(),
      "apelido" => $this->getApelido(),
      "registro" => $this->getDataRegistro()
    );
    return $array;
  }
}
