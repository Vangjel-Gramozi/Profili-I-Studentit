$(document).ready(function() {
	var startCount = 0;
	var count = 2;
	$("#trego_lende").click(function(){
		// alert("smth");
		$.ajax({
			url:"load_lende.php",
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
						// $("#lendet").append(data.emer);
						if (!data.error) {
							startCount = startCount + count; //1 //2 
						}
					}
				});
	});

	$( "#trego_lende" ).trigger( "click" );



// pjesa e search
// $("#search").submit(function(event){
// 	event.preventDefault();
// 	var search_field = $("#search_field").val();
// 	var search_submit = $("#search_submit").val();
// 	var search_results = $("#search_results").text();
// 	var search_column = $("#search_column").val();
// 		// console.log(search_field);
// 		// console.log(search_submit);
// 		// console.log(search_results);

// 		// $("#search_results").load("search.php", 
// 		//                        {
// 		//                        		search_field : search_field,
// 		//                        		search_submit : search_submit,
// 		//                        },
// 		//                        function(data,status){
// 		//                        		console.log(data);
// 		//                        		console.log(status);
// 		//                        });

// 		$.ajax({
// 			url : "search.php",
// 			method:"POST",
// 			data: {
// 				search_field : search_field,
// 				search_submit : search_submit,
// 				search_column : search_column 
// 			},
// 			dataType: "json",
// 			success : function (data,status){
// 				if (status != 'success') {
// 					alert("Error ne kerkeim");
// 				} else {

// 					console.log(data);
// 		 		// console.log(status);
// 		 		$("#search_results").text(((data.length > 0) ? data.length + " rezultate kerkimi" : data.error + " " + search_field ));
// 		 		if (data.error) return;


// 		 		$("#lendet").children().remove();
// 		 		$("#trego_perdorues").remove();

// 									// $("#search").click(function(){
// 										$("#kthehu_mbrapa").removeClass('hidden');
// 									// });

// 									$('#kthehu_mbrapa').click(function() {
// 										location.reload();
// 									});
// 									krijoForme(data);
// 								}
// 							}
// 						});
// 		// alert(search_field);
// 	});
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


							$("#lendet").append(
							                         "<div class = 'row rrjesht' id='lende"+d.id_lenda+"'>" +
							                         "<div class = 'col kolone'>" + "<span class='hidden' id='edit"+d.id_lenda+"'>edit</span>" + 
							                         "<span class='hidden' id='delete"+d.id_lenda+"'>"+
							                         "<form id='form_id_delete"+ d.id_lenda +"' method = 'POST' action = 'delete_lende.php'>" +
							                         "<input type='submit' name='submit' value='delete'>" +
							                         "</form>"+
							                         "</span>" + "</div>" + 

							                         "<div class = 'col kolone'id='lende_id"+d.id_lenda+"'>" + d.id_lenda + "</div>" + 
							                         "<div class = 'col kolone'id='lende_emer"+d.id_lenda+"'>" + d.emer + "</div>" + 
							                         "<div class = 'col kolone'id='lende_kredite"+d.id_lenda+"'>" + d.kredite + "</div>" + 
							                         "<div class = 'col kolone'id='lende_dega"+d.id_lenda+"'>" + d.id_dega + "</div>" + 
							                         "<div class = 'col kolone'id='lende_ore_totale"+d.id_lenda+"'>" + d.ore_totale + "</div>" + 
							                         "<div class = 'col kolone'id='lende_viti_i_lendes"+d.id_lenda+"'>" + d.viti_i_lendes + "</div>" + 	
							                         "<div class = 'col kolone'id='lende_me_zgjedhje"+d.id_lenda+"'>" + zgj + "</div>" + 
							                         // "<div class = 'col kolone viti_i_lendes' id='lende_viti_i_lendes"+d.id_lenda+"'>" + d.viti_i_lendes + "</div>" +
		                     		// "<input  type='text' value = '" + d.emer + "'>" +
		                     		"</div>" + 
		                 //inputet per tu ber edit
		                 // hidden ne fillim
		                 "<div class = 'row rrjesht hidden' >" +
		                 "<form id='form_id"+ d.id_lenda +"' method = 'POST' action = 'edit_lende.php'>" +
			                 "<div class='row'>" +
			                 "<div class='col'>" +
			                 "<label for='emer'>Emri i Lendes</label>" +
			                 "<input type='text' class='form-control' name = 'emer' value= " + d.emer + ">" +
			                 "</div>" + 
			                 "<div class='col'>" +
			                 "<label for='kredite'>Kredite</label>" +
			                 "<input type='number' class='form-control' min = '1' name = 'kredite' value=" + d.kredite + ">" +
			                 "</div>" + 
		                     "<div class='col'>" +
		                     "<label for='ore_totale'>Ore Totale</label>" +
		                     "<input type='number' name='ore_totale' min='10' class='form-control' value=" +d.ore_totale +">" +
		                     "</div>" + 
		                     "<div class='col'>" +
		                     "<label for='viti_i_lendes'>Viti i Lendes</label>" +
		                     "<input type='number' class='form-control' min='1' max='3' step='1' name = 'viti_i_lendes' value=" + d.viti_i_lendes + ">" +
		                     "</div>" +			                    	
		                   "<input type='submit' name='submit' id='input_id"+ d.id_lenda +"' class='edit_perdorues btn btn-primary' value='ruaj'>" +
		                   "</div>" +
	                   "</form>" +
	                   "<div class = 'message'></div>" +
	                   "</div>"
	                     );	//end append
							

							var form = '#form_id'+ d.id_lenda;	// selector per formen
							var edit = '#edit'+ d.id_lenda;		// selector per edit
							var delete_span = '#delete'+ d.id_lenda;		// selector per delete
							var lende = '#lende' +d.id_lenda;
							var lende_emer = '#lende_emer' +d.id_lenda;
							var lende_kredite = '#lende_kredite' +d.id_lenda;
							var lende_dega = '#lende_dega' +d.id_lenda;
							var lende_ore_totale = '#lende_ore_totale' +d.id_lenda;
							var lende_viti_i_lendes = '#lende_viti_i_lendes' +d.id_lenda;
							var lende_me_zgjedhje = '#lende_me_zgjedhje' +d.id_lenda;

							// var delete_id = '#delete_id'+ d.id_lenda;
							var form_delete = '#form_id_delete'+ d.id_lenda;	// selector per formen_delete
							$(lende_dega).load("trego_dege.php", {
								dega : d.id_dega
							});
							// $(form + '  select').load("load_deget.php");

							$(lende).on('mouseenter', function () {
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
							// 	// 	id: d.id_lenda
							// 	// });

							// });

							$(form_delete).submit(function(event){
								event.preventDefault();
								if(!confirm('lendet do fshihet.I sigurt qe doni te vazhdoni ?')){
									return false;
								} else {
									var id = d.id_lenda;
									var submit = $(form_delete + ' input[name="submit"]').val();
									console.log(submit);

									// $(form).next('.message').load("delete_perdorues.php", {
										$(lende).load("delete_lende.php", {
											id: id,
											submit: submit
										}, function(data, status){
											if (status == 'success' && data == 'Lenda u fshi') {
												setTimeout(function() {
													$(lende).remove();
												}, 2000); 
											}
										});
									}
								});

							// per edit
							$(form).submit(function(event){
								event.preventDefault();
								if(!confirm('Lendes do t\'i ndryshojne te dhenat sipas formes.I sigurt qe doni te vazhdoni ?')){
									return false;
								} else {

									var id = d.id_lenda;
									var emer = $(form + ' input[name="emer"]').val();
									var kredite = $(form + ' input[name="kredite"]').val();
									var ore_totale = $(form + ' input[name="ore_totale"]').val();
									var viti_i_lendes = $(form + ' input[name="viti_i_lendes"]').val();
									// var dega = $(form + ' select').val();
									// var me_zgjedhje = $(form + 'input[name="me_zgjedhje"]').val();
									var submit = $(form + ' input[name="submit"]').val();
									// console.log(dega);

								$(this).next('.message').load("edit_lende.php", {
									id: id,
									emer: emer,
									kredite: kredite,
									// dega: dega,
									ore_totale: ore_totale,
									viti_i_lendes: viti_i_lendes,
									// me_zgjedhje : me_zgjedhje,
									id_dega : d.id_dega,
									submit: submit
								}, function(data,status){
									if (status) {
										if (data.indexOf("Te dhenat u perditesuan") >=0) {
											$(lende).children(lende_emer).text(emer);
											$(lende).children(lende_kredite).text(kredite);
											// $(lende).children(lende_dega).text(dega);
											$(lende).children(lende_ore_totale).text(ore_totale);
											$(lende).children(lende_viti_i_lendes).text(viti_i_lendes);
											// $(lende).children(lende_me_zgjedhje).text(me_zgjedhje);
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