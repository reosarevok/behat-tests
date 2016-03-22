<?php


class Room
{
    public $number = '';
    private $availability = array();
    private $guests = array();

    public function __construct($number)
    {
        $this->number = $number;
    }

    public function setAvailability($date, $status) {
        $this->availability[$date] = $status;
    }

    public function makeBooking($date, $customer_name) {
        $this->availability[$date] = "occupied";
        $this->guests[$date] = $customer_name;
    }

    public function checkGuests($date = null)
    {
        if ($date == null) {
            return $this->guests;
        } else {
            return $this->guests[$date];
        }
    }

    public function checkAvailability($date = null) {
        if ($date == null) {
            return $this->availability;
        } else {
            return $this->availability[$date];
        }
    }
}