$(document).ready(function(){
    var buy_cur_rate ="";
  $("#buy_selected_cur").on('change',function(){
    $('#amt_buy').val('');
    $('#buy_order').html('');

    var check_selected = $( "#buy_selected_cur option:selected").val();
    if( check_selected !=="null" ){
      var selected = $( "#buy_selected_cur option:selected").text();

      console.log(selected);
    }

    var rate_options = {
      type: "POST",
      async:true,
      data: { action:"buy_cur_exchnage_rate" , cur_name:selected },
      crossDomain:true,
      success:function(response){
        buy_cur_rate = response;
      },
      error:function(err){
        console.log(err);
      },

    };
    $.ajax(ajaxurl,rate_options);
    //console.log(cur_rate);
  });


  $("#amt_buy").on('keyup',function(){
    var amount = $( "#amt_buy" ).val();
    if( amount < 10 ){

    }


  var order_total = buy_cur_rate * amount;
  $("#buy_order").html("<p class='text-primary'>Order Total Amount In Naira To Be Paid is:&#8358;" +order_total+"</p>").show(1100);
  $("#total_order").val(order_total);
  console.log(order_total);

});





//convert sell order

var sell_cur_rate ="";
$("#selected_currency_sell").on('change',function(){
  $('#amt_sell').val('');
  $("#sell_order").html('');

  var checked_selected = $( "#selected_currency_sell option:selected").val();
  if( checked_selected !=="null" ){
    var cur_selected = $( "#selected_currency_sell option:selected").text();
  }

  var sell_rate_options = {
    type: "POST",
    async:true,
    data: { action:"sell_cur_exchnage_rate" , currency_name:cur_selected },
    crossDomain:true,
    success:function(response){
      sell_cur_rate = response;
      console.log(response);

    },
    error:function(err){
      console.log(err);
    },

  };

  $.ajax(ajaxurl,sell_rate_options);
  console.log(sell_cur_rate);
});

//end sell get_sell_exchange rate

$("#amt_sell").on('keyup',function(){
  var amount = $( "#amt_sell" ).val();
var sell_order_total = sell_cur_rate * amount;
$("#sell_order").html("<p class='text-primary'>Order Total Amount In Naira To Be Paid is:&#8358;" +sell_order_total+"</p>").show(1100);
$("#total_sell_order").val(sell_order_total);
//console.log(sell_order_total);

});



$("#buy_currency").click(function(evt){
    evt.preventDefault();
  $("#buy_form").submit();
  var postedData = [];
    var buyData = $("#buy_form").serializeArray();
    //console.log(buyData);
    postedData = { postd: buyData};
    //console.log(postedData);
    postedData['action'] = "process_buy_order";
    var options = {
    data: postedData,
    type: "POST",
    async: true,
    crossDomain:true,
    success: function(data){
      $("#response").html(data);
    },
    error:function(err){
      console.log(err)
    },
  };
  $.ajax(ajaxurl, options);


});

//handle sell order

$("#sell_currency_btn").click(function(evt){
    evt.preventDefault();
  $("#sell_form").submit();
  var sellData = [];

    var postedDataSell = $("#sell_form").serializeArray();
    console.log(postedDataSell);
    sellData = { postd:postedDataSell };
    sellData['action'] = "process_sell_order";

  var sellOptions = {
    data: sellData,
    type: "POST",
    async: true,
    crossDomain:true,
    success: function(data){
      $("#sell_response").html(data);
    },
    error:function(err){
      console.log(err)
    },
  };
  $.ajax(ajaxurl, sellOptions);


});

$("#orderstatus").on("click", function(e){
  e.preventDefault();
var order_ID = $("#order_ref").val();
console.log(order_ID);
var checkData = { orderID:order_ID , action:"check_the_order_status" };
var check_status_Options = {
  type:"POST",
  async:true,
  crossDomain:true,
  data:checkData,
  success:function(data){
    $("#order_response").html("<div class='alert alert-info'>The order status is : "+data+" </div>");
  },
  error:function(err){
    console.log(err)
  }

};

$.ajax(ajaxurl,check_status_Options );

});


$("#fetch_user").click(function(evt){
  evt.preventDefault();

var email = $("#user_email").val();
console.log(email);
var checkData = { email_id:email , action:"get_user_info_by_mail" };
var check_status_Options = {
  type:"POST",
  async:true,
  crossDomain:true,
  data:checkData,
  success:function(data){
    $("#user_info").html(data);
  },
  error:function(err){
    console.log(err)
  }

};

$.ajax(ajaxurl,check_status_Options );

});

//handle manage currencies

$("#add_cur").click(function(e){
  e.preventDefault();

var currency = $("#cur_name").val(),
    sell_rate = $("#sell_cur_rate").val(),
    buy_rate = $("#buy_cur_rate").val(),
    currency_status = $("#cur_status").val();

    console.log("hello");

var add_cur_data = { cur_name:currency ,buying_cur_rate:buy_rate , selling_cur_rate:sell_rate, cur_status:currency_status, action:"add_update_currency" };

var check_add_status = {
  type:"POST",
  async:true,
  crossDomain:true,
  data:add_cur_data,
  success:function(data){
    $("#add_status").html(data);
  },
  error:function(err){
    console.log(err)
  }

};

$.ajax(ajaxurl,check_add_status );
});


//currency update
$("#update_cur").click(function(e){
  e.preventDefault();

var currency_selected = $("#cur_selected").val(),
    new_sell_rate = $("#new_sell_cur_rate").val(),
    new_buy_rate = $("#new_buy_cur_rate").val(),
    newStatus = $("#new_cur_status").val();

    //console.log(currency, rate, currency_status) ;
var add_cur_data = { cur_name:currency_selected ,updated_sell_cur_rate:new_sell_rate, updated_buy_cur_rate:new_buy_rate , cur_status:newStatus, action:"update_currency" };
var check_add_status = {
  type:"POST",
  async:true,
  crossDomain:true,
  data:add_cur_data,
  success:function(data){
    $("#update_status").html(data);
  },
  error:function(err){
    console.log(err)
  }

};

$.ajax(ajaxurl,check_add_status );

});


//order status update
$("#db_order_update").click(function(evt){
  evt.preventDefault();

var new_stats = $("#new_order_status").val(),
    orderID = $("#order_ID").val(),
    update_order_data = { new_status:new_stats ,update_ID:orderID, action:"update_status_order" },
    update_order_status = {
  type:"POST",
  async:true,
  crossDomain:true,
  data:update_order_data,
  success:function(data){
    $("#status_update_response").html(data);
  },
  error:function(err){
    console.log(err)
  }

};

console.log(new_stats);

$.ajax(ajaxurl,update_order_status );

});


  });
