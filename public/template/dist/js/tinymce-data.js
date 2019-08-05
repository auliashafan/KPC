/*Tinymce Init*/

$(function() {
	"use strict";
	
	tinymce.init({
	  selector: '.tinymce',
	  height: 300,
	  plugins: [
		'advlist autolink lists link charmap print preview',
		'searchreplace visualblocks code fullscreen',
		'insertdatetime contextmenu paste code'
	  ],
	  toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link',
	 
	});
});
