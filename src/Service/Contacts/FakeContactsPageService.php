<?php

namespace App\Service\Contacts;

use App\Dto\Contacts;
use Faker\Factory;

/**
 * Fake contacts page service that generates fake data
 */
final class FakeContactsPageService implements ContactsPageServiceInterface
{

    public function getContacts(): Contacts
    {
        $faker = Factory::create();

        return new Contacts(
            $faker->address,
            $faker->tollFreePhoneNumber,
            $faker->email
        );
    }
}
