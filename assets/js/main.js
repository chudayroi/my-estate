$(function () {
    $('ul.nav li.dropdown').hover(function(){
    	$(this).addClass('open1');
    	$('.dropdown-menu', this).fadeIn();
    }, function(){
    	$(this).removeClass('open1');
    	$('.dropdown-menu', this).fadeOut('fast');
    });

    
});
$(function () {
    $('tienich-nav li.dropdown').hover(function(){
    	$(this).addClass('open1');
    	$('.dropdown-menu', this).fadeIn();
    }, function(){
    	$(this).removeClass('open1');
    	$('.dropdown-menu', this).fadeOut('slow');
    });

    
});
//date
$("#datepicker_finish").datepicker();
$('#datepicker_start').datepicker();
//End date
$(function () {
  $('[data-toggle="tooltip"]').tooltip('')
})