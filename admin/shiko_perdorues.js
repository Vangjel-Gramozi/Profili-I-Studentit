	$(document).ready(function() {
		var startCount = 0;
		var userCount = 2;
		$("#trego_perdorues").click(function(){
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
						if (data.error) return;
						
						// console.log(data);
						// merr cdo perdorues si opbjekt
						data.forEach(function(d){
							if (d.gjini == 'f') {
								var gjinia =  
	          						"<span>Gjinia:</span>" +
									"<input type='radio' name='gjinia' value='m'>" +
	         		                "<label for='m'>Mashkull</label>" +
			                       	"<input type='radio' name='gjinia' value='f' checked>" +
	         		                "<label for='f'>Femer</label>" ;
							} else {
								var gjinia =  
	          						"<span>Gjinia:</span>" +
									"<input type='radio' name='gjinia' value='m' checked>" +
	         		                "<label for='m'>Mashkull</label>" +
			                       	"<input type='radio' name='gjinia' value='f'>" +
	         		                "<label for='f'>Femer</label>" ;	
	         		        }
							console.log(d);
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
			                       "<input type='text' class='form-control' name = 'atesia' value= " + d.atesia + ">" +
			                     "</div>" + 
			                     "<div class='col'>" +
			                       "<input type='text' class='form-control' name = 'mbiemri' value=" + d.mbiemer + ">" +
			                     "</div>" + 
			                     // "<div class='col'>" + 	
			                     //   		gjinia +
			                     // "</div>" + 
			                     "<div class='col'>" +
			                     	"<input type='date' name='datelindja' class='form-control' value=" +d.datelindje +">" +
			                     "</div>" + 
			                     "<div class='col'>" +
			                       "<input type='text' class='form-control' name = 'email' value=" + d.email + ">" +
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
								var id = d.id;
								var emri = $(form + ' input[name="emri"]').val();
								var mbiemri = $(form + ' input[name="mbiemri"]').val();
								var email = $(form + ' input[name="email"]').val();
								var atesia = $(form + ' input[name="atesia"]').val();
								var gjinia = $(form + 'input[name="gjinia"]:checked').val();
								var datelindja = $(form + ' input[name="datelindja"]').val();
								var submit = $(form + ' input[name="submit"]').val();
								// console.log(emri);

								$(this).next('.message').load("edit_perdorues.php", {
									id: id,
									emri: emri,
									mbiemri: mbiemri,
									atesia: atesia,
									email: email,
									// gjinia: gjinia,
									datelindja: datelindja,
									// roli: d.rol_id,
									submit: submit
								});
								setTimeout(function() {
								    $(form).next('.message').text('');
								}, 5000); 


								// $.ajax({
								// 	url:"getDataTest.php",
								// 	method:"POST",
								// 	data: {
								// 			id: id,
								// 			emri: emri,
								// 			mbiemri: mbiemri,
								// 			atesia: atesia,
								// 			email: email,
								// 			gjinia: gjinia,
								// 			datelindja: datelindja,
								// 			submit: submit
								// 	},
								// 	dataType: "JSON",
								// 	// beforeSend: function(){
								// 	// 	$(form + ' input[name="submit"]').attr('disabled','disabled');
								// 	// },
								// 	success: function(data){
								// 		console.log(data);
								// 		if (data.error) {
								// 			$(form).next('.message').text(data.error);
								// 			setTimeout(function() {
								// 			    $(form).next('.message').text('');
								// 			}, 2500); 
								// 		} else {
								// 			// data qe te kthen pasi perfundon me sukses query update
								// 		console.log(data);

								// 		}
								// 	}
								// });
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
});

