# PHP FLASH messages
This is supper simple implementation of php flash messages

## Installation
The preferred way to install this tool is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require stdakov/flash
```

or add

```
"stdakov/flash": "*"
```


## Usage

set message:
```php
require 'vendor/autoload.php';

session_start();

use Dakov\FM;

if (isset($_POST['username']) && isset($_POST['password'])) {

    $user = getUser($_POST['username']);

    if ($user != null && isset($user['id']) && password_verify($_POST['password'], $user['password'])) {
        $_SESSION["USER"] = $user['id'];
        $hour = time() + 3600 * 24 * 365;
        setcookie('user_id', $user['id'], $hour);
    } else {
        FM::set("wrong_credentials", "Invalid credentials");
    }

    header("Location: /");
}
```
use the message:
```html
<div>
    <?php if (FM::exist("wrong_credentials")): ?>
        <div class="alert alert-danger" role="alert">
            <?= FM::flash("wrong_credentials"); ?>
        </div>
    <?php endif; ?>
</div>
```



The MIT License (MIT)