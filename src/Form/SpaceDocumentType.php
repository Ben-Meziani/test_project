<?php

namespace App\Form;

use App\Entity\SpaceDocument;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SpaceDocumentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder ->add('documents', FileType::class, [
            'required' => false,
            'multiple' => true, 
            'mapped' => false,
            'label' => 'Chargement d\'images (jpeg uniquement) ',
            'constraints' => [
                new All([
                    new File([
                        'maxSize' => '2048k',
                        'mimeTypes' => [
                            'image/jpeg'
                        ],
                        'mimeTypesMessage' => 'Format d\'image non adapté'
                    ])
                ])
            ],
            'attr' => [
                'accept' => '.jpg, .jpeg'
            ],
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SpaceDocument::class,
        ]);
    }
}
