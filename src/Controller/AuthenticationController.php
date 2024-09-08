<?php

namespace App\Controller;

use App\Service\AuthenticationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AuthenticationController extends AbstractController
{

    private $authenticationService;
    
    public function __construct(AuthenticationService $authenticationService)
    {
        $this->authenticationService = $authenticationService;
    }

    #[Route('/authentication', name: 'app_authentication')]
    public function index(): Response
    {
        $authorizationUrl = $this->authenticationService->getAuthorizationUrl();
        return $this->redirect($authorizationUrl);
    }


    #[Route('/authentication/callback', name: 'app_authentication_callback')]
    public function googleCallback(Request $request): Response
    {
        $code = $request->query->get('code');

        if (!$code) {
            throw new \Exception('No code provided');
        }

        $token = $this->authenticationService->getAccessToken($code);
        $user = $this->authenticationService->getResourceOwner($token);

        // You can now use $user to get user information and store it in session/database

        return $this->render('/authentication/index.html.twig', ['user' => $user]);
    }
}
