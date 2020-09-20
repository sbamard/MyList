<?php


namespace App\Controller;


use App\Repository\AmiiboRepository;
use Doctrine\DBAL\DBALException;
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
        $amiibos = $repository->findLatestEntriesAmiibo();
        dump($amiibos);
        return $this->render('pages/home.html.twig', [
            'current_menu' => 'home',
            'amiiboLast' => $amiibos
        ]);
    }
    /**
     * @return Response
     * @Route("/games", name="games")
     */
    public function games(): Response
    {
        return $this->render('pages/games.html.twig', [
            'current_menu' => 'games'
        ]);
    }
    /**
     * @return Response
     * @Route("/platforms", name="platforms")
     */
    public function platforms(): Response
    {
        return $this->render('pages/platforms.html.twig', [
            'current_menu' => 'platforms'
        ]);
    }

}