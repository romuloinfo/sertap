<?php
include 'superior.php';

?>

<body>
<head>
<link href="css/default.css" rel="stylesheet" type="text/css" /> 
<script type="text/javascript" src="swfupload/swfupload.js"></script>
<script type="text/javascript" src="js/swfupload.queue.js"></script>
<script type="text/javascript" src="js/fileprogress.js"></script>
<script type="text/javascript" src="js/handlers.js"></script>    
<script type="text/javascript">
		var upload2;

		window.onload = function() {

			upload2 = new SWFUpload({
				// Backend Settings
				upload_url: "upload.php",
				post_params: {"PHPSESSID" : "<?php echo session_id(); ?>","imovel" : "<?php echo $_GET['id']; ?>"},

				// File Upload Settings
				file_size_limit : "2000",	// 200 kb
				file_types : "*.jpg;*.gif;*.png;*.jpeg",
				file_types_description : "Image Files",
				file_upload_limit : "10",
				file_queue_limit : "10",

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
				flash_url : "swfupload/swfupload.swf",

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
    
<div id="content">
 	<form id="form1" action="upload.php" method="post" enctype="multipart/form-data">

		<table>
                    <tr>
                        <td>
                            Prezado usuário, cada foto não poderá ultrapassar o tamanho de 2mb, e deverá está nos formatos jpg,png.<br>
                            Tamanho da foto padrão (640x480).
                        </td>
                    </tr>
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
    
</div> 


<p align="right" style="margin-right: 30px"><a href="../gerenciarFotos.php?id=<?php echo $_GET['id']?>"><img src="../imagens/voltar.jpg" title="Voltar" alt="" border="0"/></a>


<?php

include("inferior.php");
?>