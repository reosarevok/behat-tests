Feature: Making bookings
  If a customer books a room
  As the manager
  I need to save the booking info

  Scenario: Checking bookings
    Given there is a room "101"
    When customer "Nokk Loom" makes a booking on "2016-10-04"
    Then I should see the availability is "occupied" on "2016-10-04"
    And I should see the guest is "Nokk Loom" on "2016-10-04"