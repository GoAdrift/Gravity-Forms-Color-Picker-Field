<?php

// GRAVITY FORMS CODE TO ADD A COLOR SELECTOR FIELD
// USE CLASS 'gaws_color_field' TO ASSIGN CODE TO A TEXT FIELD



add_filter( 'gform_pre_render', 'gaws_headers_colors', 10, 5 );
function gaws_headers_colors( $form ) {

//Change to form ID
	if( $form["id"] != 0 ){
		return $form;
	}

	?><script type="text/javascript">
	
		jQuery(document).ready(function($) {
			jQuery(document).on('gform_post_render', function(event, form_id, current_page){
				
				if( $('li.gaws_color_field').length ){
					$('li.gaws_color_field').each( function(){
						var color = $( this ).find( '.ginput_container > input' ).val();
						console.log( color );
						if( !color ){
							color = "#808080";
						}
						var color_field_id = $( this ).attr('id');
						$(this).css('width', '33%');
						$(this).css('display', 'inline-block');
						$(this).append('<input type="color" id="gaws_color_input" value="'+color+'" for="'+color_field_id+'" label=" - Color Picker">');
						var field_input = $( this ).find( 'input' );
						$( field_input ).on('change', function(){
							var this_val = $( this ).val();
							var this_length = this_val.length;
							var res = this_val.charAt(0);
							if( res == "#" ){
								if( this_length == 7 ){
									$('input#gaws_color_input[for="'+color_field_id+'"]').val( this_val );
								} else if( this_length <= 7 ){
									var dif = 7 - this_length;
									for (dif; dif >= 1;) {
										this_val = this_val + 'F';
										dif--;
									}
									$('input#gaws_color_input[for="'+color_field_id+'"]').val( this_val );
									$( this ).val( this_val );
								}
							} else if( this_length == 6  ){
								var this_val = '#' + this_val;
								$('input#gaws_color_input[for="'+color_field_id+'"]').val( this_val );
							} else if( this_length <= 6 ){
								var this_val = '#' + this_val;
								var dif = 6 - this_length;
								for (dif; dif >= 1;) {
									this_val = this_val + 'F';
									dif--;
								}
								$('input#gaws_color_input[for="'+color_field_id+'"]').val( this_val );
								$( this ).val( this_val );
							}
							
						});
					
					});
					
				//USE BELOW CODE TO CHANGE TARGET HTML
				/*
				$( document ).on('change', 'input#gaws_color_input', function(){
					var this_color = $(this).val();
					if( $(this).attr('for') ){
						 var for_val = $(this).attr('for');
						$( '#'+for_val ).find( 'input' ).val( this_color );
					}
				});
				$( 'div.gaws-color-p > p > a:nth-child(4)' ).visited = true;
				$( document ).on('change focus click load', function(){
					var color_val = $('#input_3_26, input[type="color"][for="field_3_26"]').val();
					$('.gaws-color-body').css('background-color', color_val);
				});

				$( document ).on('change focus click load', function(){
					var color_val = $('#input_3_30, input[type="color"][for="field_3_30"]').val();
					$('.gaws-color-section').css('background-color', color_val);
				});
				
				$( document ).on('change focus click load', function(){
					var border_width = $('#input_3_38')[0].value;
					var border_color = $('input[type="color"][for="field_3_40"]')[0].value;
					if(!border_color){
						border_color = '#000000';
					}
					if(!border_width){
						border_width = 0;
					}
					var val = 'solid '+border_width+'px '+border_color;
					$('.gaws-color-section').css( 'border', val );
				});
				
				
				$( document ).on('change focus click load', function(){
					var color_val = $('#input_3_32, input[type="color"][for="field_3_32"]').val();
					$('.gaws-color-h1, .gaws-color-h2, .gaws-color-h3, .gaws-color-h4, .gaws-color-h5, .gaws-color-h6').css('color', color_val);
				});
				
				$( document ).on('change focus click load', function(){
					var color_val = $('#input_3_31, input[type="color"][for="field_3_31"]').val();
					$('.gaws-color-p').css('color', color_val);
				});
				
				$( document ).on('change focus click load', function(){
					var color_val = $('#input_3_34, input[type="color"][for="field_3_34"]').val();
					$('.gaws-color-p > p > a:not(a.visited-demo), .gaws-color-p > p > i > a:not(a.visited-demo)').css('color', color_val);
				});
				
				$( document ).on('change focus click load', function(){
					var color_val = $('#input_3_35, input[type="color"][for="field_3_35"]').val();
					$('.gaws-color-p > p > a.visited-demo, .gaws-color-p > p > i > a.visited-demo').css('color', color_val);
				});
				
				$( document ).on( 'change focus click load', 'input[id^="choice_3_37_"]', function(){
					var is_checked = $('#choice_3_37_1')[0].checked;
					if( is_checked ){
						$('#field_3_33 > div > div').css('border-radius', '20px');
					} else {
						$('#field_3_33 > div > div').css('border-radius', '0px');
					}
				});
				
				*/
			}
			});
		});
	
	</script>
<style>
.gaws-color-body{
	border: solid black 2px;
	background: white;
	color: black;
	padding: 20px;
}

.gaws-color-p > p > a, .gaws-color-p > p > a:visted, .gaws-color-body a, .gaws-color-body a:visted{
	color: black;
} 


.gaws-color-section{
	padding: 20px;
}

#gaws_color_input{
	width: 120px;
  height: 50px;
	background: #FFFFFF;
	margin-top: 20px;
	margin-left: 30px;
}

</style><?php
	
}
