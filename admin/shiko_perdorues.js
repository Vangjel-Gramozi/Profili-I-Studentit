	$(document).ready(function() {
				// $startCount = 0; 
		// $userCount = 1;
				// var startCount = <?php //echo $startCount; ?>;
		// var userCount = <?php //echo $userCount; ?>;
		var startCount = 0;
		var userCount = 2;
		$("#trego_perdorues").click(function(){
				// link to file, data,callback
				// count = count + 2;
				$.ajax({
					url:"load_perdorues.php",
					method:"POST",
					data: {
						// mund te kaloj dhe kolonen me te cilen do te bej sort
						startCount : startCount,
						userCount : userCount
					},
					dataType: "JSON",
					success: function(data){
						// shto stilizime ketu
						if (data.error) {
							return;
						}
						console.log(data);
						data.forEach(function(d){
							console.log(d.emer);
							$("#perdoruesit").append(
		                 "<div class = 'row rrjesht' >" +
		                      "<div class = 'col kolone'>" + d.id + "</div>" + 
		                      "<div class = 'col kolone'>" + d.emer + "</div>" + 
		                      "<div class = 'col kolone'>" + d.atesia + "</div>" + 
		                      "<div class = 'col kolone'>" + d.mbiemer + "</div>" + 
		                      "<div class = 'col kolone'>" + d.gjini + "</div>" + 
		                      "<div class = 'col kolone'>" + d.datelindje + "</div>" + 
		                      "<div class = 'col kolone'>" + d.rol_id + "</div>" + 
		                      "<div class = 'col kolone'>" + d.statusi + "</div>" + 
		                      "<div class = 'col kolone email'>" + d.email + "<span> <a href='#'>edit</a></span> <span><a href='#'>delete</a></span>" + "</div>" + 
		                     		// "<input  type='text' value = '" + d.emer + "'>" +
		                 "</div>" + 
		                 //inputet per tu ber edit
		                 // hidden ne fillim
		                 "<div class = 'row rrjesht' >" +
			                "<form id='form_id"+ d.id +"' method = 'POST' action = 'edit_perdorues.php'>" +
			                   "<div class='row'>" +
			                     "<div class='col'>" +
			                       "<input type='text' class='form-control' name = 'emri' value= " + d.emer + ">" +
			                     "</div>" + 
			                     "<div class='col'>" +
			                       "<input type='text' class='form-control' name = 'mbiemri' value=" + d.mbiemer + ">" +
			                     "</div>" + 
			                   "<input type='submit' name='submit' id='input_id"+ d.id +"' class='edit_perdorues btn btn-primary' value='Ruaj'>" +
			                   "</div>" +
			                 "</form>" +
			                 "<div class = 'message'>here</div>" +
		                 "</div>"
	                     );	//end append

							var form = '#form_id'+ d.id;	// selector per formen
							$(form).submit(function(event){
								event.preventDefault();
								// console.log($(form + ' input[name="emri"]').val());
								var emri = $(form + ' input[name="emri"]').val();
								var mbiemri = $(form + ' input[name="mbiemri"]').val();
								var submit = $(form + ' input[name="submit"]').val();
								// console.log(submit);

								// $(this).next('.message').load("edit_perdorues.php", {
								// 	emri: emri,
								// 	mbiemri: mbiemri,
								// 	submit: submit
								// });
								$.ajax({
									url:"edit_perdorues.php",
									method:"POST",
									data: {
											emri: emri,
											mbiemri: mbiemri,
											submit: submit
									},
									dataType: "JSON",
									success: function(data){
										console.log(data.error);
										if (data.error) {
											 $(form).next('.message').text(data.error);
										setTimeout(function() {
										    $(form).next('.message').text('');
										}, 2500); 
										} else {
											// data qe te kthen pasi perfundon me sukses query update
										}
									}
								});
							});


							// end for each d
						});
						// $.each(data,function (d){
						// 	console.log(d);
						// });

						// });
						// $("#perdoruesit").append(data.emer);
						if (!data.error) {
							startCount = startCount + userCount; //1 //2 
						}
					}
				});
				// $("#perdoruesit").load("load_perdorues.php", {
				// 	newcount : count
				// });
			});

		   $( "#trego_perdorues" ).trigger( "click" );
		   // $(".edit_perdorues").click(function(event) {
		   //   //Select the parent form and submit
		   //   event.preventDefault();
		   //   console.log(event);
		   //   $(this).parent().submit( function(event){
		   //   	event.preventDefault();
		   //   });
		   // });
		   // $("form").submit(function(event){
					// event.preventDefault();
					// // var emri = $("#emri").val();
					// // var mbiemri = $("#mbiemri").val();
					// // $.load("edit_perdorues.php", {
					// // 	emri: emri,
					// // 	mbiemri: mbiemri,
					// // 	submit: submit
					// // });
		   // });
});

		   // var submits = $('.edit_perdorues');
		   // // $(submits).parent();
		   // $(submits).click(function(event){ 
		   // 	event.preventDefault(); 	
		   // 	alert("HI");
		   // });
		   // $(".edit_perdorues").click(function(event) {
		   //   //Select the parent form and submit
		   //   event.preventDefault();
		   //   console.log(event);
		   //   $(this).parent().submit( function(event){
		   //   	event.preventDefault();
		   //   });
		   // });