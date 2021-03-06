<?php

namespace Sistema\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PromocionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('idProducto', null, array(
                'label' => 'Producto'
            ))
            ->add('precio')
//            ->add('validoHasta')
            ->add('validoHasta','date',array(
                                        'widget' => 'single_text',
                                        'format' => 'dd-MM-yyyy',
                                        'attr' => array('class' => 'date')
                                    ))

//            ->add('cantidad_vendido')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sistema\AdminBundle\Entity\Promocion'
        ));
    }

    public function getName()
    {
        return 'sistema_adminbundle_promociontype';
    }
}
