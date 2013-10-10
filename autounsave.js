jQuery(document).ready(function($) {
	var a='<a id="clearAuto" href="#" style="padding:0 20px;position: absolute;display: block;z-index: 9999;bottom:0;right:0;height: 30px;line-height: 30px;background-color: #f00;color: #ffffff;">claer</a>'
	jQuery('body').append(a)
	var data = {
		action: 'autounsave_action'   // We pass php values differently!
	};
	jQuery('#clearAuto').click(function(e){
		e.preventDefault()
	// We can also pass the url value separately from ajaxurl for front end AJAX implementations
	jQuery.ajax({
		url:ajaxurl,
		type:'post',
		data:data,
		success:function(d){
			console.log(d)
		}
	})		
		
	})

});