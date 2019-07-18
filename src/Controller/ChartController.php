<?php
declare(strict_types=1);

namespace App\Controller;

use App\Form\ChartType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ChartController extends AbstractController
{
    /**
     * @Route("/chart/create", name="create_chart")
     */
    public function index()
    {
    	$chartForm = $this->createForm(ChartType::class);

        return $this->render('chart/create.html.twig', [
	        'form' => $chartForm->createView(),
        ]);
    }
}
