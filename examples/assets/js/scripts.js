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
      $("#testViewGalleries").click(function () {
        $("#loader").show();
        $("#view_data").empty();
        var auth = {"app_id": $(".app_id").val(), "api_key": $(".api_key").val()};
        var args = null;
        ajaxCallPhp(auth, "viewGalleries", args);
      });
      $("#testEnroll").click(function () {
        $("#view_data").empty();
        if (self.validateMe($("#enrollForm input")) == true) {
          $("#loader").show();
          var auth = {"app_id": $(".app_id").val(), "api_key": $(".api_key").val()};
          var args = {};
          args.image = $("#enrollForm .image").val();
          args.gallery_name = $("#enrollForm .gallery_name").val();
          args.subject_id = $("#enrollForm .subject_id").val();
          ajaxCallPhp(auth, "enroll", args);
        }
      });

      $("#testViewSubjectsInGallery").click(function () {
        $("#view_data").empty();
        if (self.validateMe($("#viewSubjectsInGalleryForm input")) == true) {
          $("#loader").show();
          var auth = {"app_id": $(".app_id").val(), "api_key": $(".api_key").val()};
          var args = {};
          args.gallery_name = $("#viewSubjectsInGalleryForm .gallery_name").val();
          ajaxCallPhp(auth, "viewSubjectsInGallery", args);
        }
      });

      $("#testRemoveSubjectFromGallery").click(function () {
        $("#view_data").empty();
        if (self.validateMe($("#removeSubjectFromGalleryForm input")) == true) {
          $("#loader").show();
            var auth = {"app_id": $(".app_id").val(), "api_key": $(".api_key").val()};
            var args = {};
            args.gallery_name = $("#removeSubjectFromGalleryForm .gallery_name").val();
            args.subject_id = $("#removeSubjectFromGalleryForm .subject_id").val();
            ajaxCallPhp(auth, "removeSubjectFromGallery", args);
        }
      });

      $("#testRemoveGallery").click(function () {
        $("#view_data").empty();
        if (self.validateMe($("#removeGalleryForm input")) == true) {
          $("#loader").show();
            var auth = {"app_id": $(".app_id").val(), "api_key": $(".api_key").val()};
            var args = {};
            args.gallery_name = $("#removeGalleryForm .gallery_name").val();
            ajaxCallPhp(auth, "removeGallery", args);
        }
      });

      $("#testRecognize").click(function () {
        $("#view_data").empty();
        if (self.validateMe($("#recognizeForm input")) == true) {
          $("#loader").show();
            var auth = {"app_id": $(".app_id").val(), "api_key": $(".api_key").val()};
            var args = {};
            args.image = $("#recognizeForm .image").val();
            args.gallery_name = $("#recognizeForm .gallery_name").val();
            ajaxCallPhp(auth, "recognize", args);
        }
      });

      $("#testDetect").click(function () {
        $("#view_data").empty();
        if (self.validateMe($("#detectForm input")) == true) {
          $("#loader").show();
            var auth = {"app_id": $(".app_id").val(), "api_key": $(".api_key").val()};
            var args = {};
            args.image = $("#detectForm .image").val();
            ajaxCallPhp(auth, "detect", args);
        }
      }); 

      $("#testVerify").click(function () {
        $("#view_data").empty();
        if (self.validateMe($("#verifyForm input")) == true) {
          $("#loader").show();
          var auth = {"app_id": $(".app_id").val(), "api_key": $(".api_key").val()};
          var args = {};
          args.image = $("#verifyForm .image").val();
          args.gallery_name = $("#verifyForm .gallery_name").val();
          args.subject_id = $("#verifyForm .subject_id").val();
          ajaxCallPhp(auth, "verify", args);
        }
      });
    },
    validateMe: function(obj) {
      var isValid = true;
      errorAlert = "";
    obj.each(function () {
        if($(this).attr("type") == "text") {
          if($(this).val() == "") {
            isValid = false;
            errorAlert = errorAlert + "Please enter a value for " + $(this).attr("name") + "\n";
          }
        }
      });
      if (isValid == false) {
        alert(errorAlert)
      }
      return isValid;
    },
  }
  var ajaxCallPhp = function(auth, phpMethod, args) {
    var data = {};
    data["auth"] = auth;
    data["phpMethod"] = phpMethod;
    data["args"] = args;

    console.log(data)
    
    $.ajax({
      url      : "controller.php",
      type     : "POST",
      data     :  data,
      dataType : 'text'
    }).done(function(response) {
      $("#view_data").empty();
      $("#view_data").html(response);
      $("#loader").hide();
      $("input:text").not(".app_id, .api_key").val("");
    });
  }
  $(function () {
    methods_test.init()
});


  