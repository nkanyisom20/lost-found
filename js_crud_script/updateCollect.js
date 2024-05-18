$(document).ready(function(){
	$('.update_collect').click(function(e){
	   e.preventDefault();
	   var empid = $(this).attr('data-emp-id');
	   var parent = $(this).parent("td").parent("tr");
	   bootbox.dialog({
			message: "Do you want to Collect ?",
			title: "<i class='glyphicon glyphicon-ok-sign'></i> Collecting",
			buttons: {
				success: {
					  label: "<i class='glyphicon glyphicon-remove-sign'></i>Not Yet",
					  className: "btn-default",
					  callback: function() {
					  $('.bootbox').modal('hide');
				  }
				},
				danger: {
				  label: "<i class='glyphicon glyphicon-ok-sign'></i>Collecting",
				  className: "btn-success",
				  callback: function() {
				   $.ajax({
						type: 'POST',
						url: 'include_lf/updateCollect.php',
						data: 'empid='+empid
				   })
				   .done(function(response){
						bootbox.alert(response);
						parent.fadeOut('slow');
				   })
				   .fail(function(){
						bootbox.alert('Error....something went wrong');
				   })
				  }
				}
			}
	   });
	});
 });
