$(document).ready(function(){
	//function for contact form dropdown
	function contact() {
		if ($("#contactForm").is(":hidden")){
			$("#contactForm").slideDown("slow");
			$("#backgroundPopup").css({"opacity": "0.7"});
			$("#backgroundPopup").fadeIn("slow"); 
		}
		else{
			$("#contactForm").slideUp("slow");
			$("#backgroundPopup").fadeOut("slow");  
		}
	}
	 
	//run contact form when any contact link is clicked
	$(".contact").click(function(){contact()});
	
	/*animation for same page links #
	$('a[href*=#]').each(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
		&& location.hostname == this.hostname
		&& this.hash.replace(/#/,'') ) {
		  var $targetId = $(this.hash), $targetAnchor = $('[name=' + this.hash.slice(1) +']');
		  var $target = $targetId.length ? $targetId : $targetAnchor.length ? $targetAnchor : false;
			if ($(this.hash).length) {
				$(this).click(function(event) {
					var targetOffset = $(this.hash).offset().top;
					var target = this.hash;
					event.preventDefault();			   
					$('html, body').animate({scrollTop: targetOffset}, 500);
					return false;
				});
			}
		}
	});

*/

   //submission scripts
   
	//only need force for IE6  
	$("#backgroundPopup").css({  
		"height": document.documentElement.clientHeight 
	});  
});