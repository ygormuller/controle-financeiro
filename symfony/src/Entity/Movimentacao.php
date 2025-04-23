<?php
namespace App\Entity;

use App\Repository\MovimentacaoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Metadata\ApiResource;

#[ApiResource(
    normalizationContext: ['groups' => ['movimentacao:read']],
    denormalizationContext: ['groups' => ['movimentacao:write']]
)]
#[ORM\Entity(repositoryClass: MovimentacaoRepository::class)]
class Movimentacao
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['movimentacao:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['movimentacao:read', 'movimentacao:write'])]
    private ?string $movimentacao = null;

    #[ORM\Column]
    #[Groups(['movimentacao:read', 'movimentacao:write'])]
    private ?float $valor = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Groups(['movimentacao:read', 'movimentacao:write'])]
    private ?\DateTimeInterface $data = null;

    #[ORM\Column(length: 10)]
    #[Groups(['movimentacao:read', 'movimentacao:write'])]
    private ?string $tipo = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['movimentacao:read', 'movimentacao:write'])]
    private ?string $descricao = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMovimentacao(): ?string
    {
        return $this->movimentacao;
    }

    public function setMovimentacao(string $movimentacao): static
    {
        $this->movimentacao = $movimentacao;

        return $this;
    }

    public function getValor(): ?float
    {
        return $this->valor;
    }

    public function setValor(float $valor): static
    {
        $this->valor = $valor;

        return $this;
    }

    public function getData(): ?\DateTimeInterface
    {
        return $this->data;
    }

    public function setData(\DateTimeInterface $data): static
    {
        $this->data = $data;

        return $this;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): static
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(?string $descricao): static
    {
        $this->descricao = $descricao;

        return $this;
    }
}
