<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class SalleController extends AbstractController{

    public function accueil() { 

        #return new Response('Aziz');
        $nombre = rand(1,80);
     
        return $this->render('Salle/accueil.html.twig',
                             array( 'numero' => $nombre ));
    }

     public function afficher($numero) {
        return $this->render('Salle/afficher.html.twig',
        array( 'numero' => $numero ));
      

     }

    






}