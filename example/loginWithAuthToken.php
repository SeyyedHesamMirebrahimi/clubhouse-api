<?php

// This is an example login with auth token
// use at your own risk!

require_once 'vendor/autoload.php';
use \seyyedhesammirebrahimi\Clubhouse As Clubhouse;

// replace with your auth token
$phoneNumberOrAuthToken='REPLACE_WITH_YOUR_TOKEN';

$clubhouse = new Clubhouse\Clubhouse($phoneNumberOrAuthToken);

try {

    // get user info
    echo "[PhoneNumber] " . $clubhouse->phone_number . PHP_EOL;
    echo "[AuthToken] " . $clubhouse->auth_token . PHP_EOL;
    echo "[UserId] " . $clubhouse->user_id . PHP_EOL;

    // get channels and print it
    $channels = $clubhouse->getChannels();
    foreach ($channels['channels'] as $channel) {
        echo "[ID] " . $channel['channel_id'] . PHP_EOL;
        echo "[Name] " . $channel['topic'] . PHP_EOL;
        echo "[URL] " . $channel['url'] . PHP_EOL;
        echo "[Speakers] " . $channel['num_speakers'] . PHP_EOL;
        echo "[All] " . $channel['num_all'] . PHP_EOL;
        echo PHP_EOL;
    }

} catch(Clubhouse\ClubhouseException $e) {
    // if error, display the message and code
    echo 'Error message: ' . $e->getMessage() . PHP_EOL;
    echo 'Error code: ' . $e->getCode();
}
