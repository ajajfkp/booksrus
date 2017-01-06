$( document ).ready(function(){
	var currentIndex = 0,
	items = $('.main-slider li');
	itemAmt = items.length;

	function cycleItems() {
		var item = $('.main-slider li').eq(currentIndex);
		items.hide('slide');
		item.css('display','inline-block');
	}

	autoSlide = setInterval(function() {
		currentIndex += 1;
		if (currentIndex > itemAmt - 1) {
			currentIndex = 0;
		}
		//cycleItems();
	}, 3000);

});

