$(document).ready(function(){
	$('.delete_student_no').click(function(e){
	   e.preventDefault();
	   var empid = $(this).attr('data-emp-id');
	   var parent = $(this).parent("td").parent("tr");
	   bootbox.dialog({
			message: "Are you sure you want to Delete ?",
			title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
			buttons: {
				success: {
					  label: "<i class='glyphicon glyphicon-remove-sign'></i> Nop",
					  className: "btn-default",
					  callback: function() {
					  $('.bootbox').modal('hide');
				  }
				},
				danger: {
				  label: "<i class='glyphicon glyphicon-trash'></i> Delete",
				  className: "btn-danger",
				  callback: function() {
				   $.ajax({
						type: 'POST',
						url: 'include_lf/deleteRecords.php',
						data: 'empid='+empid
				   })
				   .done(function(response){
						bootbox.alert(response);
						parent.fadeOut('slow');
				   })
				   .fail(function(){
						bootbox.alert('Error....');
				   })
				  }
				}
			}
	   });
	});
 });
