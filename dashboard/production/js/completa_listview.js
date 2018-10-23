function myFunction(nome) {
 alert(nome);
}

//Função chamada no inicio do INDEX.php
function inicia(){
	mediaIndex();
	quantidadeUsuario();
	mediaEsperada();
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

function adicionaPessoasSemCategoria(nomeDiv, idUsuario) {
			
	$.ajax({
					url: "listaPessoas.php",
					dataType: "json",
					data: {
						acao: 'consulta',
										},
					success: function( data ) {
						 // createchkboxes(data,nomeDiv);
						 create(data,nomeDiv, idUsuario);
					}
			});}
				
	
function aguarde(nome){
	var table = document.getElementById("table");
		console.log(nome);
while(table.length>0){	
	table.remove(i);
}
	for(var i=0;i<nome.length;i++){
	if(nome != null ){
	var option = document.createElement("option");
		option.text =  nome[i].nome;
		table.add(option);
		}
	}}


	function mediaIndex(){
		var div = document.getElementById("mediaindex"); 
		$.ajax({
  		url: "../production/Control/MediaFuncionarios.php",
					dataType: "json",
					data: {
												},
					success: function( data ) {
						console.log(data);
								div.innerHTML ="R$"+ data[0].MediaGeral;

			}});

	}

	function mediaEsperada(){
		var div = document.getElementById("mediaesperada"); 
		$.ajax({
  		url: "../production/Control/MediaEsperada.php",
					dataType: "json",
					data: {
												},
					success: function( data ) {
						console.log(data);
								div.innerHTML ="R$"+ data[0].MediaGeral+".00";

			}});

	}

	function quantidadeUsuario(){
		var div = document.getElementById("quantidadeUsuario"); 
		$.ajax({
  		url: "../production/Control/QuantidadeUsuarios.php",
					dataType: "json",
					data: {
												},
					success: function( data ) {
						console.log(data);
								div.innerHTML = data[0].MediaGeral;

			}});

	}


function myTrim(x) {
  return x.replace(/^\s+|\s+$/gm,'');
}

function getValues(divId){
   var a=0;
   var boxes = document.getElementById(divId).getElementsByTagName('input'), vals = [];
   for(var i = 0; i < boxes.length; ++i){
    	if(boxes[i].checked==true){
      vals.push(boxes[i].value);
      a= a+ Number(boxes[i].value);
   }
  
}
 alert(a);
 }

function salvarValores(divId, idUsuario){

//Primeiro verifica se o usuário já possui algum criterio cadastrado. Se sim, irá limpar os dados para inserir os novos
		$.ajax({
  url: "verificaUsuarioCriteriosIndividuais.php",
					dataType: "json",
					data: {
						acao: 'consulta',
							parametro: idUsuario,
												},
					success: function( data ) {
			}});	


   var a=0;
   var boxes = document.getElementById(divId).getElementsByTagName('input'), vals = [];
   for(var i = 0; i < boxes.length; ++i){
   	waitSeconds(100);
    	a= boxes[i].id;

    		if(boxes[i].checked==true){
    			var b=1;
	$.ajax({
  url: "atualizaCriteriosIndividuais.php",
					dataType: "json",
					data: {
						acao: 'consulta',
							parametro: idUsuario,
							 adicionarId: a,
							  adicionarValor: b
					},
					success: function( data ) {
			}});		}

				else{
					var b=0;
					$.ajax({
					url: "atualizaCriteriosIndividuais.php",
					dataType: "json",
					data: {
					acao: 'consulta',
					parametro: idUsuario,
					adicionarId: a,
					adicionarValor: b
					},
					success: function( data ) {
					}
					});
				}
 				}


 			//Irá receber os valores das checkbox e salvar a soma na tabela usuarios, em criterios_individuais
  			var a=0;
   			var boxes = document.getElementById(divId).getElementsByTagName('input'), vals = [];
   			for(var i = 0; i < boxes.length; ++i){
    		if(boxes[i].checked==true){
      		vals.push(boxes[i].value);
      		a= a+ Number(boxes[i].value);
   			}}
   			$.ajax({
  					url: "Control/atualizaMediaIndividual.php",
					dataType: "json",
					data: {
					acao: 'consulta',
					parametro: idUsuario,
					adicionarValor: a
					},
					success: function( data ) {
					}

			});

 		alert("Usuário atualizado com sucesso");
}

function removeValues(divId){
   var a=0;
   var boxes = document.getElementById(divId);
  if (boxes.parentNode) {
  boxes.parentNode.removeChild(boxes);
}
 
}
 
function create(nome,nomeDiv, idUsuario)
{
document.getElementById(nomeDiv).innerHTML = "";

$.ajax({
					url: "buscaCriteriosIndividuais.php",
					dataType: "json",
					data: {
						acao: 'consulta',
							parametro: idUsuario
					},
					success: function( data ) {
						 
     for(var i=0; i<nome.length; i++) {

        var divTag = document.createElement("div");
		divTag.className ="filterCheckBoxes";

		var cb = document.createElement( "input" );
        cb.type = "checkbox";
		cb.id = nome[i].id;
		cb.name = nome[i].nome_criterios;

		cb.className="icheckbox_flat-green checked";

		if(data[i].valor_criterio_usuario==1){
		cb.checked = true;
		}
		else{
			cb.checked=false;
		}
        cb.value =nome[i].valor_criterios;

		document.getElementById(nomeDiv).appendChild(divTag);
		divTag.appendChild(cb);
		divTag.appendChild(document.createTextNode(nome[i].nome_criterios));	 
    	}
		}	
		}
		);
 		 }
     
	function waitSeconds(iMilliSeconds) {
    var counter= 0
        , start = new Date().getTime()
        , end = 0;
    while (counter < iMilliSeconds) {
        end = new Date().getTime();
        counter = end - start;
    }
}