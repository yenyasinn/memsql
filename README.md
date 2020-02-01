# MemSQL driver for Drupal 8

## Module installation

Add to `composer.json` file to **repositories** section:
```
{
    "type": "git",
    "url": "https://github.com/yenyasinn/memsql.git"
}
```
then run: 
```
composer require "yenyasinn/memsql":"master"
```

It installs Memsql module to the folder with contrib modules.

Then copy memsql/drivers folder to the Drupal root folder (on the same level with index.php file) 
