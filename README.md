To reproduce this bug, create a new database (I use MariaDB) and add a `.env.local` file containing
```
#APP_ENV=prod
DATABASE_URL=mysql://autowirebug:autowirebug@127.0.0.1:3306/autowirebug?serverVersion=mariadb-10.5.5
```
Change `DATABASE_URL` according to your setup.

Now run
```shell
composer install
bin/console app:migrations:migrate myproject
```
Visit the root directory, e.g. `http://autowiring-bug`. If everything went well, an empty page with title "Welcome!"
and the profile toolbar will appear.

Now remove the comment hash before `APP_ENV=prod` in `.env.local` and reload the page. A 500 error will occur.

Within the real application, I also got the following error in `var/log/prod.log`:
```
request.CRITICAL: Uncaught PHP Exception Doctrine\Persistence\Mapping\MappingException: "The class 'App\Entity\MyProject\TheEntity' was not found in the chain configured namespaces " at /srv/http/myproject/vendor/doctrine/persistence/lib/Doctrine/Persistence/Mapping/MappingException.php line 23 {"exception":"[object] (Doctrine\\Persistence\\Mapping\\MappingException(code: 0): The class 'App\\Entity\\MyProject\\TheEntity' was not found in the chain configured namespaces  at /srv/http/myproject/vendor/doctrine/persistence/lib/Doctrine/Persistence/Mapping/MappingException.php:23)"}
```
This error is about the line
```php
        $this->repository = $em->getRepository(TheEntity::class);
```
in `src/Service/TheService.php`.

With this example, this message is not written, I'm not sure why not (trying to use a repository method also does not
write the line; also, in `dev` mode, this also functions as expected).
