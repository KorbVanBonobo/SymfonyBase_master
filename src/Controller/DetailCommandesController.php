<?php

namespace App\Controller;

use App\Entity\DetailCommandes;
use App\Form\DetailCommandesType;
use App\Repository\DetailCommandesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/detail/commandes")
 */
class DetailCommandesController extends Controller
{
    /**
     * @Route("/", name="detail_commandes_index", methods="GET")
     */
    public function index(DetailCommandesRepository $detailCommandesRepository): Response
    {
        return $this->render('detail_commandes/index.html.twig', ['detail_commandes' => $detailCommandesRepository->findAll()]);
    }

    /**
     * @Route("/new", name="detail_commandes_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $detailCommande = new DetailCommandes();
        $form = $this->createForm(DetailCommandesType::class, $detailCommande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($detailCommande);
            $em->flush();

            return $this->redirectToRoute('detail_commandes_index');
        }
        return $this->render('detail_commandes/new.html.twig', [
            'detail_commande' => $detailCommande,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="detail_commandes_show", methods="GET")
     */
    public function show(DetailCommandes $detailCommande): Response
    {
        return $this->render('detail_commandes/show.html.twig', ['detail_commande' => $detailCommande]);
    }

    /**
     * @Route("/{id}/edit", name="detail_commandes_edit", methods="GET|POST")
     */
    public function edit(Request $request, DetailCommandes $detailCommande): Response
    {
        $form = $this->createForm(DetailCommandesType::class, $detailCommande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('detail_commandes_edit', ['id' => $detailCommande->getId()]);
        }

        return $this->render('detail_commandes/edit.html.twig', [
            'detail_commande' => $detailCommande,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="detail_commandes_delete", methods="DELETE")
     */
    public function delete(Request $request, DetailCommandes $detailCommande): Response
    {
        if ($this->isCsrfTokenValid('delete'.$detailCommande->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($detailCommande);
            $em->flush();
        }

        return $this->redirectToRoute('detail_commandes_index');
    }
}
