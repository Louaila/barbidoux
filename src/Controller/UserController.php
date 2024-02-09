<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Form\TableauBordType;
use App\Entity\Users;
use Symfony\Component\Security\Core\Authentication\TokenStorageInterface;

class UserController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_updateUser');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    #[Route(path: '/updateUser', name: 'app_updateUser')]
    public function updateUser(Request $request, AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            // Retrieve the user from the database or any other method
            $user = $this->getUser(); // Replace this with your user retrieval logic

            // Create an instance of the form
            $form = $this->createForm(TableauBordType::class, $user);

            // Handle form submission
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                // Update user data and save to the database
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($user);
                $entityManager->flush();

                // Redirect to a success page or do any other action
                return $this->redirectToRoute('app_updateUser');
            }

            return $this->render('security/tableauBord.html.twig', [
                'updateForm' => $form->createView(),
            ]);
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->redirectToRoute('app_login');

    }

    #[Route('/deleteUser/{id}', name: 'app_deleteUser')]
    public function deleteUser(Request $request, int $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(Users::class)->find($id);


        if (!$user) {
            throw $this->createNotFoundException('User not found');
        }

        // Supprimer l'utilisateur
        $entityManager->remove($user);
        $entityManager->flush();

        // Rediriger vers une page de confirmation ou ailleurs
        return $this->redirectToRoute('app_login');
    }


    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }


}


