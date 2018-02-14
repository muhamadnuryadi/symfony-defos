<?php
// src/AppBundle/Form/RegistrationType.php
namespace AppBundle\Form;
use Symfony\Component\Form\AbstractType;
use FOS\UserBundle\Util\LegacyFormHelper;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('first_name');
		$builder->add('last_name');

		$builder
            ->add('email', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\EmailType'), array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle'))
            ->add('username', null, array('label' => 'form.username', 'translation_domain' => 'FOSUserBundle'))
            ->add('plainPassword', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\RepeatedType'), array(
                'type' => LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\PasswordType'),
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => ' ', 'attr' => array('class' => 'form-control', 'placeholder' => 'form.password')),
                'second_options' => array('label' => ' ', 'attr' => array('class' => 'form-control', 'placeholder' => 'form.password_confirmation')),
                'invalid_message' => 'fos_user.password.mismatch',
            ))
        ;
	}
	public function getParent()
	{
		return 'FOS\UserBundle\Form\Type\RegistrationFormType';
	}
	public function getBlockPrefix()
	{
		return 'app_user_registration';
	}
	public function getName()
	{
		return $this->getBlockPrefix();
	}
}