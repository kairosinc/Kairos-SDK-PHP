<?php

//------------------------------------
// methods_test.php
// provides form elements for testing 
// API endpoints
// created: October 2016
// author: Steve Rucker
//------------------------------------

include('../Kairos.php');

?>

<html>
  	<head>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <script src="assets/js/scripts.js"></script>
	    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
      <link href="assets/css/styles.css" rel="stylesheet">
  </head>
  <body>

    <div class="container">
      	<div class="row">
        	<h3>Enter API Keys:</h3>
          		API ID: <input type="text" class="app_id" value="">
            	API KEY: <input type="text" class="api_key" value="">
      	</div>
      	<div class="row">
        	<div id="apiMethodsTests">
          		<h3>Test API Methods</h3>
				<div class="row">
					<div class="method-test">
				  		<span class="glyphicon glyphicon-play"></span><h4>viewGalleries() Method</h4>
				  		<form>
				    		<input type="button" id="testViewGalleries" value="Test" />
				  		</form>
					</div>
				</div>
      	<div class="row">
            <div class="method-test">
              	<span class="glyphicon glyphicon-play"></span><h4>enroll() Method</h4>
              	<form id="enrollForm">
                	  Image: <input type="text" class="image" name="Image">
                  	Gallery Name: <input type="text" class="gallery_name" name="Gallery Name">
                  	Subject ID: <input type="text" class="subject_id" name="Subject ID">
                  	<input type="button" id="testEnroll" value="Test" />
              	</form>
            </div>
      	</div>
      	<div class="row">
            <div class="method-test">
              	<span class="glyphicon glyphicon-play"></span><h4>viewSubjectsInGallery() Method</h4>
              	<form id="viewSubjectsInGalleryForm">
                	Gallery Name: <input type="text" class="gallery_name" name="Gallery Name">
                  	<input type="button" id="testViewSubjectsInGallery" value="Test" />
              	</form>
            </div>
      	</div>
          	<div class="row">
            	<div class="method-test">
              	<span class="glyphicon glyphicon-play"></span><h4>removeSubjectFromGallery() Method</h4>
              	<form id="removeSubjectFromGalleryForm">
                  	Subject ID: <input type="text" class="subject_id" name="Subject ID">
                  	Gallery Name: <input type="text" class="gallery_name" name="Gallery Name">
                  	<input type="button" id="testRemoveSubjectFromGallery" value="Test" />
              	</form>
            </div>
      	</div>
      	<div class="row">
        	<div class="method-test">
          		<span class="glyphicon glyphicon-play"></span><h4>removeGallery() Method</h4>
          		<form id="removeGalleryForm">
              		Gallery Name: <input type="text" class="gallery_name" name="Gallery Name">
              		<input type="button" id="testRemoveGallery" value="Test" />
          		</form>
        	</div>
      	</div>
        <div class="row">
          <div class="method-test">
              <span class="glyphicon glyphicon-play"></span><h4>recognize() Method</h4>
              <form id="recognizeForm">
                  Image: <input type="text" class="image" name="Image">
                  Gallery Name: <input type="text" class="gallery_name" name="Gallery Name">
                  <input type="button" id="testRecognize" value="Test" />
              </form>
          </div>
        </div>
      	<div class="row">
        	<div class="method-test">
          		<span class="glyphicon glyphicon-play"></span><h4>detect() Method</h4>
          		<form id="detectForm">
            		Image: <input type="text" class="image" name="Image">
              		<input type="button" id="testDetect" value="Test" />
          		</form>
        	</div>
      	</div>
        <div class="row">
          <div class="method-test">
              <span class="glyphicon glyphicon-play"></span><h4>verify() Method</h4>
              <form id="verifyForm">
                  Image: <input type="text" class="image" name="Image">
                  Subject ID: <input type="text" class="subject_id" name="Subject ID">
                  Gallery Name: <input type="text" class="gallery_name" name="Gallery Name">
                  <input type="button" id="testVerify" value="Test" />
              </form>
          </div>
        </div>
      	<div class="row">
        	<h5>Response:</h5>
        	<img src="assets/images/loading.gif" id="loader">
        	<div id="view_data" class="col-lg-8"></div>
      	</div>
    </div>

  </body>
</html> 