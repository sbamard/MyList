<?php


namespace App\Controller;


use App\Repository\AmiiboRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HomeController
 * @package App\Controller
 */
class HomeController extends AbstractController
{

    /**
     * @param AmiiboRepository $repository
     * @return Response
     * @Route("/", name="home")
     */
    public function index(AmiiboRepository $repository): Response
    {
        $amiibos = $repository->findQuery();
        return $this->render('pages/home.html.twig', [
            'amiibos' => $amiibos
        ]);
    }

}