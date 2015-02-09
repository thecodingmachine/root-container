About RootContainer
===================

RootContainer is a *facade* for the root container of [framework-interop](https://github.com/framework-interop/framework-interop-demo).

The big picture
---------------

The ultimate goal is to allow the application developer to easily create a "root container", 
that can automatically detect and add containers contained in other packages into a global 
composite container that can be used by the application.

Compared to the classical way of thinking about a web application, this is a paradigm shift.

**In a "classical" application**, packages added to the application may add new instances to the main and only DI container.
This is what SF2 bundles, ZF2 modules or Mouf2 packages are doing.

**Using this approach**, each package provides its own DI container that contains instances. DI containers are added
to a global container that is queried.

About this package
------------------

This package contains a **module** for *framework-interop*.

Usually, framework-interop modules are registering additional container.
Instead, the `RootContainerModule` module will **expose** the root-container, through a *facade*. 

You must first register the RootContainerModule in the list of modules supported by your application:

**modules.php**
```php
<?php
return [
    ...
    [
        'name' => 'root-container',
        'description' => 'Facade for the root container',
        'module' => new Mouf\RootContainerModule(),
        'enable' => true,
    ],
];
```

Now, using **RootContainer**, you can access ANY instance of ANY container of your application using:

```php
$instance = RootContainer::get("instance_name");
``` 

A word of caution
-----------------

**If you need this package, you are doing something wrong!**

Having an easy to use facade for containers does not allow you to use it all over the place :)
Otherwise, you would be using the RootContainer as a service locator, which is considered by most people to 
be a bad practice (tip: the author of RootContainer thinks it is a bad practice too).

So in a perfect world, the RootContainer should NEVER be used in your application.

That being said, it's always useful to be able to access an instance quickly for testing purposes.
