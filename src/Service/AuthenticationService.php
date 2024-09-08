<?php
namespace App\Service;

use League\OAuth2\Client\Provider\Google;

class AuthenticationService
{
    private $googleClient;

    public function __construct()
    {
        $this->googleClient = new Google([
            'clientId'     => '{clientId}',
            'clientSecret' => '{clientSecret}',            
            'redirectUri'  => 'http://localhost:8000/authentication/callback',
            'scopes'       => ['profile', 'email'],
        ]);
    }

    public function getAuthorizationUrl()
    {
        return $this->googleClient->getAuthorizationUrl();
    }

    public function getAccessToken(string $code)
    {
        return $this->googleClient->getAccessToken('authorization_code', [
            'code' => $code,
        ]);
    }

    public function getResourceOwner($token)
    {
        return $this->googleClient->getResourceOwner($token);
    }
}