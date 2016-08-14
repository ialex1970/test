$(document).ready(function() {

console.log($('th a'));
  $('th.header').on("click", function(e) {
    //alert('click');
    //console.log('click');
    $(this).toggleClass("glyphicon-chevron-down", "glyphicon-chevron-up");
    //e.preventDefault();
  })
})
