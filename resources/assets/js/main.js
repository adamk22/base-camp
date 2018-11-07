import $ from 'jquery';
import Vue from 'vue';
import Example from './components/Example';

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';

new Vue({
	el: '#app',
	components: {
		Example
	}
});
// TODO: add jquery as cdn?
/** Populate Router instance with DOM routes */
const routes = new Router({
	// All pages
	common,
	// Home page
	home,
	// About Us page, note the change from about-us to aboutUs.
	aboutUs
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
