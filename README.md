Kairos SDK (PHP)
==============

Kairos is the easist way add **Face-Recognition** to your web applications. Our API provides a full-featured and robust Face-Recognition backend, right out of the box. This is the PHP wrapper for the [Kairos Face Recognition API](https://www.kairos.com). The package includes a **class** _(Kairos.php)_ you can use as an easy client to the API. Continue reading to learn how to integrate Kairos into your web application.

_Thanks to contributions by some of our customers, we also have [Ruby](https://github.com/kany/kairos-api) and [.NET](https://github.com/humbywan/Kairos.Net) wrappers available. Also see our [Javascript SDK](https://github.com/kairosinc/Kairos-SDK-Javascript), our [Android SDK](https://github.com/kairosinc/Kairos-SDK-Android) and our [iOS SDK](https://github.com/kairosinc/Kairos-SDK-iOS)._

## What You'll Need
* An environment configured to run PHP scripts.

---


## How to Do a Quick Demo

If you just want to do a quick test run, follow these steps:

1. [Create your free developer account](https://www.kairos.com/signup)
2. Log into the Kairos Developer Dashboard
3. Create an application and copy your **App Id** & **App Key**
3. Run `methods_test.php` in your browser.
4. Enter your app_id and app_key, and run the Kairos methods.


---


## How to Install Kairos in Your Own Web App

1. [Create your free Kairos developer account](https://www.kairos.com/signup) if you don't already have one.
2. Log into the [dashboard](https://www.kairos.com/login) and create a new app.
3. Copy your **App ID** & **App Key** (you'll need them later).
4. [Download](https://github.com/kairosinc/Kairos-SDK-PHP) the SDK and unzip the package.
5. Open the folder named **Kairos-SDK-PHP** containing the Kairos.php class.
6. Place the wrapper class _(Kairos.php)_ somewhere within your application.
7. Include Kairos.php where needed in your web application project.


```
 include("Kairos.php");
```
## View Your Galleries

This method returns a list of all galleries you've created:

```
$response = $Kairos->viewGalleries();
```
## View Your Subjects

This method returns a list of all subjects for a given gallery:

```
$gallery_name = 'friends1';
$argumentArray =  array(
    "gallery_name" => $gallery_name 
);
$response   = $Kairos->viewSubjectsInGallery($argumentArray);
```

## Remove a Subject

This method removes a subject from given gallery:

```
$subject_id = 'dave';
$gallery_name = 'friends1';
$argumentArray =  array(
    "subject_id" => $subject_id,
    "gallery_name" => $gallery_name 
);
$response   = $Kairos->removeSubjectFromGallery($argumentArray);
```

## Remove a Gallery

This method removes a given gallery:

```
$gallery_name = 'friends1';
$argumentArray =  array(
    "gallery_name" => $gallery_name 
);
$response   = $Kairos->removeGallery($argumentArray);
```
## Enroll an Image

The **Enroll** method **registers a face for later recognitions**. Here's an example of enrolling a face (subject) using a method that accepts an absolute path to an image file in your file system **or** base64 image data, and enrolls it as a new subject into your specified gallery:    

```
$image       = '/images/myphotos/myphoto123.png';
(or) 
$image      = 'iVBORw0KGgoAAA ... ABJRU5ErkJggg==\r\n';
$subject_id = 'elizabeth';
$gallery_name = 'friends1';
$argumentArray =  array(
    "image" => $image,
    "subject_id" => $subject_id,
    "gallery_name" => $gallery_name
);
$response   = $Kairos->enroll($argumentArray);
```
`The SDK also includes a file upload field, which converts a local image file to base64 data.`

## Recognize an Image

The **Recognize** method takes an image of a subject and **attempts to match it against a given gallery of previously-enrolled subjects**. Here's an example of recognizing a subject using a method that accepts an absolute path to an image file in your file system **or** base64 image data, sends it to the API, and returns a match and confidence value:    

```
$image       = '/images/myphotos/myphoto123.png';
(or) 
$image      = 'iVBORw0KGgoAAA ... ABJRU5ErkJggg==\r\n';
$gallery_name = 'friends1';
$argumentArray =  array(
    "image" => $image,
    "gallery_name" => $gallery_name
);
$response   = $Kairos->recognize($argumentArray);
```

`The SDK also includes a file upload field, which converts a local image file to base64 data.`

## Detect Image Attributes

The **Detect** method takes an image of a subject and **returns various attributes pertaining to the face features**. Here's an example of the detect method which accepts a path to an image file on your system **or** base64 image data, sends it to the API, and returns face attributes:    

```
$image       = '/images/myphotos/myphoto123.png';
(or) 
$image      = 'iVBORw0KGgoAAA ... ABJRU5ErkJggg==\r\n';
$argumentArray =  array(
    "image" => $image
);
$response   = $Kairos->detect($argumentArray);
```

`The SDK also includes a file upload field, which converts a local image file to base64 data.`

## Verify image

The **Verify** method takes an image and verifies that it matches an existing subject in a gallery.  Here's an example of using verify via method that accepts a path to an image file, sends it to the API, and returns face attributes: 

```
$image       = '/images/myphotos/myphoto123.png';
(or) 
$image      = 'iVBORw0KGgoAAA ... ABJRU5ErkJggg==\r\n';
$subject_id = 'elizabeth';
$gallery_name = 'friends1';
$argumentArray =  array(
    "image" => $image,
    "subject_id" => $subject_id,
    "gallery_name" => $gallery_name
);
$response   = $Kairos->verify($argumentArray);
```
`The SDK also includes a file upload field, which converts a local image file to base64 data.`

##Support 
Have an issue? Visit our [Support page](http://www.kairos.com/support) or [create an issue on GitHub](https://github.com/kairosinc/Kairos-SDK-PHP)

Test on [RapidAPI](https://rapidapi.com/package/KairosAPI/functions?utm_source=KairosGitHub&utm_medium=button)
