$(document).ready(function() {	
	//Accordians
	$('.panel-group').collapse({
		toggle: false
	})	

/***** Tabs *****/
	//Normal Tabs - Positions are controlled by CSS classes
    $('#tab-1 a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});
	
	$('#tab-1 li:eq(0) a').tab('show'); 
  
    $('#tab-2 a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});
	
	$('#tab-2 li:eq(1) a').tab('show'); 
	  
	$('#tab-3 a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});
	
	$('#tab-3 li:eq(2) a').tab('show'); 
	  
	$('#tab-4 a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});
	
	$('#tab-4 li:eq(3) a').tab('show'); 
	
	$('#tab-5 a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});
	
	$('#tab-5 li:eq(4) a').tab('show'); 
	
	$('#tab-6 a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});
	
	$('#tab-6 li:eq(5) a').tab('show'); 
	
	$('#tab-7 a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});
	
	$('#tab-7 li:eq(6) a').tab('show'); 
	
	$('#tab-8 a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});
	
	$('#tab-8 li:eq(7) a').tab('show'); 
	
	$('#tab-9 a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});
	
	$('#tab-9 li:eq(8) a').tab('show'); 
	
	$('#tab-10 a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});
	
	$('#tab-10 li:eq(9) a').tab('show'); 
	  
	});