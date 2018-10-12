function myFunction() {
 alert("AE")
}

function adicionaLinha() {
	
		$.ajax({
					url: "buscaCategorias.php",
					dataType: "json",
					data: {
						acao: 'consulta',
							parametro: $('#select_id').val()
					},
					success: function( data ) {
						 
						 aguarde(data);
					}
			});
	}

function adicionaPessoasSemCategoria() {
	
	$.ajax({
					url: "listaPessoas.php",
					dataType: "json",
					data: {
						acao: 'consulta',
										},
					success: function( data ) {
						 
						 aguardealista(data);
					}
			});
	}


function aguarde(nome){
	var table = document.getElementById("table");

while(table.length>0){	
	table.remove(i);
}
	for(var i=0;i<nome.length;i++){
	//var numeroLinhas = table.rows.length;
	if(nome != null ){

	var option = document.createElement("option");
	option.text =  nome[i].nome;
	table.add(option);
		}
	}}

function aguardealista(nome){
	var table = document.getElementById("table");


	for(var i=0;i<nome.length;i++){


		if(nome != null ){
			$("#table").append("<span>"+nome[i].nome_criterios+"</span>");
		// option.text =  nome[i].nome;
	// table.add(option);
	
	
		}
	}}

function myTrim(x) {
  return x.replace(/^\s+|\s+$/gm,'');
}