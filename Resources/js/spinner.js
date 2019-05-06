const REEL_RADIUS = 175;
var seed = 0;
function prepareStyles() {
	var style = '';
	for (var i = 0; i < SLOTS_PER_REEL; i++) {
		var rotation = 1800 + (360 / SLOTS_PER_REEL) * i;
		style += '.spin-' + i + ' { transform: rotateX(-' + rotation + 'deg); }';
		style += '@keyframes spin-' + i + ' { 0% { transform: rotateX(30deg); } 100% { transform: rotateX(-' + rotation + 'deg); } }';
	}
	var styleSheet = document.createElement("style")
	styleSheet.type = "text/css"
	styleSheet.innerText = style
	document.head.appendChild(styleSheet)
}

function createSlots () {
	var ring = $('#ring');
	var slotAngle = 360 / SLOTS_PER_REEL;
	for (var i = 0; i < SLOTS_PER_REEL; i ++) {
		var slot = document.createElement('div');
		$(slot).attr('id','slot' + i);
		$(slot).attr('class','slot border');
		slot.style.transform = 'rotateX(' + (slotAngle * i) + 'deg) translateZ(' + REEL_RADIUS + 'px)';
		$(slot).append('<p>' + RESTAURANT_DATA[i]['name'] + '</p>');
		ring.append(slot);
	}
}

function spin(timer) {
	seed = Math.floor(Math.random()*(SLOTS_PER_REEL));
	$('#ring')
		.css('animation','1s, spin-' + seed + ' ' + (timer) + 's')
		.attr('class','ring spin-' + seed);
}

$(document).ready(function() {
	prepareStyles();
	createSlots();
 	$('#go').on('click',function(){
 		var timer = 3;
 		spin(timer);
		setTimeout(function() {
			$('#go').css("display", "none");
			$('#redir').css("display", "inline");
		}, 
		timer * 1000);
		
 	})
	
	$('#redir').on('click',function(){
		$.extend({
			redirectPost: function(location, args) {
				var form = $('<form></form>');
				form.attr("method", "post");
				form.attr("action", location);

				$.each( args, function( key, value ) {
					var field = $('<input></input>');

					field.attr("type", "hidden");
					field.attr("name", key);
					field.attr("value", value);

					form.append(field);
				});
				$(form).appendTo('body').submit();
			}
		});
 		$.redirectPost('index', {restaurant_redirect: 'true', restaurant_id: RESTAURANT_DATA[seed]['id']});
		
	})
 })
