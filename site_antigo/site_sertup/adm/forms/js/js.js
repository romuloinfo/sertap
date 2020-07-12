jQuery(document).ready(function(){
        jQuery("#formID").validationEngine();
        $(".ajax").colorbox();
            $('.moeda').priceFormat({
                prefix: 'R$ ',
                centsSeparator: ',',
                thousandsSeparator: ''
            }) 

});
		function checkHELLO(field, rules, i, options){
			if (field.val() != "HELLO") {
				// this allows to use i18 for the error msgs
				return options.allrules.validate2fields.alertText;
			}
		}


$().ready(function() {
    $("#posts_cliente").autocomplete("buscaCliente.php", {
    width: 440,
    scrollHeight: 220,
    selectFirst: true
    });
    $("#posts_cliente").result(function(event, data, formatted) {
             if (data)
                $(this).parent().next().find("input").val(data[1]);
    });
    $("#posts_imovel").autocomplete("buscaImovel.php", {
    width: 440,
    scrollHeight: 220,
    selectFirst: true
    });
    $("#posts_imovel").result(function(event, data, formatted) {
             if (data)
                $(this).parent().next().find("input").val(data[1]);
    });


    $("#posts_estoque").autocomplete("busca_estoque.php", {
    width: 440,
    scrollHeight: 220,
    selectFirst: true
    });
    $("#posts_estoque").result(function(event, data, formatted) {
             if (data)
                $(this).parent().next().find("input").val(data[1]);
    });
    $("#adicionarItens").click(function(){
        var data;
       $.getJSON('funcoes.php?adicionaItem2=sim',{estoque : $('#estoque_id').val(),quantidade : $('#qt').val(),plano : $('#plano_id').val(),diaria: $('#diarias').val()}, function(data){
            if(data && "" ){
                alert('teste1')
            }else{
                alert('teste2')
            }
       });
      
    });
    $("#dataDevolucao_").blur(function(){
        var resp;
        
       $.getJSON('funcoes.php?recalcular=sim',{data : $('#dataDevolucao_').val(),locacao: $('#locacao').val(),hora: $('#hora_entrega').val()}, function(resp){         
               $('#divTotal').html("<h2 class='red'>Total: R$<label>"+resp.total+"</label></h2><br>");
               $('#acrescimo_dias').html("<b>"+resp.dias+" dias e "+resp.horas+" horas </b>");
                $('#acrescimo').val(resp.total)
           
       });
      
    });  
    $("#hora_entrega").blur(function(){
        var resp;
        
       $.getJSON('funcoes.php?recalcular=sim',{data : $('#dataDevolucao_').val(),locacao: $('#locacao').val(),hora: $('#hora_entrega').val()}, function(resp){         
               $('#divTotal').html("<h2 class='red'>Total: R$<label>"+resp.total+"</label></h2><br>");
                $('#acrescimo_dias').html("<b>"+resp.dias+" dias e "+resp.horas+" horas </b>");
                
                
                $('#acrescimo').val(resp.total)
           
       });
      
    });    
    
    $('.form_locacao').submit(function(form){    
    form.preventDefault();
    $('.form_locacao').hide();
    var action = $(this);
    var data= action.serialize()    
    $.post('locar.php',data,function(response){  
      if(response.erro == 0){
          alert(response.mensagem)
          window.location='../gerenciarLocacoes.php'
      }else{
              alert(response.mensagem)
      }
      },'json');
    });  
    
    $('.form_devolucao').submit(function(form){    
    form.preventDefault();
    
    var action = $(this);
    var data= action.serialize()    
    $.post('devolucao.php',data,function(response){  
      if(response.erro == 0){
          alert(response.mensagem)
       
          window.open("relatorio.php?id="+response.locacao,'page','toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=960,height=600');
          window.location='../gerenciarLocacoes.php'
      }else{
              alert(response.mensagem)
              form.show();
      }

      },'json');
    });         
})

function limpar(str){
    alert(str.value)
    campo = str.name
    document.campo.value=""
}

function validarCPF(x){
   var cpf = x.value;

   var filtro = /^\d{3}.\d{3}.\d{3}-\d{2}$/i;
   if(!filtro.test(cpf)){
	 window.alert("CPF inválido. Tente novamente.");
      
     return false;
   }


   cpf = remove(cpf, ".");

   cpf = remove(cpf, "-");

   if(cpf.length != 11 || cpf == "00000000000" || cpf == "11111111111" ||
	  cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" ||
	  cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" ||
	  cpf == "88888888888" || cpf == "99999999999"){
	  window.alert("CPF inválido. Tente novamente.aquii");
            document.getElementById("campo_cpf").value='';
     return false;
   }
   soma = 0;
   for(i = 0; i < 9; i++)
   	 soma += parseInt(cpf.charAt(i)) * (10 - i);
     resto = 11 - (soma % 11);
   if(resto == 10 || resto == 11)
	 resto = 0;
   if(resto != parseInt(cpf.charAt(9))){
	 window.alert("CPF inválido. Tente novamente.");
         document.getElementById("campo_cpf").value='';
     return false;
   }
   soma = 0;
   for(i = 0; i < 10; i ++)
	 soma += parseInt(cpf.charAt(i)) * (11 - i);
   resto = 11 - (soma % 11);
   if(resto == 10 || resto == 11)
	 resto = 0;
   if(resto != parseInt(cpf.charAt(10))){
     window.alert("CPF inválido. Tente novamente.");
     document.getElementById("campo_cpf").value='';
     return false;
   }
   return true;
 }


function validaCNPJ(str) {
CNPJ = str.value
erro = new String;
if (CNPJ.length < 18) erro += "É necessarios preencher corretamente o número do CNPJ! \n\n";
if ((CNPJ.charAt(2) != ".") || (CNPJ.charAt(6) != ".") || (CNPJ.charAt(10) != "/") || (CNPJ.charAt(15) != "-")){
if (erro.length == 0) erro += "É necessarios preencher corretamente o número do CNPJ! \n\n";
}
//substituir os caracteres que nao sao numeros
if(document.layers && parseInt(navigator.appVersion) == 4){
x = CNPJ.substring(0,2);
x += CNPJ.substring(3,6);
x += CNPJ.substring(7,10);
x += CNPJ.substring(11,15);
x += CNPJ.substring(16,18);
CNPJ = x;
} else {
CNPJ = CNPJ.replace(".","");
CNPJ = CNPJ.replace(".","");
CNPJ = CNPJ.replace("-","");
CNPJ = CNPJ.replace("/","");
}
var nonNumbers = /\D/;
if (nonNumbers.test(CNPJ)) erro += "CNPJ inválido. Tente novamente. \n\n";
var a = [];
var b = new Number;
var c = [6,5,4,3,2,9,8,7,6,5,4,3,2];
for (var j=0; j<12; j++){
a[j] = CNPJ.charAt(j);
b += a[j] * c[j+1];
}
if(CNPJ == "00000000000000" || CNPJ == "11111111111111" ||
	CNPJ == "22222222222222" || CNPJ == "33333333333333" || CNPJ == "44444444444444" ||
	CNPJ == "55555555555555" || CNPJ == "66666666666666" || CNPJ == "77777777777777" ||
	CNPJ == "88888888888888" || CNPJ == "99999999999999"){
	window.alert("CNPJ inválido. Tente novamente.");
    return false;
}

if ((x = b % 11) < 2) {a[12] = 0} else {a[12] = 11-x}
b = 0;
for (y=0; y<13; y++) {
b += (a[y] * c[y]);
}
if ((x = b % 11) < 2) {a[13] = 0;} else {a[13] = 11-x;}
if ((CNPJ.charAt(12) != a[12]) || (CNPJ.charAt(13) != a[13])){
erro +="CNPJ inválido. Tente novamente.";
}
if (erro.length > 0){
alert(erro);
return false;
}
return true;
}

 function remove(str, sub) {
   i = str.indexOf(sub);
   r = "";
   if (i == -1) return str;
   r += str.substring(0,i) + remove(str.substring(i + sub.length), sub);
   return r;
 }


function formaPagamento(str){
    var prazo = str.value
    if(prazo > 0){
        document.getElementById('prazo').style.display = "block"
    }else{
        document.getElementById('prazo').style.display = "none"
    }
}

function mostrarEntrada(str){
    if(str.checked){
        document.getElementById('entrada').style.display = "block"
    }else{
        document.getElementById('entrada').style.display = "none"
    }
}

function mudaTipo(tipo){
    if(tipo == "F"){
        document.getElementById('fisica').style.display = "block"
        document.getElementById('juridica').style.display = "none"
    }else{
        document.getElementById('fisica').style.display = "NONE"
        document.getElementById('juridica').style.display = "block"
    }

}
function calculaDias(previsao,entrega){
var dias = 0;
var date2 = new String(entrega);
var date1 = new String(previsao);
date1 = date1.split("/");
date2 = date2.split("/");
var sDate = new Date(date1[1]+"/"+date1[0]+"/"+date1[2]);
var eDate = new Date(date2[1]+"/"+date2[0]+"/"+date2[2]);
dias = Math.round((sDate-eDate)/86400000);
document.getElementById("diarias").value = dias
document.getElementById("dias").innerHTML ="&nbsp"+dias+"&nbsp; diárias.";
}
function verificaFornecedor(){
    var produto
    produto = document.getElementById('posts_fornecedor_id').value
    produto_texto = document.getElementById('posts_fornecedor').value
    if(produto==0 && produto_texto != "" ){
        alert("FORNECEDOR NÃO ENCONTRADO. INFORME NOVAMENTE O NOME DO FORNECEDOR")
        document.getElementById('posts_fornecedor').value=""
        document.getElementById('posts_fornecedor').focus()
        return null
    }
}

function limpaInput(){
    document.getElementById('posts_fornecedor_id').value="0"
    document.getElementById('posts_fornecedor').value=""
}
function alterarValor(plano,estoque,valor){

    document.getElementById("padrao").innerHTML = ""
    xmlHttp=GetXmlHttpObject()
    if (xmlHttp==null)
    {
    alert ("Browser does not support HTTP Request")
    return
    }
    var url
    url="funcoes.php?alterarValor=sim&plano="+plano+"&estoque="+estoque+"&valor="+valor.value
    url=url+"&sid="+Math.random()
    xmlHttp.onreadystatechange=padrao
    xmlHttp.open("GET",url,true)
    xmlHttp.send(null)
}
function associarProduto(produto,qt,estoque){
 
    if(isNaN(qt) || qt<=0){
        alert("A QUANTIDADE DEVE SER MAIOR QUE 0")
        document.getElementById('qt').value=""
        document.getElementById('qt').focus()
        return null
    }
    document.getElementById('qt').focus()
    document.getElementById("padrao").innerHTML = ""
    xmlHttp=GetXmlHttpObject()
    if (xmlHttp==null)
    {
    alert ("Browser does not support HTTP Request")
    return
    }
    var url
    url="funcoes.php?associarProduto=sim&estoque="+estoque+"&qt="+qt+"&produto="+produto
    url=url+"&sid="+Math.random()
    xmlHttp.onreadystatechange=padrao
    xmlHttp.open("GET",url,true)
    xmlHttp.send(null)
}

function removerAssociacao(produto,estoque){
    document.getElementById("padrao").innerHTML = ""
    xmlHttp=GetXmlHttpObject()
    if (xmlHttp==null)
    {
    alert ("Browser does not support HTTP Request")
    return
    }
    var url
    url="funcoes.php?removerAssociacao=sim&estoque="+estoque+"&produto="+produto
    url=url+"&sid="+Math.random()
    xmlHttp.onreadystatechange=padrao
    xmlHttp.open("GET",url,true)
    xmlHttp.send(null)
}

function adicionaItem(estoque,qt,plano,diarias,data_entrega,previsao_entrega){
    if(estoque==""){
        alert("PRODUTO NÃO ENCONTRADO. INFORME NOVAMENTE O NOME DO PRODUTO.")
        document.getElementById('posts_estoque').value=""
        document.getElementById('estoque_id').value=""
        document.getElementById('posts_estoque').focus()
        return null
    }
    if(isNaN(qt) || qt<=0){
        alert("A QUANTIDADE DEVE SER MAIOR QUE 0")
        document.getElementById('qt').value=""
        document.getElementById('qt').focus()
        return null
    }
    document.getElementById('posts_estoque').value=""
    document.getElementById('estoque_id').value=""
    document.getElementById('posts_estoque').focus()
    document.getElementById("padrao").innerHTML = ""
    xmlHttp=GetXmlHttpObject()
    if (xmlHttp==null)
    {
    alert ("Browser does not support HTTP Request")
    return
    }
    var url

    url="funcoes.php?adicionaItem=sim&estoque="+estoque+"&qt="+qt+"&plano="+plano+"&diarias="+diarias+"&data_entrega="+data_entrega+"&previsao_entrega="+previsao_entrega
    url=url+"&sid="+Math.random()
    xmlHttp.onreadystatechange=padrao
    xmlHttp.open("GET",url,true)
    xmlHttp.send(null)
    
   window.setTimeout("atualizaTotal()", 1000);
}
function descontoDevolucao(valor){
$.ajax({
type: "GET",
        url:'funcoes.php?descontoDevolucao='+valor.value,
        dataType:'html',
       // data:{
       //          Idioma:"<?php echo $idioma;?>",Rad:$('input:radio:checked').val(),ObjEvn:'btn_tipo_quest'
       //          },
        success:function(result){                   
                   $('#divTotal').html("<h2 class='red'>Total: R$<label>"+result+"</label></h2><br>");
         }
})
}
function atualizaTotal(){

$.ajax({
type: "GET",
        url:'funcoes.php?retornaSessao=sim',
        dataType:'html',
       // data:{
       //          Idioma:"<?php echo $idioma;?>",Rad:$('input:radio:checked').val(),ObjEvn:'btn_tipo_quest'
       //          },
        success:function(result){                   
                   $('#divTotal').html("<h2 class='red'>Total: R$<label>"+result+"</label></h2><br>");
         }
})
}

function somaDesconto(str,pos){
    var valor = str.value
    document.getElementById("padrao").innerHTML = ""
    xmlHttp=GetXmlHttpObject()
    if (xmlHttp==null)
    {
    alert ("Browser does not support HTTP Request")
    return
    }
    var url
    url = 'funcoes.php?somaDesconto=sim&valor='+valor+'&pos='+pos
    url=url+"&sid="+Math.random()
    xmlHttp.onreadystatechange=padrao
    xmlHttp.open("GET",url,true)
    xmlHttp.send(null)
    window.setTimeout("atualizaTotal()", 1000);
}

function somaAcrescimo(str,pos){
var valor = str.value
    document.getElementById("padrao").innerHTML = ""
    xmlHttp=GetXmlHttpObject()
    if (xmlHttp==null)
    {
    alert ("Browser does not support HTTP Request")
    return
    }
    var url
    url = 'funcoes.php?somaAcrescimo=sim&valor='+valor+'&pos='+pos
    url=url+"&sid="+Math.random()
    xmlHttp.onreadystatechange=padrao
    xmlHttp.open("GET",url,true)
    xmlHttp.send(null)
    window.setTimeout("atualizaTotal()", 1000);
}
function removerItem(produto){
    document.getElementById("padrao").innerHTML = ""
    xmlHttp=GetXmlHttpObject()
    if (xmlHttp==null)
    {
    alert ("Browser does not support HTTP Request")
    return
    }
    var url
    var str
    url="funcoes.php?removerItem=sim&produto="+produto
    url=url+"&sid="+Math.random()
    xmlHttp.onreadystatechange=padrao
    xmlHttp.open("GET",url,true)
    xmlHttp.send(null)
    window.setTimeout("atualizaTotal()", 1000);
    
}
function buscarCidade(uf){    
    document.getElementById("cidade").innerHTML = ""
    xmlHttp=GetXmlHttpObject()    
    if (xmlHttp==null)
    {
    alert ("Browser does not support HTTP Request")
    return
    }    
    var url
    var str
    url="funcoes.php?buscaCidade=sim&uf="+uf.value
    url=url+"&sid="+Math.random()
    xmlHttp.onreadystatechange=estadoChanged
    xmlHttp.open("GET",url,true)
    xmlHttp.send(null)            
}
function buscarCidade_cobranca(uf){
    document.getElementById("cidade_cobranca").innerHTML = ""
    xmlHttp=GetXmlHttpObject()
    if (xmlHttp==null)
    {
    alert ("Browser does not support HTTP Request")
    return
    }
    var url
    var str
    url="funcoes.php?buscaCidadeCobranca=sim&uf="+uf.value
    url=url+"&sid="+Math.random()
    xmlHttp.onreadystatechange=estadoCobrancaChanged
    xmlHttp.open("GET",url,true)
    xmlHttp.send(null)
}
function buscarBairro_cobranca(cidade){
    document.getElementById("bairro_cobranca").innerHTML = ""
    xmlHttp=GetXmlHttpObject()
    if (xmlHttp==null)
    {
    alert ("Browser does not support HTTP Request")
    return
    }
    var url
    var str
    url="funcoes.php?buscaBairroCobranca=sim&cidade="+cidade.value
    url=url+"&sid="+Math.random()
    xmlHttp.onreadystatechange=bairroCobrancaChanged
    xmlHttp.open("GET",url,true)
    xmlHttp.send(null)
}
function buscarBairro(cidade){
    document.getElementById("bairro").innerHTML = ""
    xmlHttp=GetXmlHttpObject()
    if (xmlHttp==null)
    {
    alert ("Browser does not support HTTP Request")
    return
    }
    var url
    var str
    url="funcoes.php?buscaBairro=sim&cidade="+cidade.value
    url=url+"&sid="+Math.random()
    xmlHttp.onreadystatechange=bairroChanged
    xmlHttp.open("GET",url,true)
    xmlHttp.send(null)
}

function estadoChanged()
{
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
   {
   document.getElementById("cidade").innerHTML=xmlHttp.responseText
   }
}
function estadoCobrancaChanged()
{
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
   {
   document.getElementById("cidade_cobranca").innerHTML=xmlHttp.responseText
   }
}

function bairroChanged()
{
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
   {
   document.getElementById("bairro").innerHTML=xmlHttp.responseText
   }
}
function padrao()
{
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
   {
   document.getElementById("padrao").innerHTML=xmlHttp.responseText
   }
}
function bairroCobrancaChanged()
{
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
   {
   document.getElementById("bairro_cobranca").innerHTML=xmlHttp.responseText
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

function SetMask(Sender,Mask){

  Sender.maxLength = Mask.length
  var S  = Sender.value
  var S2 = ""
  var StartLenght = S.length


  n = S.length

  for (i = 0;i < n;i++)
  {
   if ((S.charAt(i) == "0") ||
       (S.charAt(i) == "1") ||
       (S.charAt(i) == "2") ||
       (S.charAt(i) == "3") ||
       (S.charAt(i) == "4") ||
       (S.charAt(i) == "5") ||
       (S.charAt(i) == "6") ||
       (S.charAt(i) == "7") ||
       (S.charAt(i) == "8") ||
       (S.charAt(i) == "9")
      )
   {
    S2 = S2 + S.charAt(i)
   }
  }

  S = S2
  n = 0

  for (i = 0;i < S.length;i++)
  {
   if ((Mask.charAt(n) != "0") && (Mask.charAt(n) != "9"))
   {
    S = S.substring(0,i) + Mask.charAt(n) + S.substring(i,S.length)
   }
   n++
  }

  if (StartLenght <= S.length)
  {
   while ((n < Mask.length) && ((Mask.charAt(n) != "0") && (Mask.charAt(n) != "9")))
   {
    S = S + Mask.charAt(n)
    n++
   }
  }

  // Elimina o ultimo digito caso não seja numerico
  i = S.length
  while ((i > 0) &&
         (S != "") &&
         (S.charAt(i-1) != "0") &&
         (S.charAt(i-1) != "1") &&
         (S.charAt(i-1) != "2") &&
         (S.charAt(i-1) != "3") &&
         (S.charAt(i-1) != "4") &&
         (S.charAt(i-1) != "5") &&
         (S.charAt(i-1) != "6") &&
         (S.charAt(i-1) != "7") &&
         (S.charAt(i-1) != "8") &&
         (S.charAt(i-1) != "9")
        )
  {
   S = S.substring(0,i-1)
   i = S.length
  }

  if (Sender.value != S)
  {
   Sender.value = S.substring(0,Mask.length)
  }
 }

 function SelectNextPress(Sender,KeyPress)
	{
		if (!KeyPress)
		{
			KeyPress = window.event;
		}

		if (KeyPress.keyCode)
		{
			var Key = KeyPress.keyCode
		}
		else
		if (KeyPress.which)
		{
			var Key = KeyPress.which
		}

		if (Key == 13)
  {
			if (KeyPress.keyCode)
			{
				KeyPress.keyCode = 0
			}
			else
			if (KeyPress.which)
			{
				KeyPress.which = 0
			}
		}
 }

	function SelectNext(Sender,KeyPress,Mask)
	{
		Form = Sender

		while (Form.tagName.toLowerCase() != 'form')
		{
			Form = Form.parentNode
		}

		if (Form.tagName.toLowerCase() == 'form')
		{
   var Index     = 0
			var LastRadio = ""
			var LastType  = ""

			if (!KeyPress)
			{
				KeyPress = window.event;
			}

			if (KeyPress.keyCode)
			{
				var Key = KeyPress.keyCode
			}
			else
			if (KeyPress.which)
			{
				var Key = KeyPress.which
			}

			if (Key == 13)
			{
				for (i=0;i< Form.elements.length;i++)
				{
					if (Sender == Form.elements[i])
					{
						break;
					}
					Index++
				}

				if ((Index >= Form.elements.length-1) || (Index >= Form.elements.length))
				{
					Form.submit()
					return(0)
				}

				LastType  = Form.elements[Index].type.toLowerCase()
				LastRadio = Form.elements[Index].name.toLowerCase()

				while (
											(Index < Form.elements.length) &&
											(Form.elements[Index+1].type.toLowerCase() == 'radio') &&
											(Form.elements[Index+1].name.toLowerCase() == LastRadio)
										)
				{
					Index++
				}

				if ((Index >= Form.elements.length-1) || (Index >= Form.elements.length))
				{
					Form.submit()
					return(0)
				}

				Obj = Form.elements[Index+1]
				if (Obj.type.toLowerCase() == 'radio')
				{
					ParentObj = Form.elements[Obj.name]

					for (i = 0;i < ParentObj.length;i++)
					{
						if (ParentObj[i].checked)
						{
							Obj = ParentObj[i]
							break;
						}
					}
				}

				Obj.focus()

				if (Mask != "")
				{
					SetMask(Sender,Mask)
				}

				return(0)
			}
			else
			{
				if (Mask != "")
				{
					SetMask(Sender,Mask)
					return(0)
				}
			}
		}
	}

 function abrirPagina(pagina,altura,largura){
     window.open(pagina,'page','toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width='+largura+',height='+altura);
 }

 function alterarQtProdutos(valor,produto,estoque){
     var value = valor.value
    if(isNaN(value) || value<=0){
        alert("A QUANTIDADE DEVE SER MAIOR QUE 0")
        return null
    }
    document.getElementById("padrao").innerHTML = ""
    xmlHttp=GetXmlHttpObject()
    if (xmlHttp==null)
    {
    alert ("Browser does not support HTTP Request")
    return
    }
    var url
    var str
    url="funcoes.php?alteraQtProduto=sim&produto="+produto+"&qt="+value+"&estoque="+estoque
    url=url+"&sid="+Math.random()
    xmlHttp.onreadystatechange=padrao
    xmlHttp.open("GET",url,true)
    xmlHttp.send(null)
 }

