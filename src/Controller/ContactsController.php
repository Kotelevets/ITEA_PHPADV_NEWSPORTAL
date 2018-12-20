<?php

namespace App\Controller;

use App\Dto\UserFeedback;
use App\Service\Contacts\ContactsFormService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

final class ContactsController extends AbstractController
{
    public function showContacts(): Response
    {
        $userFeedback = new UserFeedback();
        $form = $this->createForm(ContactsFormService::class);
        $form = $form->createView();

        return $this->
        render(
            'contacts/contacts.html.twig',
            [
                'form' => $form,
            ]
        );
    }
}
