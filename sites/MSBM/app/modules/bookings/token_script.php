<?php
$scope = 'https://www.googleapis.com/auth/calendar';
$client_id = '987849558796-5a1oa8h6la31s7l8ve5vsisjlhsahfrj.apps.googleusercontent.com';
$redirect_uri = 'http://kurogo.artuvic.com:8010/bookings/index';


$params = array(
    'response_type' =>   'code',
    'client_id'     =>   $client_id,
    'redirect_uri'  =>   $redirect_uri,
    'scope'         =>   $scope
);
$url = 'https://accounts.google.com/o/oauth2/auth?' . http_build_query($params);
echo $url."\n";
?>