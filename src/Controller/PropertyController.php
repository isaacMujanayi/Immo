<?php

namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Repository\RepositoryFactory;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends AbstractController
{


     /**
      * @var PropertyRepository
      */
     private $repository;
     /**
      * @var ObjectManager
      */
     private $em;

     public function __construct(PropertyRepository $repository,ObjectManager $em)
     {
         $this->repository = $repository;
         $this->em = $em;
     }
    /**
     * @Route("/bien", name="Property.index")
     */
    public function index(): Response
    {
       $property = $this->repository->findAllVisible();
        dump($property);
        $this->em->flush();
       

                 
        return $this->render('property/index.html.twig');
    }
}
