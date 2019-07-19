<?php

namespace App\Form;

use App\Entity\Chart;
use App\Services\PollDataService;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChartType extends AbstractType
{
	/**
	 * @var PollDataService
	 */
	private $pollDataService;

	public function __construct(PollDataService $pollDataService)
	{
		$this->pollDataService = $pollDataService;
	}

	public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, ['required' => true, 'attr' => ['maxlength' => 50]])
            ->add('metrics', ChoiceType::class, ['choices' => $this->pollDataService->getPollDataTypeList(), 'multiple' => true])
            ->add('xAxisLegend', TextType::class, ['required' => true, 'attr' => ['maxlength' => 50]])
            ->add('yAxisLegend', TextType::class, ['required' => true, 'attr' => ['maxlength' => 50]])
            ->add('type', TextType::class)
	        ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Chart::class,
        ]);
    }
}
