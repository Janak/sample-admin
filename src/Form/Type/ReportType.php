<?php
namespace App\Form\Type;

use App\Entity\ReportSchema;
use App\Repository\ReportSchemaRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReportType extends AbstractType
{
    /**
     *
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver )
    {
        $resolver->setDefaults(array(
            'choices' => ReportSchemaRepository::getReportTypes()
        ));
    }

    /**
     * @return string
     */
    public function getParent()
    {
        return ChoiceType::class;
    }
}
