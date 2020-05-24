$(document).ready(function() {
	var startCount = 0;
	var count = 2;
	$("#trego_dege").click(function(){
		// alert("smth");
		$.ajax({
			url:"load_dege.php",
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
						// $("#degat").append(data.emri);
						if (!data.error) {
							startCount = startCount + count; //1 //2 
						}
					}
				});
	});

	$( "#trego_dege" ).trigger( "click" );



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
				search_table : "dega",
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


		 		$("#deget").children().remove();
		 		$("#trego_dege").remove();
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

							$("#deget").append(
							                         "<div class = 'row rrjesht' id='dega"+d.id_dega+"'>" +

							                         "<div class = 'col kolone'id='dega_id"+d.id_dega+"'>" + d.id_dega + "</div>" + 
							                         "<div class = 'col kolone'id='dega_emri"+d.id_dega+"'>" + d.emri + "</div>" + 
							                         "<div class = 'col kolone'id='dega_kuotat"+d.id_dega+"'>" + d.kuotat + "</div>" + 	
							                    
							                         "<div class = 'col kolone'>" + "<span class='eqw' id='edit"+d.id_dega+"'><i class='btn fas fa-pen '></i></span>" + 
							                         "<span class='' id='delete"+d.id_dega+"'>"+
							                         "<form id='form_id_delete"+ d.id_dega +"' method = 'POST' action = 'delete_dege.php'>" +
							                         "<input class='fas fa-trash btn' type='submit' name='submit' value='&#xf1f8'>" +
							                         "</form>"+
							                         "</span>" + "</div>" + 
							                         // "<div class = 'col kolone viti' id='dega_kuotat"+d.id_dega+"'>" + d.viti + "</div>" +
		                     		// "<input  type='text' value = '" + d.emri_degai + "'>" +
		                     		"</div>" + 
		                 //inputet per tu ber edit
		                 // hidden ne fillim
		                 "<div class = 'row rrjesht hidden' >" +
		                 "<form id='form_id"+ d.id_dega +"' method = 'POST' action = 'edit_dege.php'>" +
			                 "<div class='row'>" +
			                 "<div class='col'>" +
			                 "<label for='emri'>Emri i Deges</label>" +
			                 "<input type='text' class='form-control' name = 'emri' value= " + d.emri + ">" +
			                 "</div>" + 
		                     "<div class='col'>" +
		                     "<label for='kuotat'>Kuotat</label>" +
		                     "<input type='number' class='form-control' min='10' step='1' name = 'kuotat' value=" + d.kuotat + ">" +
		                     "</div>" +			                    	
		                   "<input type='submit' name='submit' id='input_id"+ d.id_dega +"' class='edit_perdorues btn fas fa-save' value='&#xf0c7'>" +
		                   "</div>" +
	                   "</form>" +
	                   "<div class = 'message'></div>" +
	                   "</div>"
	                     );	//end append
							

							var form = '#form_id'+ d.id_dega;	// selector per formen
							var edit = '#edit'+ d.id_dega;		// selector per edit
							var delete_span = '#delete'+ d.id_dega;		// selector per delete
							var dega = '#dega' +d.id_dega;
							var dega_emri = '#dega_emri' +d.id_dega;
							var dega_kuotat = '#dega_kuotat' +d.id_dega;

							// var delete_id = '#delete_id'+ d.id_dega;
							var form_delete = '#form_id_delete'+ d.id_dega;	// selector per formen_delete
							// $(form + '  select').load("load_deget.php");

							// $(dega).on('mouseenter', function () {
							// 	$(this).find("span").removeClass('hidden');;
							// }).on('mouseleave', function () {
							// 	$(this).find("span").addClass('hidden');
							// });

							$(edit).click(function(){
								$(form).parent().toggleClass("hidden");
							});

							// $(delete_span).click(function(){
							// 	// $(delete_id).trigger( "click" );
							// 	// $(form).next('.message').load("delete_perdorues.php", {
							// 	// 	id: d.id_dega
							// 	// });

							// });

							$(form_delete).submit(function(event){
								event.preventDefault();
								if(!confirm('Dega do fshihet. I sigurt qe doni te vazhdoni?')){
									return false;
								} else {
									var id = d.id_dega;
									var submit = $(form_delete + ' input[name="submit"]').val();

									// $(form).next('.message').load("delete_perdorues.php", {
										$(dega).load("delete_dege.php", {
											id: id,
											submit: submit
										}, function(data, status){
											if (status == 'success' && data == 'Dega u fshi') {
												setTimeout(function() {
													$(dega).remove();
												}, 2000); 
											}
										});
									}
								});

							// per edit
							$(form).submit(function(event){
								event.preventDefault();
								if(!confirm('Deges do t\'i ndryshojne te dhenat sipas formes. I sigurt qe doni te vazhdoni?')){
									return false;
								} else {

									var id = d.id_dega;
									var emri = $(form + ' input[name="emri"]').val();
									var kuotat = $(form + ' input[name="kuotat"]').val();
									var submit = $(form + ' input[name="submit"]').val();
									// console.log(dega);

								$(this).next('.message').load("edit_dege.php", {
									id: id,
									emri: emri,
									kuotat: kuotat,
									submit: submit
								}, function(data,status){
									if (status) {
										if (data.indexOf("Te dhenat u perditesuan") >=0) {
											$(dega).children(dega_emri).text(emri);
											// $(dega).children(dega_dega).text(dega);
											$(dega).children(dega_kuotat).text(kuotat);
											// $(dega).children(dega_me_zgjedhje).text(me_zgjedhje);
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