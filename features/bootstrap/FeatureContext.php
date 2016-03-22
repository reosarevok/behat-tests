<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */

    private $room;

    public function __construct()
    {
    }

    /**
     * @Given there is a room :number
     */
    public function thereIsARoom($number)
    {
        $this->room = new Room($number);
        PHPUnit_Framework_Assert::assertSame(
            $this->room->number,
            $number
        );
    }

    /**
     * @Given the room is :status on :date
     */
    public function roomIsXOn($status, $date)
    {
        $this->room->setAvailability($date, $status);
    }

    /**
     * @Then I should see the availability is :status on :date
     */
    public function iShouldSeeTheAvailabilityIsOn($status, $date)
    {
        $availability = $this->room->checkAvailability($date);
        PHPUnit_Framework_Assert::assertSame(
            $availability,
            $status
        );
    }

    /**
     * @Then I should get availability info for :date1 and :date2
     */
    public function iShouldGetAvailabilityInfo($date1, $date2)
    {
        $availability = $this->room->checkAvailability();
        PHPUnit_Framework_Assert::assertArrayHasKey(
            $date1,
            $availability
        );
        PHPUnit_Framework_Assert::assertArrayHasKey(
            $date2,
            $availability
        );
    }

    /**
     * @When customer :name makes a booking on :date
     */
    public function customerMakesABookingOn($name, $date)
    {
        $this->room->makeBooking($date, $name);
    }

    /**
     * @Then I should see the guest is :name on :date
     */
    public function iShouldSeeTheGuestIsOn($name, $date)
    {
        $guest_name = $this->room->checkGuests($date);
        PHPUnit_Framework_Assert::assertSame(
            $guest_name,
            $name
        );
    }
}
