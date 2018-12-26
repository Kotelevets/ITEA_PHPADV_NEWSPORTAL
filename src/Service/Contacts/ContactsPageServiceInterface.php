<?php

namespace App\Service\Contacts;

use App\Dto\Contacts;

/**
 * Interface of service that provides data for contacts page.
 */
interface ContactsPageServiceInterface
{
    public function getContacts(): Contacts;
}
