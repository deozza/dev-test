<?php


namespace App\Form;


use App\Entity\SuiteParams;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class SuiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('max' , NumberType::class, [
            'constraints' =>  [ new Assert\NotBlank() ],
        ]);

        $builder->add('int1' , NumberType::class, [
            'constraints' =>  [ new Assert\NotBlank() ],
        ]);

        $builder->add('int2' , NumberType::class, [
            'constraints' =>  [ new Assert\NotBlank() ],
        ]);

        $builder->add('str1' , TextType::class, [
            'constraints' =>  [ new Assert\NotBlank() ],
        ]);

        $builder->add('str2' , TextType::class, [
            'constraints' =>  [ new Assert\NotBlank() ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'           => SuiteParams::class,
            'csrf_protection'      => false
        ));
    }
}