<?php
declare(strict_types=1);

namespace App\Controller;

use App\Repository\ChartRepository;
use App\Services\ChartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
	/**
	 * @Route("/", name="home")
	 */
	public function index(ChartService $chartService): Response
	{
		return $this->render('index.html.twig', ['charts' => $chartService->getAllChartData()]);
	}
}
