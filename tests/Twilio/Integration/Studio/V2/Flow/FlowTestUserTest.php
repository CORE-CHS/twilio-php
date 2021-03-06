<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Studio\V2\Flow;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Serialize;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class FlowTestUserTest extends HolodeckTestCase {
    public function testFetchRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->studio->v2->flows("FWXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                     ->testUsers()->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://studio.twilio.com/v2/Flows/FWXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/TestUsers'
        ));
    }

    public function testFetchResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "sid": "FWaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "test_users": [
                    "user1",
                    "user2"
                ],
                "url": "https://studio.twilio.com/v2/Flows/FWaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/TestUsers"
            }
            '
        ));

        $actual = $this->twilio->studio->v2->flows("FWXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                           ->testUsers()->fetch();

        $this->assertNotNull($actual);
    }

    public function testUpdateRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->studio->v2->flows("FWXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                     ->testUsers()->update(["test_users"]);
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $values = ['TestUsers' => Serialize::map(["test_users"], function($e) { return $e; }), ];

        $this->assertRequest(new Request(
            'post',
            'https://studio.twilio.com/v2/Flows/FWXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/TestUsers',
            null,
            $values
        ));
    }

    public function testUpdateResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "sid": "FWaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "test_users": [
                    "user1",
                    "user2"
                ],
                "url": "https://studio.twilio.com/v2/Flows/FWaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/TestUsers"
            }
            '
        ));

        $actual = $this->twilio->studio->v2->flows("FWXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                           ->testUsers()->update(["test_users"]);

        $this->assertNotNull($actual);
    }
}