/*price range*/

 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

// $(document).ready(function(){
	
// 	$(function () {
// 		$.scrollUp({
// 	        scrollName: 'scrollUp', // Element ID
// 	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
// 	        scrollFrom: 'top', // 'top' or 'bottom'
// 	        scrollSpeed: 300, // Speed back to top (ms)
// 	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
// 	        animation: 'fade', // Fade, slide, none
// 	        animationSpeed: 200, // Animation in speed (ms)
// 	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
// 					//scrollTarget: false, // Set a custom target element for scrolling to the top
// 	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
// 	        scrollTitle: false, // Set a custom <a> title if required.
// 	        scrollImg: false, // Set true to use image
// 	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
// 	        zIndex: 2147483647 // Z-Index for the overlay
// 		});
// 	});
// });

//Get product price  according to size
	// $(document).ready(function(){
	// 	//alert("Hi");
	// 	$('#select_size').change(function(){
	// 		var idSize = $(this).val();
	// 		//alert(idSize);
	// 		  if (idSize == ""){
	// 		  	return false;
	// 		  }
	// 		  $.ajax({
	// 		  	type:'get',
	// 		  	url:'/get-product-price',
	// 		  	data:{idSize:idSize},
	// 		  	success:function(resp){
	// 		  		//alert(resp);
	// 		  		$('#get-price').html("INR "+resp);

	// 		  	},
	// 		  	error:function(){
	// 		  		alert('Error');
	// 		  	}
	// 		  });
	// 	 });
	// });

//Get product stock according to size
$(document).ready(function(){
	//alert("Hi");
	$('#select_size').change(function(){
		var idSize = $(this).val();
		//alert(idSize);
		  if (idSize == ""){
		  	return fasle;
		  }
		  $.ajax({
		  	type:'get',
		  	url:'/get-product-stock',
		  	data:{idSize:idSize},
		  	success:function(resp){
		  		//alert(resp); return false;
		  		$('#get-stock').html("In Stock "+resp);
		  		if (resp == 0) {
		  			$('#cart-button').hide();
		  			$('#get-stock').text("Out of Stock");
		  		}else{
		  			$('#cart-button').show();
		  			$('#get-stock').text("In Stock");
		  		}
		  	},
		  	error:function(){
		  		alert('Error');
		  	}
		  });
	 });
});


//replace or Change Main Image with alternate image to see in large view or zoom
$(document).ready(function(){
	$('.changeImage').click(function(){
       var image = $(this).attr('src');
         $('.mainImage').attr('src',image);
	});
	
});


// Instantiate EasyZoom instances
var $easyzoom = $('.easyzoom').easyZoom();

// Setup thumbnails example
var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

$('.thumbnails').on('click', 'a', function(e) {
	var $this = $(this);

	e.preventDefault();

	// Use EasyZoom's `swap` method
	api1.swap($this.data('standard'), $this.attr('href'));
});

// Setup toggles example
var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');

$('.toggle').on('click', function() {
	var $this = $(this);

	if ($this.data("active") === true) {
		$this.text("Switch on").data("active", false);
		api2.teardown();
	} else {
		$this.text("Switch off").data("active", true);
		api2._init();
	}
});

$(document).ready(function(){
	$("#current_pass"). keyup(function(){
		var current_pass = $(this).val();
		//alert(old_password);
		$.ajax({
			headers:{
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			   },
			type:'post',
			url:'/check-user-pass',
			data:{current_pass:current_pass},

			success:function(response){
				//alert(resp);
			   if(response == 'true'){
			   	$('#checkPass').html("<font color='green'><small>The old password is matched </small></font>");

			   }else if (response == 'false') {
			   	 $('#checkPass').html("<font color='red'><small>The old password is incorrect </small></font>");
			   }
			},
			error:function(){
				alert('Incorrect Pssword');
			}
		});
	  });
});



$(document).ready(function(){

	$('#billtoship').on('click',function(){

       if(this.checked){
       	 $('#shipping-name').val($('#billing-name').val());
       	 $('#shipping-address').val($('#billing-address').val());
       	 $('#shipping-city').val($('#billing-city').val());
       	 $('#shipping-state').val($('#billing-state').val());
       	 $('#shipping-country').val($('#billing-country').val());
       	 $('#shipping-pincode').val($('#billing-pincode').val());
       	 $('#shipping-mobile').val($('#billing-mobile').val());

       }else{
       	 $('#shipping-name').val("");
       	 $('#shipping-address').val("");
       	 $('#shipping-city').val("");
       	 $('#shipping-state').val("");
       	 $('#shipping-country').val("");
       	 $('#shipping-pincode').val("");
       	 $('#shipping-mobile').val("");
       }

	});
	
});

function selectPaymentMethod(){
	//alert('test');
	if($('#Paypal').is(':checked') || $('#COD').is(':checked')){
		//alert("checked");

	}else{
		alert("Please select payment method");
		return false;
	}
	
}
// 	