@data
Feature: Access Example Data
  In order to access example data
  As a service user
  I need to be able to view data using the service when logged in.

  Scenario: I try to retrieve data when logged out
    Given I go to "/logout"
    And the response status code should be 204
    When I go to "/data"
    Then the response status code should be 401

  Scenario: I try to retrieve data when logged in
    Given I go to "/login"
    And the response status code should be 204
    When I go to "/data"
    Then the response status code should be 200
    And the response body should be
    """
    {"simpleExample":true,"user":"anon"}
    """
