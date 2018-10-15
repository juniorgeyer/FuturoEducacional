function myFunction(nome) {
 alert(nome);
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

function adicionaPessoasSemCategoria(nomeDiv) {
			

				
	$.ajax({
					url: "listaPessoas.php",
					dataType: "json",
					data: {
						acao: 'consulta',
										},
					success: function( data ) {
						 action=2;
						// createchkboxes(data,nomeDiv);
						 create(data,nomeDiv);
						 
					}
			});}
				
	


function aguarde(nome){
	var table = document.getElementById("table");

while(table.length>0){	
	table.remove(i);
}
	for(var i=0;i<nome.length;i++){
	if(nome != null ){
	var option = document.createElement("option");
		}
	}}

function aguardealista(nome){
	var table = document.getElementById("table");
var checkbox = document.createElement('input');
checkbox.type = "checkbox";
checkbox.name = "name";
checkbox.value = "value";
checkbox.id = "id";

var label = document.createElement('label')
label.htmlFor = "id";
label.appendChild(document.createTextNode('text for label after checkbox'));

table.appendChild(checkbox); table.appendChild(label);     }

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

function removeValues(divId){
   var a=0;
   var boxes = document.getElementById(divId);
  if (boxes.parentNode) {
  boxes.parentNode.removeChild(boxes);
}
 
}
 
function create(nome,nomeDiv)
{
document.getElementById(nomeDiv).innerHTML = "";

     for(var i=0; i<nome.length; i++) {

        var divTag = document.createElement("div");
		divTag.className ="filterCheckBoxes";


		var cb = document.createElement( "input" );
        cb.type = "checkbox";
		cb.id = "checkBox"+i;
		cb.name = nome[i].nome_criterios;

		cb.className="icheckbox_flat-green checked";
		cb.checked = true;
        cb.value =nome[i].valor_criterios;

		document.getElementById(nomeDiv).appendChild(divTag);
		divTag.appendChild(cb);
		divTag.appendChild(document.createTextNode(nome[i].nome_criterios));	 
     } 
     }
