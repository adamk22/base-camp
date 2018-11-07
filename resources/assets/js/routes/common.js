export default {
	init() {
		// JavaScript to be fired on all pages

		// Hide Page Loader when DOM and images are ready
		$(window).on('load', () => $('.pageloader').removeClass('is-active'));

		// Toggle mobile menu
		$('.navbar-burger').on('click', () => $('.navbar-burger, .navbar-menu').toggleClass('is-active'));
	},
	finalize() {
		// JavaScript to be fired on all pages, after page specific JS is fired
	}
};
