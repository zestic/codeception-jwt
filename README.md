# Codeception JWT
#### A codeception extension for asserting JWT

#### Installation
```bash
composer require zestic/codeception-jwt --dev
```

#### To configure

In your acceptance.suite.yml file
```yaml
modules:
    enabled:
        - JWT:
            algorithm:
            publicKeyPath:
            privateKeyPath:
            tokenTtl: 
```

In your composer.json
```json
{
    "repositories": {
        "zestic/codeception-jwt": {
            "type": "vcs",
            "url": "git@gitlab.com:zestic/codeception-jwt.git"
        },
    }
}
```

#### Testing

To use it in a test
```php



```


