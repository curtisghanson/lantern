<?php

namespace Lantern\MediaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CollectionType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('summary')
            ->add('description')
            ->add('collectionType')
            ->add('startDate')
            ->add('stopDate')
            ->add('avgRating')
            ->add('childOrder')
            ->add('locale')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('attributes')
            ->add('parent')
            ->add('createdBy')
            ->add('updatedBy')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Lantern\MediaBundle\Entity\Collection'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'lantern_mediabundle_collection';
    }
}
