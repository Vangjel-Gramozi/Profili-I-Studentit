$(document).ready(function() {
	var startCount = 0;
	var userCount = 3;
	$("#trego_perdorues").click(function(){
		$.ajax({
			url:"load_perdorues.php",
			method:"POST",
			data: {
				startCount : startCount,
				userCount : userCount
			},
			dataType: "JSON",
			success: function(data){
						// shto stilizime ketu
						if (data.error) return;
						
						// console.log(data);
						// merr cdo perdorues si objekt
						krijoForme(data);
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
	});

	$( "#trego_perdorues" ).trigger( "click" );



// pjesa e search
$("#search").submit(function(event){
	event.preventDefault();
	search();
		// alert(search_field);
	});
});


function search(){
	var search_field = $("#search_field").val();
	var search_submit = $("#search_submit").val();
	var search_results = $("#search_results").text();
	var search_column = $("#search_column").val();
		// console.log(search_field);
		// console.log(search_submit);
		// console.log(search_results);

		// $("#search_results").load("search.php", 
		//                        {
		//                        		search_field : search_field,
		//                        		search_submit : search_submit,
		//                        },
		//                        function(data,status){
		//                        		console.log(data);
		//                        		console.log(status);
		//                        });

		$.ajax({
			url : "../includes/search.php",
			method:"POST",
			data: {
				search_table : "perdorues",
				search_field : search_field,
				search_column : search_column,
				search_submit : search_submit,
			},
			dataType: "json",
			success : function (data,status){
				if (status != 'success') {
					alert("Error ne kerkeim");
				} else {

					console.log(data);
		 		// console.log(status);
		 		$("#search_results").text(((data.length > 0) ? data.length + " rezultate kerkimi" : data.error + " " + search_field ));
		 		if (data.error) return;


		 		$("#perdoruesit").children().remove();
		 		$("#trego_perdorues").remove();

									// $("#search").click(function(){
										$("#kthehu_mbrapa").removeClass('hidden');
									// });
									$('#kthehu_mbrapa').click(function() {
										location.reload();
									});
									krijoForme(data);
								}
							}
						});
}


function krijoForme (data){
	data.forEach(function(d){

		if (typeof d.statusi === 'object') {
			var st = " ";
		} else {
			var st = d.statusi;
		}
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
							// console.log(d);

													$("#perdoruesit").append(
													                         "<div class = 'row rrjesht' id='perdoruesi"+d.id+"'>" +
													                        
													                         "<div class = 'col kolone'id='perdoruesi_id"+d.id+"'>" + d.id + "</div>" + 
													                         "<div class = 'col kolone'id='perdoruesi_emer"+d.id+"'>" + d.emer + "</div>" + 
													                         "<div class = 'col kolone'id='perdoruesi_atesia"+d.id+"'>" + d.atesia + "</div>" + 
													                         "<div class = 'col kolone'id='perdoruesi_mbiemer"+d.id+"'>" + d.mbiemer + "</div>" + 
													                         "<div class = 'col kolone'id='perdoruesi_gjini"+d.id+"'>" + d.gjini + "</div>" + 
													                         "<div class = 'col kolone'id='perdoruesi_datelindje"+d.id+"'>" + d.datelindje + "</div>" + 
													                         "<div class = 'col kolone'id='perdoruesi_rol_id"+d.id+"'>" + d.rol_id + "</div>" + 	
													                         // "<div class = 'col kolone'id='perdoruesi_statusi"+d.id+"'>" + st + "</div>" + 
													                         "<div class = 'col-3 kolone email' id='perdoruesi_email"+d.id+"'>" + d.email + "</div>" +
													                         
													                         "<div class = 'col kolone '>" + "<span class='eqw' id='edit"+d.id+"'><i class='btn fas fa-pen '></i></span>" + 
													                         "<span class='' id='delete"+d.id+"'>"+
													                         "<form id='form_id_delete"+ d.id +"' method = 'POST' action = 'delete_perdorues.php'>" +
													                         "<input class='fas fa-trash btn' type='submit' name='submit' value='&#xf1f8'>" +
													                         "</form>"+
													                         "</span>" + "</div>" + 
								                     		// "<input  type='text' value = '" + d.emer + "'>" +
								                     		"</div>" + 
								                 //inputet per tu ber edit
								                 // hidden ne fillim
								                 "<div class = 'row rrjesht hidden' >" +
								                 "<form id='form_id"+ d.id +"' method = 'POST' action = 'edit_perdorues.php'>" +
								                 "<div class='row'>" +
								                 "<div class='col'>" +
								                 "<label for='emri'>Emer</label>" +
								                 "<input type='text' class='form-control' name = 'emri' value= " + d.emer + ">" +
								                 "</div>" + 
								                 "<div class='col'>" +
								                 "<label for='atesia'>Atesia</label>" +
								                 "<input type='text' class='form-control' name = 'atesia' value= " + d.atesia + ">" +
								                 "</div>" + 
								                 "<div class='col'>" +
								                 "<label for='mbiemri'>Mbiemer</label>" +
								                 "<input type='text' class='form-control' name = 'mbiemri' value=" + d.mbiemer + ">" +
								                 "</div>" + 
									                     // "<div class='col'>" + 	
									                     //   		gjinia +
									                     // "</div>" + 
									                     "<div class='col'>" +
									                     "<label for='datelindja'>Datelindja</label>" +
									                     "<input type='date' name='datelindja' class='form-control' value=" +d.datelindje +">" +
									                     "</div>" + 
									                     "<div class='col'>" +
									                     "<label for='email'>Email</label>" +
									                     "<input type='text' class='form-control' name = 'email' value=" + d.email + ">" +
									                     "</div>" + 
									                   // "<input type='button' name='delete' id='delete_id"+ d.id +"' value='delete' class='hidden'>" +
									                   "<input type='submit' name='submit' id='input_id"+ d.id +"' class='edit_perdorues btn fas fa-save' value='&#xf0c7'>" +
									                   "</div>" +
									                   "</form>" +
									                   "<div class = 'message col kolone'></div>" +
									                   "</div>"
							                     ); //end append
							var form = '#form_id'+ d.id;	// selector per formen
							var edit = '#edit'+ d.id;		// selector per edit
							var delete_span = '#delete'+ d.id;		// selector per delete
							var perdoruesi = '#perdoruesi' +d.id;
							var perdoruesi_emer = '#perdoruesi_emer' +d.id;
							var perdoruesi_mbiemer = '#perdoruesi_mbiemer' +d.id;
							var perdoruesi_atesia = '#perdoruesi_atesia' +d.id;
							var perdoruesi_datelindje = '#perdoruesi_datelindje' +d.id;
							var perdoruesi_rol_id = '#perdoruesi_rol_id' +d.id;
							var perdoruesi_email = '#perdoruesi_email' +d.id;
							var form_delete = '#form_id_delete'+ d.id;	// selector per formen_delete


							$(perdoruesi_rol_id).load("trego_rol.php", {
								rol_id : d.rol_id
							});							
							// $(perdoruesi).on('mouseenter', function () {
							// 	$(this).find("span").removeClass('hidden');;
							// }).on('mouseleave', function () {
							// 	$(this).find("span").addClass('hidden');
							// });

							$(edit).click(function(){
								$(form).parent().toggleClass("hidden");
							});

							$(form_delete).submit(function(event){
								event.preventDefault();
								if(!confirm('Perdoruesit do fshihet.I sigurt qe doni te vazhdoni ?')){
									return false;
								} else {
									var id = d.id;
									var submit = $(form_delete + ' input[name="submit"]').val();
									console.log(submit);
									// $(form).next('.message').load("delete_perdorues.php", {
										$('#p_message').load("delete_perdorues.php", {
											id: id,
											submit: submit
										}, function(data,status){
											// console.log(data);
											// console.log(status);
											if (status == 'success') {
												if (data == 'Perdoruesi u fshi') {
													setTimeout(function() {
														$(perdoruesi).remove();
													}, 2000); 
												} 
												setTimeout(function() {
													$('#p_message').text('');
												}, 2000); 
											}
										});
									}
								});
							$(form).submit(function(event){
								event.preventDefault();
								if(!confirm('Perdoruesit do t\'i ndryshojne te dhenat sipas formes.I sigurt qe doni te vazhdoni?')){
									return false;
								} else {
									var id = d.id;
									var emri = $(form + ' input[name="emri"]').val();
									var mbiemri = $(form + ' input[name="mbiemri"]').val();
									var email = $(form + ' input[name="email"]').val();
									var atesia = $(form + ' input[name="atesia"]').val();
									var gjinia = $(form + 'input[name="gjinia"]:checked').val();
									var datelindja = $(form + ' input[name="datelindja"]').val();
									var submit = $(form + ' input[name="submit"]').val();
								// console.log(submit);
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
								}, function(data,status){
									if (status) {
										if (data.indexOf("Te dhenat u perditesuan") >=0) {
											$(perdoruesi).children(perdoruesi_emer).text(emri);
											$(perdoruesi).children(perdoruesi_mbiemer).text(mbiemri);
											$(perdoruesi).children(perdoruesi_atesia).text(atesia);
											$(perdoruesi).children(perdoruesi_datelindje).text(datelindja);
											$(perdoruesi).children(perdoruesi_email).text(email);
											setTimeout(function() {
												$(form).parent().toggleClass("hidden");
											}, 3000); 
										}
									}
								});
								// nese merr msg ok ndrysho te dhenat 
								// alert($(form).next(".message").html());
								setTimeout(function() {
									$(form).next('.message').text('');
								}, 5000); 
							}
						});
							// end for each d
						});
}