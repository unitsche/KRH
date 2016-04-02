<?php

namespace OCPlatformBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AdvertEditType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder->remove('datetime');
  }

  public function getName()
  {
    return 'ocplatformbundle_advert_edit';
  }

  public function getParent()
  {
    return new AdvertType();
  }
}