$(document).ready(function() {
	
	var pTag = $("#testimonial p");
	var hTag = $("#testimonial h2");
	console.log(hTag);

	hTag.toggle(function() {
		pTag.fadeIn("slow");
		// $(this).fadeOut("slow");
		console.log("Radi");
	}, function() {
		// $(this).fadeIn("slow");
		pTag.fadeOut("slow");
	});

	// hTag.hover(function() {
	// 	$(this).animate({
	// 		fontWeight: 400},
	// 		300);
	// }, function() {
	// 	$(this).animate({
	// 		fontWeight: 800},
	// 		300);
	// });
});