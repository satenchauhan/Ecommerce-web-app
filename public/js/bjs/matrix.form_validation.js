
$(document).ready(function(){

	$("#new_pwd"). click(function(){
		var current_pwd = $("#current_pwd").val();
		$.ajax({
			type: 'get',
			url:'/admin/check-password',
			data:{current_pwd:current_pwd},

			success:function(response){
			   if(response == 'true'){
			   	$('#checkPass').html("<font color='green'>The current password is matched </font>");

			   }else if (response == 'false') {
			   	 $('#checkPass').html("<font color='red'>The current password is incorrect </font>");
			   }
			},
			error:function(){
				alert('Incorrect Pssword');
			}
		});
	});
	
	
	$('input[type=checkbox],input[type=radio],input[type=file]').uniform();
	
	$('select').select2();
	
	// Form Validation
    $("#basic_validate").validate({
		rules:{
			required:{
				required:true
			},
			email:{
				required:true,
				email: true
			},
			date:{
				required:true,
				date: true
			},
			url:{
				required:true,
				url: true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

    //Add  Category Validation
    /*$("#add-category").validate({
		rules:{
			category:{
				required:true
			},
			description:{
				required:true,
			},
			url:{
				required:true,
				
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});*/
	  //edit Category Validation
     /*$("#edit-category").validate({
		rules:{
			category:{
				required:true
			},
			description:{
				required:true,
			},
			url:{
				required:true,
				
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});*/

	$("#number_validate").validate({
		rules:{
			min:{
				required: true,
				min:10
			},
			max:{
				required:true,
				max:24
			},
			number:{
				required:true,
				number:true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	
	$("#password_validate").validate({
		rules:{
			current_pwd:{
				required: true,
				// minlength:6,
				// maxlength:20
			},
			new_pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			confirm_pwd:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#new_pwd"
			},
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

/*	$("#delCat").click(function(){
		if (confirm('Are you sure want to delete this category')) {
			return true;
		}
		return false;
		
	});*/

 //    $(".deleteCategory").click(function(){
 //    	 var id =  $(this).attr('rel');
 //    	 var deleteFunction = $(this).attr('rel1');
 //    	 swal({
	// 	  title: 'Are you sure?',
	// 	  text: "You will not be able to rocover this category record !",
	// 	  type: 'warning',
	// 	  showCancelButton: true,
	// 	  confirmButtonText: 'Yes, delete it !',
	// 	  cancelButtonText: 'No, cancel !',
	// 	  cancelButtonClass: 'btn btn-danger',
	// 	  confirmButtonColor: 'btn btn-success',
	// 	  buttonsStyling: false,
	// 	  reverseButtons: true,

 //         },
 //         function(){
 //         	window.location.href="/admin/"+deleteFunction+"/"+id;
 //         });

	// });

	function delCoupon(){
		if (confirm('Are You sure want to delete this coupon code !!')) {
           return true;
		}
		   return false;
	}
 
	// $("#delete-coupon").click(function(){
	// 	if (confirm('Are you sure want to delete this counpon')) {
	// 		return true;
	// 	}
	// 	return false;
		
	// });
    
    $(".deleteRecord").click(function(){
    	 var id =  $(this).attr('rel');
    	 var deleteFunction = $(this).attr('rel1');
    	 swal({
		  title: 'Are you sure?',
		  text: "You will not be able to revert this record !",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonText: 'Yes, delete it !',
		  cancelButtonText: 'No, cancel !',
		  cancelButtonClass: 'btn btn-default',
		  confirmButtonColor: 'btn btn-success',
		  buttonsStyling: false,
		  reverseButtons: true,

         },
         function(){
         	window.location.href="/admin/"+deleteFunction+"/"+id;
         });

	});

	
	$(document).ready(function(){
	    var maxField = 10; //Input fields increment limitation
	    var addButton = $('.add_button'); //Add button selector
	    var wrapper = $('.field_wrapper'); //Input field wrapper
	    var fieldHTML = '&nbsp;<div style="margin-left:180px; margin-top:-8px;"><input type="text" name="sku[]" placeholder="SKU" id="sku"  style="width: 152PX; height:30px;" required><input type="text" name="size[]" placeholder="Size" id="size"  style="width: 152PX; height:30px;" required><input type="text" name="price[]" placeholder="Price" id="price"  style="width: 152PX; height:30px;" required><input type="text" name="stock[]" placeholder="Stock" id="stock"  style="width: 152PX; height:30px;" required><a href="javascript:void(0);" class="remove_button text-success">&nbsp;&nbsp;<b><span style="font-size: 15px;">&#8722;</span><span style="font-size: 12px;">Remove</span></span></b></a></div>'; //New input field html 
	    var x = 1; //Initial field counter is 1
	    
	    //Once add button is clicked
	    $(addButton).click(function(){
	        //Check maximum number of input fields
	        if(x < maxField){ 
	            x++; //Increment field counter
	            $(wrapper).append(fieldHTML); //Add field html
	        }
	    });
	   
	    //Once remove button is clicked
	    $(wrapper).on('click', '.remove_button', function(e){
	        e.preventDefault();
	        $(this).parent('div').remove(); //Remove field html
	        x--; //Decrement field counter
	    });
	});

});
