# README #

## Image Service App

### Tech used ###
PHP8 (with basic pure MVC structure), MySQL, PHPUnit, Guzzle, Carbon, GD lib (for image processing)

### Setup ###

* clone the repo from Github,
* run `docker-compose up -d` to start the containers,
* run `composer install` to download dependencies and create autoload files,
* [OPTIONAL] import `img-service.sql` dump file into the main DB (this step should now be automatically done for you once the container runs),
* check the app in the browser at `localhost`,
* to run tests: `vendor/bin/phpunit`.

### Possible optimizations

* more tests (with test DB setup),
* full CRUD operations,
* more validations for better security.
  
### More about the original requirements description

A small image service which can deliver images using a GET request and which are stored on the server. It is possible to use different modifiers to change what will be returned. Two modifiers must be implemented:

crop-modifier (will cut the image and will take height and width as parameters)
resize-modifier (resizes the images based on given height and width as parameters)
Further modifiers should be possible to integrate easily in code. After you access an image you will be redirected to a beautified url (without modification parameters).

The services outputs images in the same file format (e.g. jpg) as they have been read.

Prepare a simple HTML-page which includes a resized and a cropped image.

Example of image service usage
You want to retrieve image "dog.webp" in the size of 200px height and 200px width. The original image on the server has the following dimensions: 1000px height, 1000px width

You trigger retrieving the image by using an url like: http://your-image-service/dog.webp/<some-modification-parameters>