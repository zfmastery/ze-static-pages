<?php


class CanRenderValidRouteCest
{
    public function termsRouteWorks(AcceptanceTester $I)
    {
        $I->amOnPage('/static/terms');
        $I->seeResponseCodeIs(200);
        $I->see('Terms and Conditions');
    }

    public function disclosureRouteWorks(AcceptanceTester $I)
    {
        $I->amOnPage('/static/disclosure');
        $I->seeResponseCodeIs(200);
        $I->see('Disclosure');
    }

    public function nonExistentRouteDoesNotWork(AcceptanceTester $I)
    {
        $I->amOnPage('/static/unknown-route');
        $I->seeResponseCodeIs(404);
    }
}
