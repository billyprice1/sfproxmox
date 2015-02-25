<?php

namespace HB\Bundle\ProxMoxBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OpenvzDetailType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('disk')
            ->add('ostemplate')
            ->add('hostname')
            ->add('nameserver')
            ->add('searchdomain')
            ->add('onboot')
            ->add('swap')
            ->add('netif',null, array('required' => false))
            ->add('ipAddress',null, array('required' => false))
            ->add('quotaugidlimit')
            ->add('description')
            ->add('memory')
            ->add('cpuunits')
            ->add('digest')
            ->add('quotatime')
            ->add('storage')
            ->add('cpus')
            ->add('Créer', 'submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HB\Bundle\ProxMoxBundle\Entity\OpenvzDetail'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'hb_bundle_proxmoxbundle_openvzdetail';
    }
}
