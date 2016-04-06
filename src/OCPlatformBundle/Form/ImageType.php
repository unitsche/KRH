<?php

namespace OCPlatformBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
  class ImageType extends AbstractType
  {
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('file', 'file')
    ;
  }

  public function setDefaultOptions(OptionsResolverInterface $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'OCPlatformBundle\Entity\Image'
    ));
  }

  public function getName()
  {
    return 'oc_platformbundle_image';
  }
}
