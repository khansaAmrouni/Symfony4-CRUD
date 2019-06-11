<?php
// src/Controller/FormController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\VehicleType;
use App\Entity\Vehicle;
use Symfony\Component\HttpFoundation\Response;

class FormController extends AbstractController
{


    /**
     * @Route("/form/new",name="new")
     */
    public function new(Request $request)
    {
        $Vehicle = new Vehicle();
        $Vehicle->setModel('BMW');
        $Vehicle->setColor('blanc');
        $Vehicle->setCapacity('5');
        

        $form = $this->createForm(VehicleType::class, $Vehicle);

         $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
         $em = $this->getDoctrine()->getManager();
        
        $em->persist($Vehicle);
        $em->flush();
        //to update the page 
        return $this-> redirect($request->getUri());
    }

    $vehicles = $this->getDoctrine()
        ->getRepository(Vehicle::class)
        ->findAll();

    if (!$vehicles) {
        
        $vehicles="";
       // throw $this->createNotFoundException(
         //   'No vehicles found for '
       // );
    }

    return $this->render('new.html.twig', array(
        'vehicleForm' => $form->createView(),'vehicles'=>$vehicles
    ));
    }

    /**
     * @Route("/form/edit/{id<\d+>}")
     */
    public function edit(Request $request, Vehicle $Vehicle)
    {
        $vehicles = $this->getDoctrine()
        ->getRepository(Vehicle::class)
        ->findAll();
        $form = $this->createForm(VehicleType::class, $Vehicle);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // va effectuer la requête d'UPDATE en base de données
            $this->getDoctrine()->getManager()->flush();
        }

        return $this->render('new.html.twig', array(
            'vehicleForm' => $form->createView(),'vehicles'=>$vehicles
        ));


    } 




    /**
     * @Route("/form/delete/{id<\d+>}")
     */
    public function delete(Request $request, Vehicle $Vehicle)
    {
        $vehicles = $this->getDoctrine()
        ->getRepository(Vehicle::class)
        ->findAll();

        $form = $this->createForm(VehicleType::class, $Vehicle);
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        
        $em->remove($Vehicle);
        $em->flush();

        return $this->redirectToRoute('new');
      // return $this->render('new.html.twig', array(
        //    'vehicleForm' => $form->createView(),'vehicles'=>$vehicles
      //  ));
    }   
}