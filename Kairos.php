<?php

//------------------------------------
// Kairos.php
// sends curl requests to Kairos ID API  
// created: November 2016
// author: Steve Rucker
//------------------------------------


class Kairos {

  protected $hostname;
  protected $app_id;
  protected $app_key;

  public function __construct($app_id, $app_key) {

       $this->hostname = 'http://api.kairos.com/';
       $this->app_id = $app_id;
       $this->app_key = $app_key;
    }


  private function authenticationProvided()
  {
    if(count($this->app_key) > 0 && count($this->app_id) > 0)
    {
      return true;
    }

    return false;
  }

  public function viewGalleries($args = array())
  {

    if($this->authenticationProvided() == false)
    {
      return 'set your app_id and app_key before calling this method';
    }

      $request_params = array();

      // build request string
      $request = json_encode($request_params);

      try
      {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,            $this->hostname . "gallery/list_all" );
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,  "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS,     $request);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, 
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($request),
                'app_id: ' . $this->app_id,
                'app_key: '. $this->app_key)
            );

        $response = curl_exec($ch);

        curl_close($ch);

      }
      catch(Exception $ex)
      {
          return 'there was a problem';
      }

      return $response;
  }


  public function enroll($args = array())
  {

    // to get base64
    // $image_data = base64_encode(file_get_contents($args["image_path"]));

    if($this->authenticationProvided() == false)
    {
      return 'set your app_id and app_key before calling this method';
    }


      $request_params = array(
                  "image"        => $args["image"], 
                  "gallery_name" => $args["gallery_name"], 
                  "subject_id"   => $args["subject_id"] );

      // build request string
      $request = json_encode($request_params);

      try
      {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,            $this->hostname . "enroll" );
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,  "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS,     $request);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, 
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($request),
                'app_id: ' . $this->app_id,
                'app_key: '. $this->app_key)
            );

        $response = curl_exec($ch);

        curl_close($ch);

      }
      catch(Exception $ex)
      {
          return 'there was a problem';
      }

      return $response;
  }


  public function viewSubjectsInGallery($args = array())
  {

    if($this->authenticationProvided() == false)
    {
      return 'set your app_id and app_key before calling this method';
    }

    $request_params = array(
      "gallery_name" => $args["gallery_name"], 
    );

    // build request string
    $request = json_encode($request_params);

    try
    {

      $ch = curl_init();

      curl_setopt($ch, CURLOPT_URL,            $this->hostname . "gallery/view" );
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST,  "POST");
      curl_setopt($ch, CURLOPT_POSTFIELDS,     $request);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, 
          array(
              'Content-Type: application/json',
              'Content-Length: ' . strlen($request),
              'app_id: ' . $this->app_id,
              'app_key: '. $this->app_key)
          );

      $response = curl_exec($ch);

      curl_close($ch);

    }
    catch(Exception $ex)
    {
        return 'there was a problem';
    }

    return $response;

  }



  public function removeSubjectFromGallery($args = array())
  {

    if($this->authenticationProvided() == false)
    {
      return 'set your app_id and app_key before calling this method';
    }

      $request_params = array(
        "gallery_name" => $args["gallery_name"], 
        "subject_id" => $args["subject_id"],
      );

      // build request string
      $request = json_encode($request_params);

      try
      {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,            $this->hostname . "gallery/remove_subject" );
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,  "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS,     $request);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, 
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($request),
                'app_id: ' . $this->app_id,
                'app_key: '. $this->app_key)
            );

        $response = curl_exec($ch);

        curl_close($ch);

      }
      catch(Exception $ex)
      {
          return 'there was a problem';
      }

      return $response;
  }

  public function removeGallery($args = array())
  {


    if($this->authenticationProvided() == false)
    {
      return 'set your app_id and app_key before calling this method';
    }

      $request_params = array(
        "gallery_name" => $args["gallery_name"]
      );


      // build request string
      $request = json_encode($request_params);

      try
      {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,            $this->hostname . "gallery/remove" );
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,  "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS,     $request);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, 
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($request),
                'app_id: ' . $this->app_id,
                'app_key: '. $this->app_key)
            );

        $response = curl_exec($ch);

        curl_close($ch);

      }
      catch(Exception $ex)
      {
          return 'there was a problem';
      }

      return $response;

  }


  public function recognize($args = array())
  {

    if($this->authenticationProvided() == false)
    {
      return 'set your app_id and app_key before calling this method';
    }

      $request_params = array(
        "image"  =>  $args["image"],
        "gallery_name"  =>  $args["gallery_name"]
      );

      // build request string
      $request = json_encode($request_params);

      try
      {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,            $this->hostname . "recognize" );
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,  "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS,     $request);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, 
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($request),
                'app_id: ' . $this->app_id,
                'app_key: '. $this->app_key)
            );

        $response = curl_exec($ch);

        curl_close($ch);

      }
      catch(Exception $ex)
      {
          return 'there was a problem';
      }

      return $response;
  }

  public function detect($args = array())
  {

    if($this->authenticationProvided() == false)
    {
      return 'set your app_id and app_key before calling this method';
    }

      $request_params = array(
        "image"  =>  $args["image"]
      );

      // build request string
      $request = json_encode($request_params);

      try
      {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,            $this->hostname . "detect" );
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,  "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS,     $request);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, 
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($request),
                'app_id: ' . $this->app_id,
                'app_key: '. $this->app_key)
            );

        $response = curl_exec($ch);

        curl_close($ch);

      }
      catch(Exception $ex)
      {
          return 'there was a problem';
      }

      return $response;

  }

  public function verify($args = array())
  {

    if($this->authenticationProvided() == false)
    {
      return 'set your app_id and app_key before calling this method';
    }

      $request_params = array(
        "image"  =>  $args["image"],
        "subject_id"  =>  $args["subject_id"],
        "gallery_name"  =>  $args["gallery_name"]
      );

      // build request string
      $request = json_encode($request_params);

      try
      {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,            $this->hostname . "verify" );
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,  "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS,     $request);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, 
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($request),
                'app_id: ' . $this->app_id,
                'app_key: '. $this->app_key)
            );

        $response = curl_exec($ch);

        curl_close($ch);

      }
      catch(Exception $ex)
      {
          return 'there was a problem';
      }

      return $response;

  }

  



}

?>