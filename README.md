Kairos SDK (PHP)
==============

Kairos is the easist way add **Face-Recognition** to your web applications. Our API provides a full-featured and robust Face-Recognition backend, right out of the box. This is the PHP wrapper for the [Kairos Face Recognition API](https://www.kairos.com). The package includes a **class** _(Kairos.php)_ you can use as an easy client to the API. Continue reading to learn how to integrate Kairos into your web application.

_Thanks to contributions by some of our customers, we also have [Ruby](https://github.com/kany/kairos-api) and [.NET](https://github.com/humbywan/Kairos.Net) wrappers available. Also see our [Javascript SDK](https://github.com/kairosinc/Kairos-SDK-Javascript), our [Android SDK](https://github.com/kairosinc/Kairos-SDK-Android) and our [iOS SDK](https://github.com/kairosinc/Kairos-SDK-iOS)._

## What You'll Need
* An environment configured to run PHP scripts.



---



## How to Do a Quick Demo
If you just want to do a quick test run, open one of the **example scripts** included with the SDK and follow these steps:

1. [Create your free developer account](https://www.kairos.com/signup)
2. Log into the Kairos Developer Dashboard
3. Create an application and copy your **App Id** & **App Key**
3. Paste them into the constructor method in one of the example scripts.
4. Run the script in your **browser** and wait for the response.



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

## Authenticate Once

Before you can make API calls you'll need to pass Kairos your credentials **App Id** and **App Key** (You only need to do this once). Paste your App Id and App Key into the constructor method like so:

```
// instantiates a new instance
$app_id  = 'your_app_id';
$api_key = 'your_application_key';
$Kairos  = new Kairos($app_id, $api_key);
```



## Enroll an Image Using a File Path

The **Enroll** method **registers a face for later recognitions**. Here's an example of enrolling a face (subject) using a method that accepts an absolute path to an image file in your file system, and enrolls it as a new subject into your specified gallery:    

```
$path       = '/images/myphotos/myphoto123.png';
$subject_id = 'elizabeth';
$gallery_id = 'friends1';
$response   = $Kairos->enrollImageWithPath($path, $gallery_id, $subject_id);
```



## Enroll an Image Using Data

The **Enroll** method **registers a face for later recognitions**. Here's an example of enrolling a face (subject) using a method that accepts image data in base64 format, and enrolls it as a new subject into your specified gallery:    

```
$base64_data = 'iVBORw0KGgoAAA ... ABJRU5ErkJggg==\r\n';
$subject_id  = 'elizabeth';
$gallery_id  = 'friends1';
$response    = $Kairos->enrollImageWithData($base64_data, $gallery_id, $subject_id);
```



## Recognize an Image Using a File Path

The **Recognize** method takes an image of a subject and **attempts to match it against a given gallery of previously-enrolled subjects**. Here's an example of recognizing a subject using a method that accepts an absolute path to an image file in your file system, sends it to the API, and returns a match and confidence value:    

```
$path       = '/images/myphotos/myphoto123.png';
$response   = $Kairos->recognizeImageWithPath($path);
```



## Recognize an Image Using Data

The **Recognize** method takes an image of a subject and **attempts to match it against a given gallery of previously-enrolled subjects**. Here's an example of recognizing a subject using a method that accepts image data in base64 format, sends it to the API, and returns a match and confidence value:    

```
$base64_data  = 'iVBORw0KGgoAAA ... ABJRU5ErkJggg==\r\n';
$response     = $Kairos->recognizeImageWithData($base64_data);
```


    
    
## Detect Image Attributes Using a File Path

The **Detect** method takes an image of a subject and **returns various attributes pertaining to the face features**. The detect methods also accept an optional 'selector' parameter, allowing you to tweak the scope of the response ([see docs](https://www.kairos.com/docs/face-recognition) for more info on the detect selector). Here's an example of using detect via method that accepts a path to an image file, sends it to the API, and returns face attributes:    

```
$path       = '/images/myphotos/myphoto123.png';
$response   = $Kairos->detectImageWithPath($path);
```

    
## Detect Image Attributes Using Image Data

The **Detect** method takes an image of a subject and **returns various attributes pertaining to the face features**. The detect methods also accept an optional 'selector' parameter, allowing you to tweak the scope of the response ([see docs](https://www.kairos.com/docs/face-recognition) for more info on the detect selector). Here's an example of using detect via method that accepts image data in base64 format, sends it to the API, and returns face attributes:    

```
$base64_data  = 'iVBORw0KGgoAAA ... ABJRU5ErkJggg==\r\n';
$response     = $Kairos->detectImageWithData($base64_data);
```


    
## List Your Galleries

This method returns a list of all galleries you've created:

```
$response = $Kairos->listGalleries();
```

## List Your Subjects

This method returns a list of all subjects for a given gallery:

```
$gallery_id = 'friends1';
$response   = $Kairos->listSubjectsForGallery($gallery_id);
```



## Remove a Gallery

This method removes a given gallery:

```
$gallery_id = 'friends1';
$response   = $Kairos->removeGallery($gallery_id);
```



## Remove a Subject

This method removes a subject from given gallery:

```
$subject_id = 'dave';
$gallery_id = 'friends1';
$response   = $Kairos->removeSubjectFromGallery($subject_id, $gallery_id);
```

    
    
## Optional Parameters

Many of the Kairos API methods expose optional parameters for customizing the api response to fit your use-case. Here is an example of sending custom options in the detect call to limit the response to attributes pertaining to the eyes:

```
$path       = '/images/myphotos/myphoto123.png';
$options    = array('selector' => 'EYES');
$response   = $Kairos->detectImageWithPath($path, $options);
```


[![Stack Share](http://img.shields.io/badge/tech-stack-0690fa.svg?style=flat)](http://stackshare.io/kairos-api/kairos-facial-recognition-api)

##Support 
Have an issue? Visit our [Support page](http://www.kairos.com/support) or [create an issue on GitHub](https://github.com/kairosinc/Kairos-SDK-PHP)
