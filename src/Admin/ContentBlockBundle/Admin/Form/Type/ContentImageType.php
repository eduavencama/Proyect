<?php

/*
 * ContentBlock Bundle
 * This file is part of the Admin.
 *
 * (c) Victoria Lasso
 *
 */

namespace Admin\ContentBlockBundle\Admin\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContentImageType extends AbstractType {

    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $formBuilder, array $options) {
        $formBuilder
                ->add('imageOrder', 'integer', array('attr' => array('class' => 'imageOrderField'), 'label' => 'Image Ordering', 'required' => true))
                ->add('imageFile', 'sonata_media_type', array('provider' => 'sonata.media.provider.image', 'context' => 'default', 'attr' => array('class' => 'imagefield'), 'label' => 'Image File', 'required' => true))
        ;
    }

    /**
     * {@inheritDoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $optionsNormalizer = function (Options $options, $value) {
            $value = 'Admin\ContentBlockBundle\Entity\ContentImage';

            return $value;
        };

        $resolver->setNormalizer('data_class', $optionsNormalizer);
    }

    public function getName() {
        return $this->getBlockPrefix();
    }

    // Define the name of the form to call it for rendering
    public function getBlockPrefix() {
        return 'contentimage';
    }
}