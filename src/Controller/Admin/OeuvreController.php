<?php

namespace App\Controller\Admin;

use App\Entity\Oeuvre;
use App\Form\OeuvreType;
use App\Repository\OeuvreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/oeuvre", name="admin_")
 */
class OeuvreController extends Controller
{
    /**
     * @Route("/", name="oeuvre_index", methods="GET")
     */
    public function index(OeuvreRepository $oeuvreRepository): Response
    {
        return $this->render('oeuvre/index.html.twig', ['oeuvres' => $oeuvreRepository->findAll()]);
    }

    /**
     * @Route("/new", name="oeuvre_new", methods="GET|POST")
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

            return $this->redirectToRoute('admin_oeuvre_index');
        }

        return $this->render('oeuvre/new.html.twig', [
            'oeuvre' => $oeuvre,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="oeuvre_edit", methods="GET|POST")
     */
    public function edit(Request $request, Oeuvre $oeuvre): Response
    {
        $form = $this->createForm(OeuvreType::class, $oeuvre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_oeuvre_index', ['id' => $oeuvre->getId()]);
        }

        return $this->render('oeuvre/edit.html.twig', [
            'oeuvre' => $oeuvre,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="oeuvre_delete", methods="DELETE")
     */
    public function delete(Request $request, Oeuvre $oeuvre): Response
    {
        if ($this->isCsrfTokenValid('delete'.$oeuvre->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($oeuvre);
            $em->flush();
        }

        return $this->redirectToRoute('admin_oeuvre_index');
    }
    


     /**
     * @Route("/{id}", name="oeuvre_activation", methods="POST")
     */

     public function activation(Request $request, Oeuvre $oeuvre): Response
     {
        if ( $request->getMethod() == "POST"){
            $em = $this->getDoctrine()->getManager();
            $oeuvre->setStatus(!$oeuvre->getStatus());
            $em->persist($oeuvre);
            $em->flush();

            return new JsonResponse(array(
                'success' => true,
                'status' => $oeuvre->getStatus() 
            ));
        } 
        
        return new JsonResponse(array(
            'success' => false,
            'status' =>  $oeuvre->getStatus()
        ));
     }

}
