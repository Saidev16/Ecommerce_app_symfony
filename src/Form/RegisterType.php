<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class , [
                'label'=> 'votre prenom',
                'attr'=> ['placeholder' => 'merci de saisir prénom'],
                'constraints' => new Length(2,30)
            ])
            ->add('lastname', TextType::class, [
                'label' => 'votre nom',
                'attr' => ['placeholder'=> 'merci de saisir votre nom']
            ])
            ->add('email', EmailType::class , [
                'label'=> 'Votre email',
                'attr' => ['placeholder' => 'Merci de saisir votre email']
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message'=> 'le mot de passe et la confirmation doivent etre identique ',
                'required'=> true,
                'label' => ' votre mot de passe',
                'first_options'=> ['label'=> 'Mot de passe'],
                'second_options'=> ['label'=> 'Confirmez votre mot de passe']
            ])
            
            ->add('submit', SubmitType::class, [
                'label'=> "s'inscrire"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
