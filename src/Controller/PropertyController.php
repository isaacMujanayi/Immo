<?php

namespace App\Controller;

use App\Entity\Property;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends AbstractController
{
    /**
     * @Route("/bien", name="Property.index")
     */
    public function index(): Response
    {
        $property = new Property(); 
        $property->setTitle('Mon biennnnnnnn')
                 ->setDescription('heoooejj')
                 ->setSurface('60')
                 ->setRooms('4')
                 ->setFloor('3')
                 ->setPrice('170000')
                 ->setHeat('1')
                 ->setCity('Amiens')
                 ->setAddress('amiens nord')
                 ->setPostalCode('80000')
                 ->setBedrooms('5');
                
       $em = $this->getDoctrine()->getManager();
       $em->persist($property);
       $em->flush();

                 
        return $this->render('property/index.html.twig');
    }
}
