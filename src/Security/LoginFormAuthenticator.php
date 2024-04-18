<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\SecurityRequestAttributes;
use Symfony\Component\Security\Http\Util\TargetPathTrait;

class LoginFormAuthenticator extends AbstractLoginFormAuthenticator
{
    use TargetPathTrait;

    public const LOGIN_ROUTE = 'app_login';

    public function __construct(private UrlGeneratorInterface $urlGenerator)
    {
    }

    public function authenticate(Request $request): Passport
    {
        $email = $request->getPayload()->getString('email');

        $request->getSession()->set(SecurityRequestAttributes::LAST_USERNAME, $email);

        return new Passport(
            new UserBadge($email),
            new PasswordCredentials($request->getPayload()->getString('password')),
            [
                new CsrfTokenBadge('authenticate', $request->getPayload()->getString('_csrf_token')),            ]
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ? Response
    {
        if ($targetPath = $this->getTargetPath($request->getSession(), $firewallName)) {
            return new RedirectResponse($targetPath);
        }

        #ROLE_ADMIN
        if ($token->getUser()->hasRole('ROLE_ADMIN')) {
            return new RedirectResponse($this->urlGenerator->generate('app_admin'));
        
        #ROLE_DATA_ACQUISITION
        } elseif ($token->getUser()->hasRole('ROLE_DATA_ACQUISITION')) {
            return new RedirectResponse($this->urlGenerator->generate('app_data_acq'));

        #ROLE_DEVELOPMENT_MAINTENANCE
        } elseif ($token->getUser()->hasRole('ROLE_DEVELOPMENT_MAINTENANCE')) {
            return new RedirectResponse($this->urlGenerator->generate('app_dev_maintan'));

        #ROLE_SERVICE_MANAGEMENT
        } elseif ($token->getUser()->hasRole('ROLE_SERVICE_MANAGEMENT')) {
            return new RedirectResponse($this->urlGenerator->generate('app_service_manage'));
        
        #No role
        } else {
            return new RedirectResponse($this->urlGenerator->generate('app_logout'));
        }

    }

    protected function getLoginUrl(Request $request): string
    {
        return $this->urlGenerator->generate(self::LOGIN_ROUTE);
    }
}
