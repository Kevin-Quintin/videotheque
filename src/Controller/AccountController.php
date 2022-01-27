<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;
use App\Repository\WhishlistRepository;

/**
 * @Route("/account")
 */
class AccountController extends AbstractController
{
    /**
     * @Route("/", name="account")
     */
    public function index(UserRepository $user, WhishlistRepository $whishlist): Response
    {
        //dd($user->countBy('u')->getWhishlists());
        // $test = array('test1', 'test2', 'test3');
        // $test2 = $this->addWhishlist();
        //$id = $_SESSION['_sf2_attributes']; //->_security . 'lastname'; //->_sf2_attributes->_security;

        //dd($_SESSION);
        //dd($id);
        //dd($_SESSION);
        $account = $whishlist->findAll();
        //dd($account);

        return $this->render('account/index.html.twig', [
            'controller_name' => $user,
            'whishlist' => $account
        ]);
    }

    /**
     * @Route("/{id}/edit", name="user_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('account', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('account/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }
}
