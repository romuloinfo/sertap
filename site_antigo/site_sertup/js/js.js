                    
  $(document).ready(function(){
                    $('#tabela').dataTable({
        		"sPaginationType": "full_numbers",
                        "oLanguage": {
			"sLengthMenu": "Mostrar _MENU_ registros por p&aacute;gina",
			"sZeroRecords": "Nenhum registro encontrado!",
			"sInfo": "Mostrando _START_ de _END_ de _TOTAL_ registros",
			"sInfoEmtpy": "Mostrando 0 de 0 de 0 registros",
			"sInfoFiltered": "(filtrado do total de _MAX_ registros)"
		},
                

                        "bLengthChange": true,
                        "bFilter": true,
                        "bSort": false,
                        "bInfo": true,
                        "bProcessing": true,
                        "bAutoWidth": false
	})
        
        });
        
        
function busca_interesse(opcao){
    
    if (opcao.value == 1 ){
        document.getElementById('valor_compra').style.display = 'block';
        document.getElementById('valor_aluguel').style.display = 'none';
    }else{

        document.getElementById('valor_aluguel').style.display = 'block';
        document.getElementById('valor_compra').style.display = 'none';
    }
    
    
}