<?php

namespace App\Controller;

use App\Entity\Serie;
use App\Entity\User;
use App\Form\SerieType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SerieController extends AbstractController
{
    /**
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     * @Route("/serie", name="serie")
     */
    public function index(): Response
    {
        $user = $this->getUser();
        $series = $this
            ->getDoctrine()
            ->getRepository(Serie::class)
            ->findBy(['user'=>$user]);

        return $this->render('serie/listSerie.html.twig', [
            'series' => $series,
        ]);
    }

    /**
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     * @Route("/addSerie", name="addSerie")
     */
    public function addSerie(Request $request, EntityManagerInterface $manager): Response{
        $serie = new Serie();

        $user = $this->getUser();

        $form = $this->createForm(SerieType::class, $serie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $serie->setUser($user);

            $manager->persist($serie);
            $manager->flush();

            return $this->redirectToRoute('singleSerie', ['id' => $serie->getId()]);
        }

        return $this->render('serie/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    /**
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     * @Route("/singleSerie/{id}", name="singleSerie")
     */
    public function serie(Serie $serie, Request $request, EntityManagerInterface $manager): Response{
        $user = $this->getUser();

        $form = $this->createForm(SerieType::class, $serie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $serie->setUser($user);

            $manager->persist($serie);
            $manager->flush();
        }

        return $this->render('serie/serie.html.twig', [
            'serie' => $serie,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     * @Route("/serie/{id}", name="delete", methods="DELETE")
     */
    public function deleteSerie(Serie $serie, Request $request, EntityManagerInterface $manager): Response
    {
        if($this->isCsrfTokenValid('delete'.$serie->getId(), $request->get('_token'))){

            $manager->remove($serie);
            $manager->flush();
        }

        return $this->redirectToRoute('serie');
    }
}
