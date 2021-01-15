<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProstagesController extends AbstractController
{
    /**
     * @Route("/", name="prostages")
     */
    public function index(): Response
    {
        return $this->render('prostages/index.html.twig');
    }
	
	 /**
     * @Route("/entreprise", name="prostages_entreprise")
     */
    public function entreprise()
    {
        return $this->render('prostages/entreprise.html.twig');
    }
	
	/**
     * @Route("/formation", name="prostages_formation")
     */
    public function formation()
    {
        return $this->render('prostages/formation.html.twig');
    }
	
	/**
     * @Route("/stage", name="prostages_stage")
     */
    public function stage()
    {
        return $this->render('prostages/stage.html.twig');
    }
}
