
  $(document).ready(function(){
      $({property: 0}).animate({property: 105}, {
        duration: 4000,
        step: function() {
          var _percent = Math.round(this.property);
          $("#progress").css("width",  _percent+"%");
          if(_percent == 105) {
            $("#progress").addClass("done");
          }
        },
        complete: function() {
          alert("complete");
        }
      });
    });
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();

    tinymce.init({
    	selector:'textarea',
    	plugins: "link textcolor lists code",
     });



    $(".ajax-call").loadingbar({
  target: "#loadingbar-frame",
  replaceURL: false,
  direction: "right",
 
  /* Default Ajax Parameters.  */
  async: true, 
  complete: function(xhr, text) {},
  cache: true,
  error: function(xhr, text, e) {},
  global: true,
  headers: {},
  statusCode: {},
  success: function(data, text, xhr) {},
  dataType: "html",
  done: function(data) {}
});
   

});


 
