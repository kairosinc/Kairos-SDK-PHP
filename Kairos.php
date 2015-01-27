<?php

/* 
 authored by Eric Turner 
 Copyright 2014 Kairos AR INC
 */


class Kairos {



  protected $hostname;
  protected $app_id;
  protected $api_key;



  function __construct($app_id, $api_key) {

       $this->hostname = 'http://api.kairos.com/';
       $this->app_id = $app_id;
       $this->api_key = $api_key;
    }



    private function imageDataFromFilePath($path)
  {

    $base64 = "";

        if($fp = fopen($path,"rb", 0)) 
        { 
            $image = fread($fp,filesize($path)); 
            fclose($fp); 
            $base64 = chunk_split(base64_encode($image));      
    }

    return $base64;
  }




  private function authenticationProvided()
  {
    if(count($this->api_key) > 0 && count($this->app_id) > 0)
    {
      return true;
    }

    return false;
  }






  public function enrollImageWithPath($image_path, $gallery_id, $subject_id, $options = array())
  {

    $image_data = $this->imageDataFromFilePath($image_path);

    $response = $this->enrollImageWithData($image_data, $gallery_id, $subject_id, $options);

    return $response;
  }






  public function enrollImageWithData($image_data, $gallery_id, $subject_id, $options = array())
  {

    if($this->authenticationProvided() == false)
    {
      return 'set your app_id and api_key before calling this method';
    }

      $request_params = array(
                  "image"        => $image_data, 
                  "gallery_name" => $gallery_id, 
                  "subject_id"   => $subject_id );

      // add options if provided
      foreach($options as $key => $value)
      {
          $request_params[$key] = $value;
      }

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
                'app_key: '. $this->api_key)
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






  public function detectImageWithPath($image_path, $options = array())
  {

    $image_data = $this->imageDataFromFilePath($image_path);

    $response = $this->detectImageWithData($image_data, $options);

    return $response;
  }






  public function detectImageWithData($image_data, $options = array())
  {

    if($this->authenticationProvided() == false)
    {
      return 'set your app_id and api_key before calling this method';
    }

      $request_params = array(
                  "image"  =>  $image_data
                  );

      // add options if provided
      foreach($options as $key => $value)
      {
          $request_params[$key] = $value;
      }

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
                'app_key: '. $this->api_key)
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




  public function recognizeImageWithPath($image_path, $gallery_id, $options = array())
  {

    $image_data = $this->imageDataFromFilePath($image_path);

    $response = $this->recognizeImageWithData($image_data, $gallery_id, $options);

    return $response;
  }





  public function recognizeImageWithData($image_data, $gallery_id, $options = array())
  {

    if($this->authenticationProvided() == false)
    {
      return 'set your app_id and api_key before calling this method';
    }

      $request_params = array(
                  "image"        => $image_data, 
                  "gallery_name" => $gallery_id, 
                  );

      // add options if provided
      foreach($options as $key => $value)
      {
          $request_params[$key] = $value;
      }

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
                'app_key: '. $this->api_key)
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



  public function listGalleries($options = array())
  {

    if($this->authenticationProvided() == false)
    {
      return 'set your app_id and api_key before calling this method';
    }

      $request_params = array();

      // add options if provided
      foreach($options as $key => $value)
      {
          $request_params[$key] = $value;
      }

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
                'app_key: '. $this->api_key)
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




  public function listSubjectsForGallery($gallery_id, $options = array())
  {


    if($this->authenticationProvided() == false)
    {
      return 'set your app_id and api_key before calling this method';
    }

      $request_params = array(
                  "gallery_name" => $gallery_id, 
                  );

      // add options if provided
      foreach($options as $key => $value)
      {
          $request_params[$key] = $value;
      }

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
                'app_key: '. $this->api_key)
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

  public function removeSubjectFromGallery($subject_id, $gallery_id, $options = array())
  {

    if($this->authenticationProvided() == false)
    {
      return 'set your app_id and api_key before calling this method';
    }

      $request_params = array(
                  "gallery_name" => $gallery_id, 
                  "subject_id" => $subject_id
                  );

      // add options if provided
      foreach($options as $key => $value)
      {
          $request_params[$key] = $value;
      }

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
                'app_key: '. $this->api_key)
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