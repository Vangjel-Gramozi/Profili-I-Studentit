$(document).ready(function() {
	var startCount = 0;
	var count = 2;
	$("#trego_grupe").click(function(){
		// alert("smth");
		$.ajax({
			url:"load_grupe.php",
			method:"POST",
			data: {
				startCount : startCount,
				count : count
			},
			dataType: "JSON",
			success: function(data){
						// shto stilizime ketu
						if (data.error) return;
						
						console.log(data);
						// merr cdo perdorues si objekt
						krijoForme(data);
						// $.each(data,function (d){
						// 	console.log(d);
						// });

						// });
						// $("#grupt").append(data.emer);
						if (!data.error) {
							startCount = startCount + count; //1 //2 
						}
					}
				});
	});

	$( "#trego_grupe" ).trigger( "click" );



// pjesa e search
$("#search").submit(function(event){
	event.preventDefault();
	var search_field = $("#search_field").val();
	var search_submit = $("#search_submit").val();
	var search_results = $("#search_results").text();
	var search_column = $("#search_column").val();

		$.ajax({
			url : "../includes/search.php",
			method:"POST",
			data: {
				search_table : "grupi",
				search_field : search_field,
				search_submit : search_submit,
				search_column : search_column 
			},
			dataType: "json",
			success : function (data,status){
				if (status != 'success') {
					alert("Error ne kerkeim");
				} else {

					console.log(data);
		 		$("#search_results").text(((data.length > 0) ? data.length + " rezultate kerkimi" : data.error + " " + search_field ));
		 		if (data.error) return;


		 		$("#grupet").children().remove();
		 		$("#trego_grupe").remove();
				$("#kthehu_mbrapa").removeClass('hidden');
									

									$('#kthehu_mbrapa').click(function() {
										location.reload();
									});
									krijoForme(data);
								}
							}
						});
		// alert(search_field);
	});
});


function krijoForme (data){
	data.forEach(function(d){
							// console.log(typeof d.me_zgjedhje === 'object');
							// console.log(parseInt(d.me_zgjedhje));
							// console.log(d.me_zgjedhje);
							// console.log(Number.isNaN(d.me_zgjedhje));
							// var zgj = " ";
							if (typeof d.me_zgjedhje === 'object') {
								var zgj = " ";
							} else {
								var zgj = d.me_zgjedhje;
							}


							$("#grupet").append(
							                         "<div class = 'row rrjesht' id='grup"+d.id_grupi+"'>" +
							                         "<div class = 'col kolone'>" + "<span class='hidden' id='edit"+d.id_grupi+"'>edit</span>" + 
							                         "<span class='hidden' id='delete"+d.id_grupi+"'>"+
							                         "<form id='form_id_delete"+ d.id_grupi +"' method = 'POST' action = 'delete_grupe.php'>" +
							                         "<input type='submit' name='submit' value='delete'>" +
							                         "</form>"+
							                         "</span>" + "</div>" + 

							                         "<div class = 'col kolone'id='grup_id"+d.id_grupi+"'>" + d.id_grupi + "</div>" + 
							                         "<div class = 'col kolone'id='grup_emer"+d.id_grupi+"'>" + d.emer_grupi + "</div>" + 
							                         "<div class = 'col kolone'id='grup_dega"+d.id_grupi+"'>" + d.id_dega + "</div>" + 
							                         "<div class = 'col kolone'id='grup_viti"+d.id_grupi+"'>" + d.viti + "</div>" + 	
							                         // "<div class = 'col kolone viti' id='grup_viti"+d.id_grupi+"'>" + d.viti + "</div>" +
		                     		// "<input  type='text' value = '" + d.emer_grupi + "'>" +
		                     		"</div>" + 
		                 //inputet per tu ber edit
		                 // hidden ne fillim
		                 "<div class = 'row rrjesht hidden' >" +
		                 "<form id='form_id"+ d.id_grupi +"' method = 'POST' action = 'edit_grupee.php'>" +
			                 "<div class='row'>" +
			                 "<div class='col'>" +
			                 "<label for='emer'>Emri i grupit</label>" +
			                 "<input type='text' class='form-control' name = 'emer' value= " + d.emer_grupi + ">" +
			                 "</div>" + 
		                     "<div class='col'>" +
		                     "<label for='viti'>Viti i grupit</label>" +
		                     "<input type='number' class='form-control' min='1' max='3' step='1' name = 'viti' value=" + d.viti + ">" +
		                     "</div>" +			                    	
		                   "<input type='submit' name='submit' id='input_id"+ d.id_grupi +"' class='edit_perdorues btn btn-primary' value='ruaj'>" +
		                   "</div>" +
	                   "</form>" +
	                   "<div class = 'message'></div>" +
	                   "</div>"
	                     );	//end append
							

							var form = '#form_id'+ d.id_grupi;	// selector per formen
							var edit = '#edit'+ d.id_grupi;		// selector per edit
							var delete_span = '#delete'+ d.id_grupi;		// selector per delete
							var grup = '#grup' +d.id_grupi;
							var grup_emer = '#grup_emer' +d.id_grupi;
							var grup_dega = '#grup_dega' +d.id_grupi;
							var grup_viti = '#grup_viti' +d.id_grupi;

							// var delete_id = '#delete_id'+ d.id_grupi;
							var form_delete = '#form_id_delete'+ d.id_grupi;	// selector per formen_delete
							$(grup_dega).load("../includes/trego_dege.php", {
								dega : d.id_dega
							});
							// $(form + '  select').load("load_deget.php");

							$(grup).on('mouseenter', function () {
								$(this).find("span").removeClass('hidden');;
							}).on('mouseleave', function () {
								$(this).find("span").addClass('hidden');
							});

							$(edit).click(function(){
								$(form).parent().toggleClass("hidden");
							});

							// $(delete_span).click(function(){
							// 	// $(delete_id).trigger( "click" );
							// 	// $(form).next('.message').load("delete_perdorues.php", {
							// 	// 	id: d.id_grupi
							// 	// });

							// });

							$(form_delete).submit(function(event){
								event.preventDefault();
								if(!confirm('Grupi do fshihet.I sigurt qe doni te vazhdoni ?')){
									return false;
								} else {
									var id = d.id_grupi;
									var submit = $(form_delete + ' input[name="submit"]').val();

									// $(form).next('.message').load("delete_perdorues.php", {
										$(grup).load("delete_grup.php", {
											id: id,
											submit: submit
										}, function(data, status){
											if (status == 'success' && data == 'Grupi u fshi') {
												setTimeout(function() {
													$(grup).remove();
												}, 2000); 
											}
										});
									}
								});

							// per edit
							$(form).submit(function(event){
								event.preventDefault();
								if(!confirm('Grupit do t\'i ndryshojne te dhenat sipas formes.I sigurt qe doni te vazhdoni ?')){
									return false;
								} else {

									var id = d.id_grupi;
									var emer = $(form + ' input[name="emer"]').val();
									var viti = $(form + ' input[name="viti"]').val();
									// var dega = $(form + ' select').val();
									// var me_zgjedhje = $(form + 'input[name="me_zgjedhje"]').val();
									var submit = $(form + ' input[name="submit"]').val();
									// console.log(dega);

								$(this).next('.message').load("edit_grupe.php", {
									id: id,
									emer: emer,
									// dega: dega,
									viti: viti,
									// me_zgjedhje : me_zgjedhje,
									id_dega : d.id_dega,
									submit: submit
								}, function(data,status){
									if (status) {
										if (data.indexOf("Te dhenat u perditesuan") >=0) {
											$(grup).children(grup_emer).text(emer);
											// $(grup).children(grup_dega).text(dega);
											$(grup).children(grup_viti).text(viti);
											// $(grup).children(grup_me_zgjedhje).text(me_zgjedhje);
											// setTimeout(function() {
											// 	$(form).parent().toggleClass("hidden");
											// }, 3000); 
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