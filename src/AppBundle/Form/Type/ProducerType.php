<?php
/**
 * Created by PhpStorm.
 * User: marc
 * Date: 9/07/15
 * Time: 8:16
 */

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProducerType extends AbstractType
{
    public function configureOptions(OptionsResolver $optionsResolver)
    {
        $optionsResolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Producer'
        ]);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->setMethod('POST')
            ->add('name', 'text', [
                'required'  => true,
                'label'     => 'Name'
            ])
            ->add('save', 'submit');
    }

    public function getName()
    {
        return 'producer_form';
    }
}