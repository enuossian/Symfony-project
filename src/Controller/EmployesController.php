<?php

namespace App\Controller;

use App\Entity\Employes;
use App\Form\EmployesType;
use App\Repository\EmployesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Loader\Configurator\form;

class EmployesController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function index(EmployesRepository $repo): Response
    {
        $employes = $repo->findAll();
        return $this->render('employes/home.html.twig', [
            'allEmployes' => $employes,
        ]);
    }

    #[Route('/annuaire/modifier/{id}', name:"annuaire_modifier")]
    #[Route('/annuaire/ajout', name: 'annuaire_ajout')]
    public function form(Request $request, EntityManagerInterface $manager, Employes $employes = null ): Response
    {   
        if($employes == null)
        {
            $employes =  new Employes;
        }

        $form = $this->createForm(EmployesType::class, $employes);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) 
        {
            $manager->persist($employes);
            $manager->flush();
            return $this->redirectToRoute('annuaire_gestion');
        }
        
        return $this->render('employes/form.html.twig', [
            'formEmployes' => $form,
            'editMode' => $employes->getId() !== null
        ]);
    }


    #[Route('/annuaire/gestion', name: 'annuaire_gestion')]
    public function modifier(EmployesRepository $repo): Response
    {
        $employes = $repo->findAll();
        return $this->render('employes/gestion.html.twig', [
            'allEmployes' => $employes,
        ]);
    }

    #[Route('/annuaire/show/{id}', name: 'annuaire_show')]
    public function show($id, EmployesRepository $repo)
    {
        $employes = $repo->find($id);
        return $this->render('employes/show.html.twig', [
            'allEmployes' => $employes,
        ]);
    }

    #[Route('/annuaire/supprimer/{id}', name: 'annuaire_supprimer')]
    public function supprimer(Employes $employes,
    EntityManagerInterface $manager)
    {
       $manager->remove($employes);
       $manager->flush();
       return $this->redirectToRoute('annuaire_gestion');
    }
    
}
