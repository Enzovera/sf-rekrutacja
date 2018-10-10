<?php

namespace AppBundle\Controller;

use AppBundle\Form\RegisterType;
use AppBundle\Form\LoginType;
use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class AuthenticationController extends Controller
{
	/**
	* @Route("/register", name="register")
	*/
	public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder)
	{
		$user = new User();
		$form = $this->createForm(RegisterType::class, $user);
		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			$password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
			$user->setPassword($password);
			$entityManager = $this->getDoctrine()->getManager();
			$entityManager->persist($user);
			$entityManager->flush();
			return $this->redirectToRoute('homepage');
		}
		return $this->render(
			'authentication/register.html.twig',
			['form' => $form->createView()]
		);
	}

	/**
     * @Route("/login", name="login")
     */
	public function login(Request $request, AuthenticationUtils $authenticationUtils)
	{
        $form = $this->createForm(LoginType::class);
        $form->handleRequest($request);
		$error = $authenticationUtils->getLastAuthenticationError();
		$lastUsername = $authenticationUtils->getLastUsername();
		return $this->render('authentication/login.html.twig', [
			'last_username' => $lastUsername,
			'error'         => $error,
            'form' => $form->createView()
		]);
	}
}