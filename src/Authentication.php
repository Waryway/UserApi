<?php
namespace Waryway\UserApi;

use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Hmac\Sha256;

class Authentication
{

    public function __construct()
    {
    }

    /**
     * @param $user
     * @param $password
     * @return int|null
     */
    public function CredentialCheck($user, $password)
    {
        if ($user == 'kyle' && $password == 'pass') {
            return 1;
        }

        return null;
    }

    public function buildToken()
    {
        $signer = new Sha256();

        $token = (new Builder())->setIssuer('http://waryway.com')// Configures the issuer (iss claim)
            ->setAudience('http://waryway.com')// Configures the audience (aud claim)
            ->setId('4f1g23a12aa', true)// Configures the id (jti claim), replicating as a header item
            ->setIssuedAt(time())// Configures the time that the token was issue (iat claim)
            ->setNotBefore(time() + 60)// Configures the time that the token can be used (nbf claim)
            ->setExpiration(time() + 3600)// Configures the expiration time of the token (exp claim)
            ->set('uid', 1)// Configures a new claim, called "uid"
            ->sign($signer, 'testing')// creates a signature using "testing" as key
            ->getToken(); // Retrieves the generated token


        var_dump($token->verify($signer, 'testing 1')); // false, because the key is different
        var_dump($token->verify($signer, 'testing')); // true, because the key is the same

        return $token;
    }

    public function verifyToken()
    {

    }

}
