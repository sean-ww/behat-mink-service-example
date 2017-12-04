@login
Feature: Login
  In order to access session data
  As a service user
  I need to be able to log in to access a session and log out after.

  Scenario: Logging in and setting the session
    Given I go to "/login"
    Then the response status code should be 204

  Scenario: Logging out and destroying the session
    Given I go to "/logout"
    Then the response status code should be 204
