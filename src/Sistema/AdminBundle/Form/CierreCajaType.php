<?php

namespace Sistema\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class CierreCajaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('responsable', 'entity', array(
                    'label' => 'Responsable',
                    'class' => 'SistemaAdminBundle:Persona',
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('m')
                                ->where('m.tipo = :cajero')
                                ->setParameter('cajero', 'cajero');
                    }
                 ))
//            ->add('fecha')
            //->add('ingresos')
            //->add('egresos')
            //->add('total')
            ->add('idCaja', null, array(
                'label' => 'Caja',
                'read_only' => true
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sistema\AdminBundle\Entity\CierreCaja'
        ));
    }

    public function getName()
    {
        return 'sistema_adminbundle_cierrecajatype';
    }
}
