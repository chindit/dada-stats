<?php
declare(strict_types=1);

namespace App\Controller;

use App\Form\ChartType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ChartController extends AbstractController
{
    /**
     * @Route("/chart/create", name="create_chart")
     */
    public function index(EntityManagerInterface $entityManager, Request $request)
    {
    	$chartForm = $this->createForm(ChartType::class);
    	$chartForm->handleRequest($request);

    	if ($chartForm->isSubmitted() && $chartForm->isValid())
	    {
	    	$entityManager->persist($chartForm->getData());
	    	$entityManager->flush();
	    	$this->addFlash('success', 'Chart created successfully');
	    }

        return $this->render('chart/create.html.twig', [
	        'form' => $chartForm->createView(),
        ]);
    }
}
