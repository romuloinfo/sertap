<?php
include 'superior.php';

$imagem = new Imagem();
$listaFotos = array();



//if(isset ($_GET['id'])){
 //   $galeria->selecionarPorId($_GET['id']); 
  //  $listaFotos = $galeria->selecionarFotos($_GET['id']);



//if(isset ($_GET['acao'])){
//    if($_GET['acao'] == "excluir"){
        
//        foreach ($listaFotos as $foto){
//            $galeria->deletarFoto($foto);
//            $ext = end(explode(".", $value)); // Pega a extensÃ£o do arquivo
//            $thumb = str_replace(".$ext", "_thumb.$ext", $value); // Substitui a extensÃ£o
//            unlink("../../arquivos/".$thumb);
//            unlink("../../arquivos/".$foto);
//        }
///    }
//}

//}

if(isset($_FILES['files'])){
    $dir="../../img_pub/";
//    $oImg = new m2brimagem($dir);
    
    $errors= array();
	foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
            
		$file_name = $_FILES['files']['name'][$key];
		$file_size = $_FILES['files']['size'][$key];
		$file_tmp  = $_FILES['files']['tmp_name'][$key];
		$file_type = $_FILES['files']['type'][$key];
                
                if (!empty($file_name)){
                   $extensions = array("jpeg","jpg","png"); 
                   $file_ext = explode('.',$file_name)	;
                   $file_ext = end($file_ext);  
                   $file_ext = strtolower(end(explode('.',$file_name)));  

                   if(in_array($file_ext,$extensions) == true){
                        $errors[]="Extenção incorreta da imagem.";
                            
                    if($file_size > 2097152){
                                    $errors[]='File size must be less than 2 MB';
                    }		                   
                    $query="INSERT into imagens (imagem,imagem_thumb) VALUES('$file_name','$file_name"."_thumb')";        
                    $nome = $dir . md5($_FILES['files']['name'][$key] . $_SERVER['REMOTE_PORT'] . time()) .".". $file_ext ;
                    if(move_uploaded_file($file_tmp,$nome) ){

                    }
                    //$oImg = new m2brimagem($_FILES['files']['tmp_name'][$key]);
                    //echo $oImg->valida()."<br>";
                    //if( $oImg->valida() == 'OK' ){
                    //    echo "aqui";
                        //$oImg->posicaoCrop($_POST['x'], $_POST['y'] );
                        //$oImg->redimensiona($_POST['w'], $_POST['h'], 'crop' );
                        //$oImg->redimensiona($_POST['largura'],$_POST['altura'],'');
                     //   $oImg->grava($file_name);            
                    // }
                    }        

                }                    // print_r($errors);
    }
}

?>

<body>
<head>
<script type="text/javascript" src="swfupload/swfupload.js"></script>
<script type="text/javascript" src="js/swfupload.queue.js"></script>
<script type="text/javascript" src="js/fileprogress.js"></script>
<script type="text/javascript" src="js/handlers.js"></script>    
<script type="text/javascript">
		var upload1, upload2;

		window.onload = function() {

			upload2 = new SWFUpload({
				// Backend Settings
				upload_url: "upload.php",
				post_params: {"PHPSESSID" : "<?php echo session_id(); ?>"},

				// File Upload Settings
				file_size_limit : "30000",	// 200 kb
				file_types : "*.jpg;*.gif;*.png",
				file_types_description : "Image Files",
				file_upload_limit : "10",
				file_queue_limit : "5",

				// Event Handler Settings (all my handlers are in the Handler.js file)
				file_dialog_start_handler : fileDialogStart,
				file_queued_handler : fileQueued,
				file_queue_error_handler : fileQueueError,
				file_dialog_complete_handler : fileDialogComplete,
				upload_start_handler : uploadStart,
				upload_progress_handler : uploadProgress,
				upload_error_handler : uploadError,
				upload_success_handler : uploadSuccess,
				upload_complete_handler : uploadComplete,

				// Button Settings
				button_image_url : "XPButtonUploadText_61x22.png",
				button_placeholder_id : "spanButtonPlaceholder2",
				button_width: 61,
				button_height: 22,
				
				// Flash Settings
				flash_url : "../swfupload/swfupload.swf",

				swfupload_element_id : "flashUI2",		// Setting from graceful degradation plugin
				degraded_element_id : "degradedUI2",	// Setting from graceful degradation plugin

				custom_settings : {
					progressTarget : "fsUploadProgress2",
					cancelButtonId : "btnCancel2"
				},

				// Debug Settings
				debug: false
			});

	     }
	</script>
    
</head>
    

 	<form id="form1" action="upload.php" method="post" enctype="multipart/form-data">

		<table>
			<tr valign="top">


				<td>
					<div>
						<div class="fieldset flash" id="fsUploadProgress2">
						</div>
						<div style="padding-left: 5px;">
							<span id="spanButtonPlaceholder2"></span>
							<input id="btnCancel2" type="button" value="Cancel Uploads" onclick="cancelQueue(upload2);" disabled="disabled" style="margin-left: 2px; height: 22px; font-size: 8pt;" />
							<br />
						</div>
					</div>
				</td>
			</tr>
		</table>
	</form>   
    
   


<p align="right" style="margin-right: 30px"><a href="gerenciarGaleria.php"><img src="../imagens/back.gif" title="Voltar" alt="" border="0"/>&nbsp;&nbsp;&nbsp;&nbsp;Voltar</a>


<?php

include("inferior.php");
?>