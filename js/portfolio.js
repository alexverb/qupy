$(document).ready(function() {	$(".block a").hover(function() {		$(this).animate({			'width':'400px',			'height':'250px',			'top':'-30px',			'left':'-50px'		}, 200);	},function() {		$(this).animate({			'width':'300px',			'height':'190px',			'top':'0',			'left':'0'		}, 200);	});});