function adicionarPermissao(sel,acao,aplicacao,grupo){
    document.getElementById("txtHint").innerHTML = ""
    xmlHttp=GetXmlHttpObject()
    if (xmlHttp==null)
    {
    alert ("Browser does not support HTTP Request")
    return
    }
    var url
    
    if(sel.checked == true){
        url="forms/funcoes.php?permissao=sim&acao="+acao+"&valor=1&aplicacao="+aplicacao+"&grupo="+grupo
    }else{
        url="forms/funcoes.php?permissao=sim&acao="+acao+"&valor=0&aplicacao="+aplicacao+"&grupo="+grupo
    }
    
    url=url+"&sid="+Math.random()
    xmlHttp.onreadystatechange=stateChanged
    xmlHttp.open("GET",url,true)
    xmlHttp.send(null)
}

function excluirRegistro(link){

    if (confirm('Deseja realmente excluir o registro.'))
        window.location=link

}
function addPermissao(str,metodo,nivel){
        if(str.checked == true){
            $.getJSON( path + 'permissao/inserir/' + metodo+'/'+ nivel)
        }else{
            $.getJSON( path + 'permissao/deletar/' + metodo+'/'+ nivel)
        }
}

 
function resetaCombo( el ) {
   $("select[name='"+el+"']").empty();
   var option = document.createElement('option');
   $( option ).attr( {value : ''} );
   $( option ).append( 'Escolha' );
   $("select[name='"+el+"']").append( option );
}

function buscarCidade(uf){
    document.getElementById("txtHint").innerHTML = ""    
    xmlHttp=GetXmlHttpObject()    
    if (xmlHttp==null)
    {
    alert ("Browser does not support HTTP Request")
    return
    }    
    var url
    
    url="funcoes.php?buscaCidade=sim&uf="+uf.value
    url=url+"&sid="+Math.random()
    xmlHttp.onreadystatechange=stateChanged
    xmlHttp.open("GET",url,true)
    xmlHttp.send(null)        
    
}

function SomenteNumero(e){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58)) return true;
    else{
    	if (tecla==8 || tecla==0) return true;
	else  return false;
    }
}

function stateChanged()
{
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
   {
   document.getElementById("txtHint").innerHTML=xmlHttp.responseText
   }
}

function GetXmlHttpObject()
{
  var xmlHttp=null;
  try
    {
    // Firefox, Opera 8.0+, Safari
    xmlHttp=new XMLHttpRequest();
    }
  catch (e)
    {
    // Internet Explorer
    try
      {
      xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
      }
    catch (e)
      {
      xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
    }
  return xmlHttp;
}



  //setTimeout( function () {
  //	if ( typeof _bsap != 'undefined' ) {
  //		$('#header_advert>a').css('display', 'block');
  //	}
  //	else {
  //		$('#donate_advert').click( function() {
  //			window.location.href = "/donate";
  //		} ).css('display', 'block');
  //	}
  //}, 3000 );


$(document).ready(function(){
				 var oTable = $('#example').dataTable( {
                                       "sPaginationType": "full_numbers",
                                       "oLanguage": {
                                            "sLengthMenu": "Mostrar _MENU_ registros por p&aacute;gina",
                                            "sZeroRecords": "Nenhum registro encontrado!",
                                            "sInfo": "Mostrando _START_ de _END_ de _TOTAL_ registros",
                                            "sInfoEmtpy": "Mostrando 0 de 0 de 0 registros",
                                            "sInfoFiltered": "(filtrado do total de _MAX_ registros)"
                                        },

					"bProcessing": true,
					"bServerSide": true,
					"sAjaxSource": "server_side/scripts/server_processing.php",
                                        "bLengthChange": true,
                                        "bFilter": true,
                                        "bSort": true,
                                        "bInfo": true,
                                        "bAutoWidth": false
				} );
                                
			$('#contrato').dataTable( {
                                       "sPaginationType": "full_numbers",
                                       "oLanguage": {
                                            "sLengthMenu": "Mostrar _MENU_ registros por p&aacute;gina",
                                            "sZeroRecords": "Nenhum registro encontrado!",
                                            "sInfo": "Mostrando _START_ de _END_ de _TOTAL_ registros",
                                            "sInfoEmtpy": "Mostrando 0 de 0 de 0 registros",
                                            "sInfoFiltered": "(filtrado do total de _MAX_ registros)"
                                        },

					"bProcessing": true,
					"bServerSide": true,
					"sAjaxSource": "gerenciarContratos_server.php",
                                        "bLengthChange": true,
                                        "bFilter": true,
                                        "bSort": true,
                                        "bInfo": true,
                                        "bAutoWidth": false
				} );  
                                
				 $('#cliente').dataTable( {
                                       "sPaginationType": "full_numbers",
                                       "oLanguage": {
                                            "sLengthMenu": "Mostrar _MENU_ registros por p&aacute;gina",
                                            "sZeroRecords": "Nenhum registro encontrado!",
                                            "sInfo": "Mostrando _START_ de _END_ de _TOTAL_ registros",
                                            "sInfoEmtpy": "Mostrando 0 de 0 de 0 registros",
                                            "sInfoFiltered": "(filtrado do total de _MAX_ registros)"
                                        },

					"bProcessing": true,
					"bServerSide": true,
					"sAjaxSource": "gerenciarClientes_server.php",
                                        "bLengthChange": true,
                                        "bFilter": true,
                                        "bSort": true,
                                        "bInfo": true,
                                        "bAutoWidth": false
				} ); 
                                
		$('#imovel').dataTable( {
                                       "sPaginationType": "full_numbers",
                                       "oLanguage": {
                                            "sLengthMenu": "Mostrar _MENU_ registros por p&aacute;gina",
                                            "sZeroRecords": "Nenhum registro encontrado!",
                                            "sInfo": "Mostrando _START_ de _END_ de _TOTAL_ registros",
                                            "sInfoEmtpy": "Mostrando 0 de 0 de 0 registros",
                                            "sInfoFiltered": "(filtrado do total de _MAX_ registros)"
                                        },

					"bProcessing": true,
					"bServerSide": true,
					"sAjaxSource": "gerenciarImoveis_server.php",
                                        "bLengthChange": true,
                                        "bFilter": true,
                                        "bSort": true,
                                        "bInfo": true,
                                        "bAutoWidth": false
				} );                                
                    $('#tabela').dataTable({
        		"sPaginationType": "full_numbers",
                        "oLanguage": {
			"sLengthMenu": "Mostrar _MENU_ registros por p&aacute;gina",
			"sZeroRecords": "Nenhum registro encontrado!",
			"sInfo": "Mostrando _START_ de _END_ de _TOTAL_ registros",
			"sInfoEmtpy": "Mostrando 0 de 0 de 0 registros",
			"sInfoFiltered": "(filtrado do total de _MAX_ registros)"
		},
                        "sDom": 'T<"clear">lfrtip',
                        "oTableTools": {
                            "aButtons": [    
                                "copy",
                                "print",
                                "xls",
                                "pdf",
                            ]
                        },                 

                        "bLengthChange": true,
                        "bFilter": true,
                        "bSort": false,
                        "bInfo": true,
                        "bProcessing": true,
                        "bAutoWidth": false
	});


})


            
           function abrirPagina(pagina,altura,largura){
     window.open(pagina,'page','toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width='+largura+',height='+altura);
 }