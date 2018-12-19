<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

final class ContactsController extends AbstractController
{
    public function showContacts(): Response
    {

        return $this->
        render(
            'contacts/contacts.html.twig',
            [

            ]
        );
    }
}