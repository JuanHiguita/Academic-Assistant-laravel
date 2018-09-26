var particles = Particles.init({
	selector: '.background',
	color: ['#DA0463', '#404B69', '#DBEDF3'],
	connectParticles: true
});
jQuery(document).ready(function($){

  // Collapse Navbar
  var navbarCollapse = function() {
    if ($("#mainNav").offset().top > 40) {
      $("#mainNav").addClass("navbar-shrink");
    } else {
      $("#mainNav").removeClass("navbar-shrink");
    }
  };
  // Collapse now if page is not at top
  navbarCollapse();
  // Collapse the navbar when page is scrolled
  $(window).scroll(navbarCollapse);

});