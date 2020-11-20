<?php
declare(strict_types=1);

namespace Codeception\Module;

use App\Jwt\Factory\DecodeJwtTokenFactory;
use App\Jwt\Interactor\DecodeJwtToken;
use App\Jwt\JwtConfiguration;
use Codeception\Configuration;
use Codeception\Module as CodeceptionModule;
use Codeception\TestInterface;

class Jwt extends CodeceptionModule
{
    /** @var string */
    public $pathToPem;
    /** @var Response */
    public $response;

    public function _before(TestInterface $test)
    {
        $projectDir = Configuration::projectDir();

        $privateKey = file_get_contents($projectDir.$this->_getConfig('privateKeyPath'));
        $publicKey = file_get_contents($projectDir.$this->_getConfig('publicKeyPath'));

        $config = [
            'algorithm'  => $this->_getConfig('algorithm'),
            'privateKey' => $privateKey,
            'publicKey'  => $publicKey,
            'tokenTtl'   => $this->_getConfig('tokenTtl'),
        ];
        $configuration = new JwtConfiguration($config);
        $this->decoder = new DecodeJwtToken($configuration);
    }
}
