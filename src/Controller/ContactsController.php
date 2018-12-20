<?php

namespace App\Controller;

use App\Dto\UserFeedback;
use App\Form\ContactsFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class ContactsController extends AbstractController
{
    public function showContacts(Request $request): Response
    {
        $formSuccess = false;
        $form = $this->createForm(ContactsFormType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $formSuccess = true;
        }

        return $this->
        render(
            'contacts/contacts.html.twig',
            [
                'form' => $form->createView(),
                'formSuccess' => $formSuccess,
            ]
        );
    }
}
