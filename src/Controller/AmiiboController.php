<?php


namespace App\Controller;


use App\Entity\Amiibo;
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
        $amiibo = $this->repository->findAll();
        dump($amiibo);
        $repository = $this->getDoctrine()->getRepository(Amiibo::class);
        $amiibo = new Amiibo();
        return $this->render('amiibo/index.html.twig', [
            'current_menu' => 'amiibos'
        ]);
    }

}