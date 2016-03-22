Feature: Availability check
  In order to book a room
  As a customer
  I need to know if the room is available

Scenario: Checking availability for free room
  Given there is a room "101"
  And the room is free on "2016-10-04"
  Then I should see the availability is "free" on "2016-10-04"

Scenario: Checking availability for occupied room
  Given there is a room "101"
  And the room is occupied on "2016-10-05"
  Then I should see the availability is "occupied" on "2016-10-05"

Scenario: Checking availability for room with different statuses
  Given there is a room "101"
  And the room is free on "2016-10-04"
  And the room is occupied on "2016-10-05"
  Then I should see the availability is "free" on "2016-10-04"
  And I should see the availability is "occupied" on "2016-10-05"

Scenario: Checking that availability for multiple dates is available in one go
  Given there is a room "101"
  And the room is free on "2016-10-04"
  And the room is occupied on "2016-10-05"
  Then I should get availability info for "2016-10-04" and "2016-10-05"
