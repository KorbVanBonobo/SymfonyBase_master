<?php

namespace App\Controller;

use App\Entity\Oeuvre;
use App\Form\OeuvreType;
use App\Repository\OeuvreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/oeuvre")
 */
class OeuvreController extends Controller
{
    /**
     * @Route("/boutique", name="oeuvre_index", methods="GET")
     */
    public function index(OeuvreRepository $oeuvreRepository): Response
    {
        return $this->render('oeuvre/boutique.html.twig', ['oeuvres' => $oeuvreRepository->findAll()]);
    }

    /**
     * @Route("/new", name="oeuvre_newi", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $oeuvre = new Oeuvre();
        $oeuvre->setUser($this->getUser());
        $form = $this->createForm(OeuvreType::class, $oeuvre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($oeuvre);
            $em->flush();

            // return $this->redirectToRoute('homepage');
        }

        return $this->render('oeuvre/newi.html.twig', [
            'oeuvre' => $oeuvre,
            'form' => $form->createView(),
        ]);
    }

    public function edit(Request $request, Oeuvre $oeuvre): Response
    {
        $form = $this->createForm(OeuvreType::class, $oeuvre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('oeuvre_index', ['id' => $oeuvre->getId()]);
        }

        return $this->render('oeuvre/edit.html.twig', [
            'oeuvre' => $oeuvre,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="oeuvre_show", methods="GET")
     */
    public function show(Oeuvre $oeuvre): Response
    {
        return $this->render('oeuvre/detail_boutique.html.twig', ['oeuvre' => $oeuvre]);
    }

    // /**
    //  * @Route("/{id}", name="oeuvre_delete", methods="DELETE")
    //  */
    // public function delete(Request $request, Oeuvre $oeuvre): Response
    // {
    //     if ($this->isCsrfTokenValid('delete'.$oeuvre->getId(), $request->request->get('_token'))) {
    //         $em = $this->getDoctrine()->getManager();
    //         $em->remove($oeuvre);
    //         $em->flush();
    //     }

    //     return $this->redirectToRoute('oeuvre_index');
    // }
    
    /**
     * @Route("/{id}", defaults={"id": 0}, name="oeuvre_save", methods="POST")
     */
    // public function save(Request $request, $id)
    // {
    //     $em = $this->getDoctrine()->getManager();
    //     if ($id == 0) { // New
    //         $entity = new Oeuvre;
    //     } else {
    //         $entity = $em->getRepository(Oeuvre::class)->findOneById($id);
    //     }

    //     $form = $this->createForm(OeuvreType::class, $oeuvre);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $em->persist($oeuvre);
    //         $em->flush();

    //         return new JsonResponse(array(
    //             'success' => true,
    //         ));
    //     }

    //     return new JsonResponse(array(
    //         'success' => false,
    //     ));
    // }
}
