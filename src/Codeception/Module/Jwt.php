<?php
declare(strict_types=1);

namespace Codeception\Module;

use App\Jwt\Factory\DecodeJwtTokenFactory;
use App\Jwt\JwtConfiguration;
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
        $privateKey = file_get_contents(__DIR__.'../../../'.$this->_getConfig('privateKeyPath'));
        $publicKey = file_get_contents($config['publicKeyPath']);

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
