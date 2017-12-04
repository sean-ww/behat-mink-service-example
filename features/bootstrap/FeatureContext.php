<?php

use Behat\MinkExtension\Context\MinkContext;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext
{
    /**
     * @Then the response body should be
     *
     * This method can be used to check an entire json response.
     *
     * @param string $expectedResponseBody The expected json response.
     *
     * @throws \Exception Expected response body was "%s" but got "%s".
     */
    public function theResponseBodyShouldBe($expectedResponseBody)
    {
        $responseBody = $this->getSession()->getPage()->getContent();
        if ($responseBody != $expectedResponseBody) {
            throw new \Exception(
                sprintf(
                    'Expected response body was "%s" but got "%s".',
                    $expectedResponseBody,
                    $responseBody
                )
            );
        }
    }
}
