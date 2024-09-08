<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\HeaderProcess;
use Doctrine\ORM\EntityManagerInterface;

class MainController extends AbstractController
{

    private $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/main', name: 'app_main')]
    public function index(): Response
    {
        $headerProcesses = $this->em->getRepository(HeaderProcess::class)->findAll();

        return $this->render('main/index.html.twig', [
            'headerProcesses' => $headerProcesses,
        ]);
    }


    #[Route('/search', name: 'app_search')]
    public function search(Request $request): Response
    {
        
        $query = $request->query->get('query');
        $results= $this->em->getRepository(HeaderProcess::class)->findBy(['id' => $query]);
        return $this->render('main/search.html.twig', [
            'results' => $results,
        ]);
    }

}
