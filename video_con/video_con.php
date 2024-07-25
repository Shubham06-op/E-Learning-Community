<?php
$service = new Google_Service_Calendar($client);
$calendarId = "###";
$event = new Google_Service_Calendar_Event([
    'start' => ['dateTime' => '2021-01-01T00:00:00.000+09:00'],
    'end' => ['dateTime' => '2021-01-01T00:30:00.000+09:00'],
    'attendees' => array(['email' => '###']),
    'conferenceData' => [
        'createRequest' => [
            'requestId' => 'sample123',
            'conferenceSolutionKey' => ['type' => 'hangoutsMeet']
        ]
    ],
    'summary' => 'sample event with Meet link',
    'description' => 'sample description'
]);
$res = $service->events->insert($calendarId, $event, array('conferenceDataVersion' => 1));
print($res);
?>