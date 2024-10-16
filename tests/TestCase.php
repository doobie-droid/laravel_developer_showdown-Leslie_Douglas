<?php

namespace Tests;

use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function setUpTraits()
    {
        $uses = parent::setUpTraits();

        if (isset($uses[Traits\RefreshTestingDatabase::class])) {
            $this->refreshTestDatabase();
        }

        return $uses;
    }

    protected function makeUser(int $times = 1): UserFactory
    {
        return UserFactory::times($times);
    }
}
