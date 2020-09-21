<?php

namespace App\Controller;

use App\Entity\Amiibo;
use App\Form\AmiiboType;
use App\Repository\AmiiboRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/amiibo")
 */
class AmiiboController extends AbstractController
{
    /**
     * @Route("/", name="amiibo_index", methods={"GET"})
     * @param AmiiboRepository $amiiboRepository
     * @return Response
     */
    public function index(AmiiboRepository $amiiboRepository): Response
    {
        return $this->render('amiibo/index.html.twig', [
            'amiibos' => $amiiboRepository->findAllBySerie(),
            'current_menu' => 'amiibos'
        ]);
    }

    /**
     * @Route("/new", name="amiibo_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $amiibo = new Amiibo();
        $form = $this->createForm(AmiiboType::class, $amiibo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($amiibo);
            $entityManager->flush();
            return $this->redirectToRoute('amiibo_index');
        }

        return $this->render('amiibo/new.html.twig', [
            'amiibo' => $amiibo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="amiibo_show", methods={"GET"})
     */
    public function show(Amiibo $amiibo): Response
    {
        return $this->render('amiibo/show.html.twig', [
            'amiibo' => $amiibo,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="amiibo_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Amiibo $amiibo): Response
    {
        $form = $this->createForm(AmiiboType::class, $amiibo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Successfully deleted');
            return $this->redirectToRoute('amiibo_index');
        }

        return $this->render('amiibo/edit.html.twig', [
            'amiibo' => $amiibo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="amiibo_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Amiibo $amiibo): Response
    {
        if ($this->isCsrfTokenValid('delete' . $amiibo->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($amiibo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('amiibo_index');
    }
}
