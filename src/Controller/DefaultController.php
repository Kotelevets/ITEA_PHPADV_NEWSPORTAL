<?php

namespace App\Controller;

use App\Form\ContactsType;
use App\Service\Contacts\ContactsPageServiceInterface;
use App\Service\Home\HomePageServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Default site controller.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class DefaultController extends AbstractController
{
    public function index(HomePageServiceInterface $service): Response
    {
        $posts = $service->getPosts();

        ///* корнем считается папка templates */
        return $this->
        render(
            'default/index.html.twig',
            [
                'posts' => $posts,
            ]
        );
    }

    /**
     * Renders contacts page with feedback form.
     *
     * @param Request                      $request
     * @param ContactsPageServiceInterface $service
     *
     * @return Response
     *
     * @Route("/contacts", name="contacts")
     */
    public function contacts(Request $request, ContactsPageServiceInterface $service): Response
    {
        $form = $this->createForm(ContactsType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->addFlash('success', 'Your feedback was succesfully sended to us');
        }

        return $this->
        render(
            'contacts/contacts.html.twig',
            [
                'form' => $form->createView(),
                'page' => $service->getContacts(),
            ]
        );
    }
}
