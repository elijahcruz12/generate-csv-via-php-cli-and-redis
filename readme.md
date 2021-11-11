# Generate 1 Million Row CSV Via PHP CLI and REDIS

NOTE THAT THIS WILL LITERALLY GENERATE 1 MILLION REDIS KEYS.

## About

This was a test script created to soley test the ability for PHP to generate 1 million CSV rows without issue. I got this to work on an AMD A4-6210, with 8GB of memory, with 2GB of swap. The swap did not need to be used.

## Did it work?

Most definitely. However, note that the CSV will be ~208 MB. It took ~4 minute to create the CSV, but took ~7 minutes to create the rows.

## Requirements

- PHP 7.4+
- Composer
- Redis Server

## Usage

First, install the composer dependencies:

````
composer install
````

Next, we run the Redis Filler:

````
php redisfiller.php
````

PLEASE KEEP IN MIND THIS WILL MAKE 1 MILLION REDIS KEYS

And Finally, run the CSV Generator:

````
php generatecsv.php
````

It will then generate a 1 million row CSV.

The file will be called `generated.csv`

## Extra tests:

I ran 2 extra tests to see if this would work on both the PHP Native server, as well as PHP-FPM.

Meanwhile it mostly works on the native server, it takes MUCH longer.

In terms of PHP-FPM, it gave out at about the 3,000 row mark.

## Conclusion

In general, I found this test very successful, as I used this to determine the ability to run a PHP-CLI based queue for creating LARGE csv files.