Installation
============

Step 1: Download the Bundle
---------------------------

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

.. code-block:: bash

    $ composer require snroki/date-interval-bundle "~1"

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Step 2: Enable the Bundle
-------------------------

Then, enable the bundle by adding it to the list of registered bundles
in the `app/AppKernel.php` file of your project:

.. code-block:: php

    <?php
    // app/AppKernel.php

    // ...
    class AppKernel extends Kernel
    {
        public function registerBundles()
        {
            $bundles = array(
                // ...

                new Snroki\DateIntervalBundle\SnrokiDateIntervalBundle(),
            );

            // ...
        }

        // ...
    }


Usage
-----

Instead of using the php DateInterval class :

.. code-block:: php

    $dateInterval = new \DateInterval('PT50.380S');
    // This will throw an Exception if you execute it


Use the class provided by this bundle :

.. code-block:: php

    use Snroki\DateIntervalBundle\DateInterval\DateInterval;
    // ...

    $dateInterval = new DateInterval('PT50.380S');
    // This will work, and if you ask a format :
    echo $dateInterval->format('%s seconds');
    // This will output '50.380 seconds'