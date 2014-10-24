/** External Links - Opens links in a new window - Add rel="external" to links **/

function externalLinks() { if (!document.getElementsByTagName) return; var anchors = document.getElementsByTagName("a"); for (var i=0; i<anchors.length; i++) { var anchor = anchors[i]; if (anchor.getAttribute("href") && anchor.getAttribute("rel") == "external") anchor.target = "_blank"; } } window.onload = externalLinks;

/** jQuery Easing **/

jQuery.easing.jswing=jQuery.easing.swing;
jQuery.extend(jQuery.easing,{def:"easeOutQuad",swing:function(e,a,c,b,d){return jQuery.easing[jQuery.easing.def](e,a,c,b,d)},easeInQuad:function(e,a,c,b,d){return b*(a/=d)*a+c},easeOutQuad:function(e,a,c,b,d){return-b*(a/=d)*(a-2)+c},easeInOutQuad:function(e,a,c,b,d){if((a/=d/2)<1)return b/2*a*a+c;return-b/2*(--a*(a-2)-1)+c},easeInCubic:function(e,a,c,b,d){return b*(a/=d)*a*a+c},easeOutCubic:function(e,a,c,b,d){return b*((a=a/d-1)*a*a+1)+c},easeInOutCubic:function(e,a,c,b,d){if((a/=d/2)<1)return b/
	2*a*a*a+c;return b/2*((a-=2)*a*a+2)+c},easeInQuart:function(e,a,c,b,d){return b*(a/=d)*a*a*a+c},easeOutQuart:function(e,a,c,b,d){return-b*((a=a/d-1)*a*a*a-1)+c},easeInOutQuart:function(e,a,c,b,d){if((a/=d/2)<1)return b/2*a*a*a*a+c;return-b/2*((a-=2)*a*a*a-2)+c},easeInQuint:function(e,a,c,b,d){return b*(a/=d)*a*a*a*a+c},easeOutQuint:function(e,a,c,b,d){return b*((a=a/d-1)*a*a*a*a+1)+c},easeInOutQuint:function(e,a,c,b,d){if((a/=d/2)<1)return b/2*a*a*a*a*a+c;return b/2*((a-=2)*a*a*a*a+2)+c},easeInSine:function(e,
		a,c,b,d){return-b*Math.cos(a/d*(Math.PI/2))+b+c},easeOutSine:function(e,a,c,b,d){return b*Math.sin(a/d*(Math.PI/2))+c},easeInOutSine:function(e,a,c,b,d){return-b/2*(Math.cos(Math.PI*a/d)-1)+c},easeInExpo:function(e,a,c,b,d){return a==0?c:b*Math.pow(2,10*(a/d-1))+c},easeOutExpo:function(e,a,c,b,d){return a==d?c+b:b*(-Math.pow(2,-10*a/d)+1)+c},easeInOutExpo:function(e,a,c,b,d){if(a==0)return c;if(a==d)return c+b;if((a/=d/2)<1)return b/2*Math.pow(2,10*(a-1))+c;return b/2*(-Math.pow(2,-10*--a)+2)+c},
	easeInCirc:function(e,a,c,b,d){return-b*(Math.sqrt(1-(a/=d)*a)-1)+c},easeOutCirc:function(e,a,c,b,d){return b*Math.sqrt(1-(a=a/d-1)*a)+c},easeInOutCirc:function(e,a,c,b,d){if((a/=d/2)<1)return-b/2*(Math.sqrt(1-a*a)-1)+c;return b/2*(Math.sqrt(1-(a-=2)*a)+1)+c},easeInElastic:function(e,a,c,b,d){e=1.70158;var f=0,g=b;if(a==0)return c;if((a/=d)==1)return c+b;f||(f=d*0.3);if(g<Math.abs(b)){g=b;e=f/4}else e=f/(2*Math.PI)*Math.asin(b/g);return-(g*Math.pow(2,10*(a-=1))*Math.sin((a*d-e)*2*Math.PI/f))+c},easeOutElastic:function(e,
		a,c,b,d){e=1.70158;var f=0,g=b;if(a==0)return c;if((a/=d)==1)return c+b;f||(f=d*0.3);if(g<Math.abs(b)){g=b;e=f/4}else e=f/(2*Math.PI)*Math.asin(b/g);return g*Math.pow(2,-10*a)*Math.sin((a*d-e)*2*Math.PI/f)+b+c},easeInOutElastic:function(e,a,c,b,d){e=1.70158;var f=0,g=b;if(a==0)return c;if((a/=d/2)==2)return c+b;f||(f=d*0.3*1.5);if(g<Math.abs(b)){g=b;e=f/4}else e=f/(2*Math.PI)*Math.asin(b/g);if(a<1)return-0.5*g*Math.pow(2,10*(a-=1))*Math.sin((a*d-e)*2*Math.PI/f)+c;return g*Math.pow(2,-10*(a-=1))*Math.sin((a*
			d-e)*2*Math.PI/f)*0.5+b+c},easeInBack:function(e,a,c,b,d,f){if(f==undefined)f=1.70158;return b*(a/=d)*a*((f+1)*a-f)+c},easeOutBack:function(e,a,c,b,d,f){if(f==undefined)f=1.70158;return b*((a=a/d-1)*a*((f+1)*a+f)+1)+c},easeInOutBack:function(e,a,c,b,d,f){if(f==undefined)f=1.70158;if((a/=d/2)<1)return b/2*a*a*(((f*=1.525)+1)*a-f)+c;return b/2*((a-=2)*a*(((f*=1.525)+1)*a+f)+2)+c},easeInBounce:function(e,a,c,b,d){return b-jQuery.easing.easeOutBounce(e,d-a,0,b,d)+c},easeOutBounce:function(e,a,c,b,d){return(a/=
			d)<1/2.75?b*7.5625*a*a+c:a<2/2.75?b*(7.5625*(a-=1.5/2.75)*a+0.75)+c:a<2.5/2.75?b*(7.5625*(a-=2.25/2.75)*a+0.9375)+c:b*(7.5625*(a-=2.625/2.75)*a+0.984375)+c},easeInOutBounce:function(e,a,c,b,d){if(a<d/2)return jQuery.easing.easeInBounce(e,a*2,0,b,d)*0.5+c;return jQuery.easing.easeOutBounce(e,a*2-d,0,b,d)*0.5+b*0.5+c}});

/** Waypoints **/
var percentage = 0;

    function increaseBar() {
    	if (percentage >= 0 && percentage < 10) {
			$('.percentagebar div').fadeTo(0, 0).waypoint(function()
			{

				$(".percentagebar div").removeClass();
				$(this).fadeTo(1000,1).addClass("expand percent0");
			},
			{
				offset: '100%',
				triggerOnce: true
			});
		}
		if (percentage >= 10 && percentage < 20) {
			$('.percentagebar div').fadeTo(0, 0).waypoint(function()
			{

				$(".percentagebar div").removeClass();
				$(this).fadeTo(1000,1).addClass("expand percent10");
			},
			{
				offset: '100%',
				triggerOnce: true
			});
		}
		if (percentage >= 20 && percentage < 30) {
			$('.percentagebar div').fadeTo(0, 0).waypoint(function()
			{

				$(".percentagebar div").removeClass();
				$(this).fadeTo(1000,1).addClass("expand percent20");
			},
			{
				offset: '100%',
				triggerOnce: true
			});
		}
		if (percentage >= 30 && percentage < 40) {
			$('.percentagebar div').fadeTo(0, 0).waypoint(function()
			{

				$(".percentagebar div").removeClass();
				$(this).fadeTo(1000,1).addClass("expand percent30");
			},
			{
				offset: '100%',
				triggerOnce: true
			});
		}
		else if (percentage >= 40 && percentage < 50) {
			$('.percentagebar div').fadeTo(0, 0).waypoint(function()
			{

				$(".percentagebar div").removeClass();
				$(this).fadeTo(1000,1).addClass("expand percent40");
			},
			{
				offset: '100%',
				triggerOnce: true
			});
		}
		else if (percentage >= 50 && percentage < 60) {
			$('.percentagebar div').fadeTo(0, 0).waypoint(function()
			{

				$(".percentagebar div").removeClass();
				$(this).fadeTo(1000,1).addClass("expand percent50");
			},
			{
				offset: '100%',
				triggerOnce: true
			});
		}
		else if (percentage >= 60 && percentage < 70) {
			$('.percentagebar div').fadeTo(0, 0).waypoint(function()
			{

				$(".percentagebar div").removeClass();
				$(this).fadeTo(1000,1).addClass("expand percent60");
			},
			{
				offset: '100%',
				triggerOnce: true
			});
		}
		if (percentage >= 70 && percentage < 80) {
			$('.percentagebar div').fadeTo(0, 0).waypoint(function()
			{

				$(".percentagebar div").removeClass();
				$(this).fadeTo(1000,1).addClass("expand percent70");
			},
			{
				offset: '100%',
				triggerOnce: true
			});
		}
		if (percentage >= 80 && percentage < 90) {
			$('.percentagebar div').fadeTo(0, 0).waypoint(function()
			{

				$(".percentagebar div").removeClass();
				$(this).fadeTo(1000,1).addClass("expand percent80");
			},
			{
				offset: '100%',
				triggerOnce: true
			});
		}
		if (percentage >= 90 && percentage < 100) {
			$('.percentagebar div').fadeTo(0, 0).waypoint(function()
			{

				$(".percentagebar div").removeClass();
				$(this).fadeTo(1000,1).addClass("expand percent90");
			},
			{
				offset: '100%',
				triggerOnce: true
			});
		}
		if (percentage == 100) {
			$('.percentagebar div').fadeTo(0, 0).waypoint(function()
			{

				$(".percentagebar div").removeClass();
				$(this).fadeTo(1000,1).addClass("expand percent100");
			},
			{
				offset: '100%',
				triggerOnce: true
			});
		}
  }
$(document).ready(function() {

  // get box count
  var count = 0;
  var checked = 0;
  function countBoxes() { 
  	count = $("input[type='checkbox']").length;
  	console.log(count);
  }
  
  countBoxes();
  $(":checkbox").click(countBoxes);
  
  // count checks
  
  function countChecked() {
  	checked = $("input:checked").length;

  	percentage = parseInt(((checked / count) * 100),10);
  	increaseBar();
  }
  countChecked();
  $(":checkbox").click(countChecked);
});

$(document).ready(function(){
	
	$(function(){
		
		$('.overlaycontent, .main, .footer').fadeTo(0, 0).waypoint(function()
		{
			$(this).fadeTo(1000,1).addClass("animated fadeInUp");
		},
		{
			offset: '100%',
			triggerOnce: true
		});
		
	});

	increaseBar();
});



/** Countdown Timer **/

$(document).ready(function(){
	$("#countdown").countdown({
		date: "12 june 2015 12:00:00", /** Enter new date here **/
		format: "on"
	},
	function() {
		// callback function
	});
});

/** Scroll **/

$(function() {
	$('#footerright a#backtotop').bind('click',function(event){
		var $anchor = $(this);
		$('html, body').stop().animate({
			scrollTop: $($anchor.attr('href')).offset().top
		}, 750,'easeInOutExpo');
		event.preventDefault();
	});
});

