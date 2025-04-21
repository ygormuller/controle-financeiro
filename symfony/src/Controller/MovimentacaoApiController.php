<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Movimentacao;
use App\Repository\MovimentacaoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class MovimentacaoApiController extends AbstractController
{
    #[Route('/teste/inserir', name: 'inserir_teste')]
    public function inserir(EntityManagerInterface $em): Response
    {
        $mov = new Movimentacao();
        $mov->setDescricao('Compra de teste');
        $mov->setMovimentacao('Entrada');
        $mov->setValor(99.99);
        $mov->setData(new \DateTime());
        $mov->setTipo('Entrada');

        $em->persist($mov);
        $em->flush();

        return new Response('Movimentação inserida com sucesso!');
    }

    #[Route('', methods: ['GET'])]
    public function index(MovimentacaoRepository $repo): JsonResponse
    {
        return $this->json($repo->findAll());
    }

    #[Route('', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $mov = new Movimentacao();
        $mov->setDescricao($data['descricao']);
        $mov->setValor($data['valor']);
        $em->persist($mov);
        $em->flush();

        return $this->json($mov);
    }

    // Adicione aqui rotas para PUT e DELETE se quiser CRUD completo
    
}
