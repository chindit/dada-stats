<?php
declare(strict_types=1);

namespace App\Controller;

use App\Repository\ChartRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
	/**
	 * @Route("/")
	 */
	public function index(ChartRepository $chartRepository): Response
	{
		return $this->render('index.html.twig', ['charts' => $chartRepository->findAll()]);
	}
}
