<?php


namespace App\Controller;


use App\Repository\AmiiboRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AmiiboController extends AbstractController
{
    /**
     * @var AmiiboRepository
     */
    private $repository;

    /**
     * AmiiboController constructor.
     * @param AmiiboRepository $repository
     */
    public function __construct(AmiiboRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return Response
     * @Route("/amiibo/index", name="amiibo.index")
     */
    public function index(): Response
    {
        $amiiboAll = $this->repository->findAll();
        return $this->render('amiibo/index.html.twig', [
            'current_menu' => 'amiibos',
            'amiiboAll' => $amiiboAll
        ]);
    }
}