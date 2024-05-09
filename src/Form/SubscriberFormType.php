<?php

namespace App\Form;

use App\Entity\Subscriber;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SubscriberFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', null, [
                'attr' => ['class' => 'form-control'] 
            ])
            ->add('lastName', null, [
                'attr' => ['class' => 'form-control'] 
            ])
            ->add('email', EmailType::class, [
                'attr' => ['class' => 'form-control'] 
            ])
            ->add('submit', SubmitType::class, [
                'attr' => ['class' => 'btn btn-primary mt-2'] 
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false, 'required' => false,
                'attr' => ['class' => 'ms-2']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Subscriber::class,
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'csrf_token_id' => 'subscriber_item',
            'attr' => ['style' => 'max-width: 600px; margin: auto;']
        ]);
    }
}
