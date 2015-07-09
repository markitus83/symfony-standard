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

class MovieType extends AbstractType
{
    public function configureOptions(OptionsResolver $optionsResolver)
    {
        $optionsResolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Movie'
        ]);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'title',
                'text',
                [
                    'required' => true,
                ])
            ->add(
                'synopsis',
                'text',
                [
                    'required' => true,
                ])
            ->add(
                'actors',
                'entity',
                [
                    'class'     => 'AppBundle\Entity\Person',
                    'property'  => 'name',
                    'multiple'  => true
                ])
            ->add(
                'director',
                'entity',
                [
                    'class'     => 'AppBundle\Entity\Person',
                    'property'  => 'name',
                    'multiple'  => false
                ])
            ->add(
                'producer',
                'entity',
                [
                    'class'     => 'AppBundle\Entity\Producer',
                    'property'  => 'name',
                    'multiple'  => false
                ])
            ->add('save', 'submit');
    }

    public function getName()
    {
        return 'movie_form';
    }
}