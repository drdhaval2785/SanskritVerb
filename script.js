$(document).ready(function() {	
	// Check for the blur event
	var response = '';
	$.getData = function(){
		$.ajax({
				type: "POST", // data is transferred by POST
				url: "ajax.php", // data is sent to ajax.php
				async   : false,
				data: $( "form" ).serialize()
				})
				.done(function( data ) {
					response = data; // serialises data got from form of subanta.html
		});
	}
	$( document ).on( "click", "input:radio[name=gender]", function() {// if the user clicks on gender radio button.
		if($('input:radio[name=gender]:checked').val() === "m"){ // if the checked gender is "m"
			$('#step').val('1'); // send value of 'step' as '1' to ajax.php
			$.getData(); // sends data to ajax.php
			$('#step1').html(response); // gets the output from ajax.php and displays it on subanta.html in div class 'step1'. Similar for all the rest of code.
		}
  	});
	$( document ).on( "click", "input:radio[name=cond1_1_1]", function() {
		if($('input:radio[name=cond1_1_1]:checked').val() === '5'){
			$('#step').val('1_1_1_5');
			$.getData();
			$('#step2').html(response);
		}else if($('input:radio[name=cond1_1_1]:checked').val() === '6'){
			$('#step').val('1_1_1_6');
			$.getData();
			$('#step2').html(response);
		}else{
			$('#step2').html(''); // output in div class step2
		}
	});
	
	$( document ).on( "click", "input:radio[name=cond1_1_1_6_3]", function() {
		if($('input:radio[name=cond1_1_1_6_3]:checked').val() == '1'){
			$('#step').val('1_1_1_6_3_1');
			$.getData();
			$('#step3').html(response);
		}else{
			$('#step3').html(''); // output in div class step3. These steps are levels of user feedback.
		}
	});
	$( document ).on( "click", "input:radio[name=cond1_4]", function() {
		if($('input:radio[name=cond1_4]:checked').val() == '2'){
			$('#step').val('1_4_2');
			$.getData();
			$('#step2').html(response);
		}else if($('input:radio[name=cond1_4]:checked').val() == '3'){
			$('#step').val('1_4_3');
			$.getData();
			$('#step2').html(response);
		}else if($('input:radio[name=cond1_4]:checked').val() == '4'){
			$('#step').val('1_4_4');
			$.getData();
			$('#step2').html(response);
		}else if($('input:radio[name=cond1_4]:checked').val() == '6'){
			$('#step').val('1_4_6');
			$.getData();
			$('#step2').html(response);
		}else{
			$('#step2').html('');
		}
	});
	$( document ).on( "click", "input:radio[name=cond1_9]", function() {
		if($('input:radio[name=cond1_9]:checked').val() === '1'){
			$('#step').val('1_9_1');
			$.getData();
			$('#step2').html(response);
		}
        });
	$( document ).on( "click", "input:radio[name=cond1_10]", function() {
		if($('input:radio[name=cond1_10]:checked').val() === '2'){
			$('#step').val('1_10_2');
			$.getData();
			$('#step2').html(response);
		}
        });
	$( document ).on( "click", "input:radio[name=cond1_12]", function() {
		if($('input:radio[name=cond1_12]:checked').val() === '5'){
			$('#step').val('1_12_5');
			$.getData();
			$('#step2').html(response);
		}
        });
	$( document ).on( "click", "input:radio[name=cond1_12_5]", function() {
		if($('input:radio[name=cond1_12_5]:checked').val() === '1'){
			$('#step').val('1_12_5_1');
			$.getData();
			$('#step3').html(response);
		}
        });
	$( document ).on( "click", "input:radio[name=cond1_12_5_1]", function() {
		if($('input:radio[name=cond1_12_5_1]:checked').val() === '1'){
			$('#step').val('1_12_5_1_1');
			$.getData();
			$('#step4').html(response);
		}
        });
	$( document ).on( "click", "input:radio[name=cond1_12_5_1_1]", function() {
		if($('input:radio[name=cond1_12_5_1_1]:checked').val() === '1'){
			$('#step').val('1_12_5_1_1_1');
			$.getData();
			$('#step5').html(response);
		}
        });
	$( document ).on( "click", "input:radio[name=cond1_12_5_1_1_1]", function() {
		if($('input:radio[name=cond1_12_5_1_1_1]:checked').val() === '1'){
			$('#step').val('1_12_5_1_1_1_1');
			$.getData();
			$('#step6').html(response);
		}
        });
	$( document ).on( "click", "input:radio[name=cond1_13]", function() {
		if($('input:radio[name=cond1_13]:checked').val() === '1'){
			$('#step').val('1_13_1');
			$.getData();
			$('#step2').html(response);
		}
        });
	$( document ).on( "click", "input:radio[name=cond1_17]", function() {
		if($('input:radio[name=cond1_17]:checked').val() === '2'){
			$('#step').val('1_17_2');
			$.getData();
			$('#step2').html(response);
		}
        });
               
        
        
/* strIliGga */                
    	$( document ).on( "click", "input:radio[name=gender]", function() {
		if($('input:radio[name=gender]:checked').val() === 'f'){
			$('#step').val('2');
			$.getData();
			$('#step1').html(response);
		}
	});
	$( document ).on( "click", "input:radio[name=cond2_1]", function() {
		if($('input:radio[name=cond2_1]:checked').val() == '2'){
			$('#step').val('2_1_2');
			$.getData();
			$('#step2').html(response);
		}else{
			$('#step2').html('');
		}
	});
        
        	$( document ).on( "click", "input:radio[name=cond2_1_2_1]", function() {
		if($('input:radio[name=cond2_1_2_1]:checked').val() === '5'){
			$('#step').val('2_1_2_1_5');
			$.getData();
			$('#step3').html(response);
		}else if($('input:radio[name=cond2_1_2_1]:checked').val() === '6'){
			$('#step').val('2_1_2_1_6');
			$.getData();
			$('#step3').html(response);
		}else{
			$('#step3').html('');
		}
	});
	
	$( document ).on( "click", "input:radio[name=cond2_1_2_1_6_3]", function() {
		if($('input:radio[name=cond2_1_2_1_6_3]:checked').val() == '1'){
			$('#step').val('2_1_2_1_6_3_1');
			$.getData();
			$('#step4').html(response);
		}else{
			$('#step4').html('');
		}
	});
    	$( document ).on( "click", "input:radio[name=cond2_8]", function() {
		if($('input:radio[name=cond2_8]:checked').val() === '1'){
			$('#step').val('2_8_1');
			$.getData();
			$('#step2').html(response);
		}
	});
    	$( document ).on( "click", "input:radio[name=cond2_8]", function() {
		if($('input:radio[name=cond2_8]:checked').val() === '2'){
			$('#step').val('2_8_2');
			$.getData();
			$('#step2').html(response);
		}
	});
    	$( document ).on( "click", "input:radio[name=cond2_8_1]", function() {
		if($('input:radio[name=cond2_8_1]:checked').val() === '1'){
			$('#step').val('2_8_1_1');
			$.getData();
			$('#step3').html(response);
		}
	});        
    	$( document ).on( "click", "input:radio[name=cond2_8_1]", function() {
		if($('input:radio[name=cond2_8_1]:checked').val() === '2'){
			$('#step').val('2_8_1_2');
			$.getData();
			$('#step3').html(response);
		}
	});
    	$( document ).on( "click", "input:radio[name=cond2_10]", function() {
		if($('input:radio[name=cond2_10]:checked').val() === '1'){
			$('#step').val('2_10_1');
			$.getData();
			$('#step2').html(response);
		}
	});
    	$( document ).on( "click", "input:radio[name=cond2_11]", function() {
		if($('input:radio[name=cond2_11]:checked').val() === '1'){
			$('#step').val('2_11_1');
			$.getData();
			$('#step2').html(response);
		}
	});
    	$( document ).on( "click", "input:radio[name=cond2_13]", function() {
		if($('input:radio[name=cond2_13]:checked').val() === '2'){
			$('#step').val('2_13_2');
			$.getData();
			$('#step2').html(response);
		}
	});
    	$( document ).on( "click", "input:radio[name=cond2_16]", function() {
		if($('input:radio[name=cond2_16]:checked').val() === '1'){
			$('#step').val('2_16_1');
			$.getData();
			$('#step2').html(response);
		}
	});
    	$( document ).on( "click", "input:radio[name=cond2_16]", function() {
		if($('input:radio[name=cond2_16]:checked').val() === '2'){
			$('#step').val('2_16_2_1');
			$.getData();
			$('#step2').html(response);
		}
	});
    	$( document ).on( "click", "input:radio[name=cond2_17]", function() {
		if($('input:radio[name=cond2_17]:checked').val() === '1'){
			$('#step').val('2_17_1');
			$.getData();
			$('#step2').html(response);
		}
	});
    	$( document ).on( "click", "input:radio[name=cond2_22]", function() {
		if($('input:radio[name=cond2_22]:checked').val() === '1'){
			$('#step').val('2_22_1');
			$.getData();
			$('#step2').html(response);
		}
	});
     	$( document ).on( "click", "input:radio[name=cond2_23]", function() {
		if($('input:radio[name=cond2_23]:checked').val() === '1'){
			$('#step').val('2_23_1');
			$.getData();
			$('#step2').html(response);
		}
	});
     	$( document ).on( "click", "input:radio[name=cond2_23_1]", function() {
		if($('input:radio[name=cond2_23_1]:checked').val() === '2'){
			$('#step').val('2_23_1_2');
			$.getData();
			$('#step3').html(response);
		}
	});
       

/* napuMsakaliGga */
	$( document ).on( "click", "input:radio[name=gender]", function() {
		if($('input:radio[name=gender]:checked').val() === "n"){
			$('#step').val('3');
		 	$.getData();
			//$('.innerStep').html('');
			$('#step1').html(response);
		}
  	});
	$( document ).on( "click", "input:radio[name=cond3_3]", function() {
		if($('input:radio[name=cond3_3]:checked').val() == '2'){
			$('#step').val('3_3_2');
			$.getData();
			$('#step2').html(response);
                }
	});
	$( document ).on( "click", "input:radio[name=cond3_3_2]", function() {
		if($('input:radio[name=cond3_3_2]:checked').val() == '1'){
			$('#step').val('3_3_2_1');
			$.getData();
			$('#step3').html(response);
                }
	});

 /* verb */      
	$( document ).on( "click", "input:radio[name=vAcya]", function() {
		if($('input:radio[name=vAcya]:checked').val() === "kartR"){
			$('#step').val('11');
		 	$.getData();
			$('#step1').html(response);
		}
  	});
	$( document ).on( "click", "input:radio[name=vAcya]", function() {
		if($('input:radio[name=vAcya]:checked').val() === "karma"){
			$('#step').val('12');
		 	$.getData();
			$('#step1').html(response);
		}
  	});
	$( document ).on( "click", "input:radio[name=vAcya]", function() {
		if($('input:radio[name=vAcya]:checked').val() === "bhAva"){
			$('#step').val('13');
		 	$.getData();
			$('#step1').html(response);
		}
  	});
	$( document ).on( "click", "input:radio[name=cond11]", function() {
		if($('input:radio[name=cond11]:checked').val() == '1'){
			$('#step').val('11_1');
			$.getData();
			$('#step2').html(response);
                }
	});
	$( document ).on( "click", "input:radio[name=cond14]", function() {
		if($('input:radio[name=cond14]:checked').val() == '1'){
			$('#step').val('14_1');
			$.getData();
			$('#step2').html(response);
                }
	});
        
});