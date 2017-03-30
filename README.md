# Symfony session timeout
Invalidate Symfony sessions based on inactivity for a certain period of time.

This does not make use of garbage collection as suggested in http://symfony.com/doc/current/components/http_foundation/session_configuration.html#session-idle-time-keep-alive.
This method is more accurate and does not depend on garbage collection parameters to function well.

## Installation

Add SymfonySessionTimeout in your composer.json

```js
{
    "require": {
        "lionware/symfony-session-timeout": "*"
    }
}
```

Register the bundle in your `app/AppKernel.php`:

```php
<?php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Lionware\SymfonySessionTimeoutBundle\LionwareSymfonySessionTimeoutBundle()
    );
)
```

Add the configuration in `app/config/config.yml`

```yml
lionware_symfony_session_timeout:
    session:
        expiration_time: "%novamedia_session_expiration_time%"
```

## Notes
### Cookie expiration
Expiration of the cookie also means expiration of the session, therefore it is wise to set it to a relatively high value or 0 (valid for the length of the browser session).

```yml
# app/config/config.yml
framework:
    session:
        cookie_lifetime: 0
```
