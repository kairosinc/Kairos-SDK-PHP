//------------------------------------
// scripts.js
// javascript object which sends data to controller.php via AJAX
// created: November 2016
// author: Steve Rucker
//------------------------------------

var methods_test = methods_test || {}
methods_test = {
    init: function () {
      this.setActions();
    },
    setActions: function () {
      var self = this;
      $("#validateKeys").click(function () {
        $("#loader").show();
        $("#view_data").empty();
        var auth = {"app_id": $(".app_id").val(), "app_key": $(".app_key").val()};
        var args = null;
        ajaxValidateKeys(auth, "viewGalleries", args);
      });
      $("#testViewGalleries").click(function () {
        self.startTimer();
        $("#loader").show();
        $("#view_data").empty();
        var auth = {"app_id": $(".app_id").val(), "app_key": $(".app_key").val()};
        var args = null;
        ajaxCallPhp(auth, "viewGalleries", args);
      });
      $("#testEnroll").click(function () {
        $("#view_data").empty();
        if (self.validateMe($("#enrollForm")) == true) {
          self.startTimer();
          $("#loader").show();
          var auth = {"app_id": $(".app_id").val(), "app_key": $(".app_key").val()};
          var args = {};
          args.gallery_name = $("#enrollForm .gallery_name").val();
          args.subject_id = $("#enrollForm .subject_id").val();
          if($("#enrollForm .image-upload").val() != "") {
            var file = $('#enrollForm .image-upload')[0].files[0]; 
            var reader  = new FileReader();
            reader.readAsDataURL(file);
            reader.onloadend = function () {
              var fileData = parseImageData(reader.result);
              args.image = fileData;
              ajaxCallPhp(auth, "enroll", args);
            }
          }
          else {
            args.image = $("#enrollForm .image").val();
            ajaxCallPhp(auth, "enroll", args);
          }
        }
      });

      $("#testViewSubjectsInGallery").click(function () {
        $("#view_data").empty();
        if (self.validateMe($("#viewSubjectsInGalleryForm input")) == true) {
          self.startTimer();
          $("#loader").show();
          var auth = {"app_id": $(".app_id").val(), "app_key": $(".app_key").val()};
          var args = {};
          args.gallery_name = $("#viewSubjectsInGalleryForm .gallery_name").val();
          ajaxCallPhp(auth, "viewSubjectsInGallery", args);
        }
      });

      $("#testRemoveSubjectFromGallery").click(function () {
        $("#view_data").empty();
        if (self.validateMe($("#removeSubjectFromGalleryForm input")) == true) {
          self.startTimer();
          $("#loader").show();
            var auth = {"app_id": $(".app_id").val(), "app_key": $(".app_key").val()};
            var args = {};
            args.gallery_name = $("#removeSubjectFromGalleryForm .gallery_name").val();
            args.subject_id = $("#removeSubjectFromGalleryForm .subject_id").val();
            ajaxCallPhp(auth, "removeSubjectFromGallery", args);
        }
      });

      $("#testRemoveGallery").click(function () {
        $("#view_data").empty();
        if (self.validateMe($("#removeGalleryForm input")) == true) {
          self.startTimer();
          $("#loader").show();
            var auth = {"app_id": $(".app_id").val(), "app_key": $(".app_key").val()};
            var args = {};
            args.gallery_name = $("#removeGalleryForm .gallery_name").val();
            ajaxCallPhp(auth, "removeGallery", args);
        }
      });

      $("#testRecognize").click(function () {
        $("#view_data").empty();
        if (self.validateMe($("#recognizeForm")) == true) {
          self.startTimer();
          $("#loader").show();
            var auth = {"app_id": $(".app_id").val(), "app_key": $(".app_key").val()};
            var args = {};
            args.gallery_name = $("#recognizeForm .gallery_name").val();
            if($("#recognizeForm .image-upload").val() != "") {
              var file = $('#recognizeForm .image-upload')[0].files[0]; 
              var reader  = new FileReader();
              reader.readAsDataURL(file);
              reader.onloadend = function () {
                var fileData = parseImageData(reader.result);
                args.image = fileData;
                ajaxCallPhp(auth, "recognize", args);
              }
            }
            else {
              args.image = $("#recognizeForm .image").val();
              ajaxCallPhp(auth, "recognize", args);
            }
        }
      });

      $("#testDetect").click(function () {
        $("#view_data").empty();
        if (self.validateMe($("#detectForm")) == true) {
          self.startTimer();
          $("#loader").show();
          var auth = {"app_id": $(".app_id").val(), "app_key": $(".app_key").val()};
          var args = {};
          if($("#detectForm .image-upload").val() != "") {
            var file = $('#detectForm .image-upload')[0].files[0]; 
            var reader  = new FileReader();
            reader.readAsDataURL(file);
            var a = new Date();
            console.log(a.getTime())
            reader.onloadend = function () {
              var b = new Date();
              console.log(b.getTime())
              var fileData = parseImageData(reader.result);
              args.image = fileData;
              ajaxCallPhp(auth, "detect", args);
            }
          }
          else {
            args.image = $("#detectForm .image").val();
            ajaxCallPhp(auth, "detect", args);
          }
        }
      }); 

      $("#testVerify").click(function () {
        $("#view_data").empty();
        if (self.validateMe($("#verifyForm")) == true) {
          self.startTimer();
          $("#loader").show();
          var auth = {"app_id": $(".app_id").val(), "app_key": $(".app_key").val()};
          var args = {};
          args.gallery_name = $("#verifyForm .gallery_name").val();
          args.subject_id = $("#verifyForm .subject_id").val();
          if($("#verifyForm .image-upload").val() != "") {
            var file = $('#verifyForm .image-upload')[0].files[0]; 
            var reader  = new FileReader();
            reader.readAsDataURL(file);
            reader.onloadend = function () {
              var fileData = parseImageData(reader.result);
              args.image = fileData;
              ajaxCallPhp(auth, "verify", args);
            }
          }
          else {
            args.image = $("#verifyForm .image").val();
            ajaxCallPhp(auth, "verify", args);
          }
        }
      });
    },
    validateMe: function(obj) {
      var isValid = true;
      errorAlert = "";
      var fileUploaded = false;
      if(obj.find(".image-upload").val() != "") {
        fileUploaded = true;
      }
      obj.find("input").each(function () {
        if($(this).attr("type") == "text" && !$(this).hasClass("image")) {
          if($(this).val() == "") {
            isValid = false;
            errorAlert = errorAlert + "Please enter a value for " + $(this).attr("name") + "\n";
          }
        }
        if($(this).hasClass("image")) {
          if($(this).val() == "" && !fileUploaded) {
            isValid = false;
            errorAlert = errorAlert + "Please either enter an image URL or image base64 data, or upload an image" + "\n";
          }
          if($(this).val() != "" && fileUploaded) {
            isValid = false;
            $(this).val("");
            $("input:file").val("");
            errorAlert = errorAlert + "You cannot enter an image URL or image base64 data AND upload an image.  Please do one or the other." + "\n";
          }
        }
      });
      if (isValid == false) {
        alert(errorAlert)
      }
      return isValid;
    },
    startTimer: function() {
      $(".timer").html("");
      var currTime = 0;
      self.timer = setInterval(function(){
        currTime ++;
        $("#timer").html(currTime + " sec");
      },1000);
    }
}
var ajaxValidateKeys = function(auth, phpMethod, args) {
  var data = {};
  data["auth"] = auth;
  data["phpMethod"] = phpMethod;
  data["args"] = args; 
  $.ajax({
    url      : "controller.php",
    type     : "POST",
    data     :  data,
    dataType : 'text'
  }).done(function(response) {
    if (response == "Authentication failed") {
      var msg = "Invalid Keys";
    }
    else {
      var msg = "Keys Validated";
    }
    $("#view_data").empty();
    $("#view_data").html(msg);
    $("#loader").hide();
    $("input:text").not(".app_id, .app_key").val("");
    $("input:file").val("");
  });
}
var ajaxCallPhp = function(auth, phpMethod, args) {
  var data = {};
  data["auth"] = auth;
  data["phpMethod"] = phpMethod;
  data["args"] = args;  
  $.ajax({
    url      : "controller.php",
    type     : "POST",
    data     :  data,
    dataType : 'text'
  }).done(function(response) {
    clearInterval(self.timer);
    $("#view_data").empty();
    $("#view_data").html(response);
    $("#loader").hide();
    $("input:text").not(".app_id, .app_key").val("");
    $("input:file").val("");
  });
}

var parseImageData = function(imageData) {
    imageData = imageData.replace("data:image/jpeg;base64,", "");
    imageData = imageData.replace("data:image/jpg;base64,", "");
    imageData = imageData.replace("data:image/png;base64,", "");
    imageData = imageData.replace("data:image/gif;base64,", "");
    imageData = imageData.replace("data:image/bmp;base64,", "");
    return imageData;
}

$(function () {
    methods_test.init()
});


  