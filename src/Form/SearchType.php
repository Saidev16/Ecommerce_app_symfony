<?php 
namespace App\Form;

use App\classe\Search;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface as FormFormBuilderInterface;
use Symfony\Component\Form\Test\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Category;

class SearchType extends AbstractType{

    public function buildForm(FormFormBuilderInterface $builder, array $options)
    {
        $builder
        ->add( 'string', TextType::class, [
            'label' => 'Rechercher ',
            'required' => false,
            'attr' => [
                'placeholder'=> ' recherche ...',
                'class'=> 'form-control-sm'
            ] 
        ] )
        ->add( 'categories', EntityType::class , [
            'label'=> false,
            'required'=> false,
            'class'=> category::class,
            'multiple'=> true,
            'expanded' => true

        ] )
        -> add( 'submit', SubmitType::class, [
            'label' => 'filter',
            'attr'=> [
                "class"=> 'btn-block btn-info'
            ]
        ] )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Search::class,
            'method'=> 'GET',
            'crsf_protection'=> false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }


}


?>