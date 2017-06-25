$(document).ready(function(){
  var options = {
    data: { action:'demo_ajax' },
    type: 'POST',
    success:function(response){
      //alert(response);
    },

    error:function(err){
      console.log(err)
    }

  };

  $.ajax(ajaxurl, options);

});
