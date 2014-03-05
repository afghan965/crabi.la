<?php
// Obtengo: Redes sociales
require_once dirname(__FILE__) . '/../../../application/models/mappers/RedSocialMapper.php';
$redSocialMapper = new RedSocialMapper();
$redesSociales = $redSocialMapper->getAll();

// Obtengo: Categorias
require_once dirname(__FILE__) . '/../../../application/models/mappers/CategoriaMapper.php';
$categoriaMapper = new CategoriaMapper();
$categorias = $categoriaMapper->getAll();

// Proceso formulario
if($_SERVER['REQUEST_METHOD'] == "POST") {

	// echo "<pre>"; print_r($_POST); echo "</pre>";	

	// TODO: Valido campos
	// TODO: Mejorar muestra de errores

	// Reglas campos vacios
	if($_POST['seo_titulo'] == '') $_POST['seo_titulo'] = $_POST['titulo'];
	if($_POST['seo_descripcion'] == '') $_POST['seo_descripcion'] = $_POST['descripcion'];

	// Proceso imagen
	if($_FILES['imagen_real']['error'] > 0) {
		// Proceso error imagen
		die("Error al procesar la imagen");
	} else {
		require_once dirname(__FILE__) . '/../../../application/models/services/Image/ImageUpload.php';
		$imageUpload = new ImageUpload($_FILES['imagen_real']);
		if($imageUpload->upload() === true) {
			$imagen_real = $imageUpload->urlUpload();
		} else {
			$error = $imageUpload->errorUpload();
			print_r($error);
			die;
		}
	}

	// Genero arreglo Noticia
	$noticia = array(
			"id_categoria" => $_POST['categoria'],
			"id_red_social" => $_POST['red_social'],
			"titulo" => $_POST['titulo'],
			"descripcion" => $_POST['descripcion'],
			"contenido" => $_POST['contenido'],
			"pregunta" => $_POST['pregunta'],
			"seo_titulo" => $_POST['seo_titulo'],
			"seo_descripcion" => $_POST['seo_descripcion'],
			"imagen_real" => $imagen_real
		);

	if(isset($_POST['destacado'])) {
		$noticia["destacado"] = 1;
	}

	if(isset($_POST['publicar'])) {
		$noticia["id_estado"] = 2;
	} else { 
		$noticia["id_estado"] = 1;
	}

	// echo "<pre>"; print_r($noticia); echo "</pre>";

	// Guardo noticia y obtengo ID
	require_once dirname(__FILE__) . '/../../../application/models/mappers/NoticiaMapper.php';	
	$noticiaMapper = new NoticiaMapper();
	$noticiaId = $noticiaMapper->save($noticia);

	// Genero slug y url
	require_once dirname(__FILE__) . '/../../../application/models/services/String/Slug.php';
	$slug = Slug::slugify($noticia['titulo']) . "-" . $noticiaId . ".html";

	$categoria = $categoriaMapper->getById($noticia["id_categoria"]);
	$url = "/" . $categoria->getField("slug") . "/" . $slug;

	if($noticiaMapper->update($noticiaId, array("slug" => $slug, "url" => $url))) {
		// Redirect a editar
		// TODO: Redirect!!
	}

}

?>

<!-- // Inicio vista -->

<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="gi gi-notes_2"></i>Nueva nota
        </h1>
    </div>
</div>

<div class="row">
	<form action="" method="post" class="" enctype="multipart/form-data">
		<div class="col-sm-9">
			<div class="block">

			    <div class="block-title">
			        <h2>Contenido</h2>	
			    </div>
    
		        <div class="form-group">
		            <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Título">
		        </div>

		        <div class="form-group">
		            <textarea id="descripcion" name="descripcion" class="form-control" placeholder="Descripción"></textarea>
		        </div>

		        <div class="form-group">
		            <!--<textarea id="textarea-ckeditor" name="textarea-ckeditor" class="ckeditor"></textarea>-->
		            <textarea id="contenido" name="contenido" class="form-control" rows="10" placeholder="Contenido..."></textarea>
		        </div>

		        <div class="form-group">
		            <input type="text" id="pregunta" name="pregunta" class="form-control" placeholder="¿Qué quieres preguntar al usuario?">
		            <span class="help-block">En caso de no ingresar una pregunta, se utilizará el texto: "Deja tus impresiones a continuación..."</span>
		        </div>
		    </div>

		    <div class="block">
				<div class="block-title">
			        <h2>SEO</h2>	
			    </div>

			    <div class="form-group">
		            <input type="text" id="seo_titulo" name="seo_titulo" class="form-control" placeholder="Título SEO">
		        </div>

		        <div class="form-group">
		            <textarea id="seo_descripcion" name="seo_descripcion" class="form-control" placeholder="Descripción SEO"></textarea>
		        </div>		      

			</div>
		</div>

		<div class="col-sm-3">

			<div class="block">
				<div class="block-title">
					<h2>Imagen</h2>
				</div>
				<div class="form-group">
					<input type="file" name="imagen_real" id="imagen_real">			
				</div>
			</div>

			<div class="block">
				<div class="block-title">
					<h2>Red social</h2>
				</div>
				<div class="form-group">
					<select name="red_social" id="red_social" class="select-chosen" data-placeholder="Selecciona">
						<option value="">Selecciona</option>
						<? foreach($redesSociales as $rs): ?>
							<option value="<?=$rs->getField('id')?>"><?=$rs->getField("nombre");?></option>
						<? endforeach; ?>
					</select>				
				</div>
			</div>

			<div class="block">
				<div class="block-title">
					<h2>Categoría</h2>
				</div>
				<div class="form-group">
					<select id="categoria" name="categoria" class="select-chosen" data-placeholder="Selecciona">  
						<option value="">Selecciona</option>                      
						<? foreach($categorias as $c): ?>
							<option value="<?=$c->getField('id')?>"><?=$c->getField("nombre");?></option>
						<? endforeach; ?>
					</select>				
				</div>
			</div>

			<div class="block">
				<div class="block-title">
					<h2>Destacado</h2>
				</div>
				<div class="form-group">										
					<label class="switch switch-primary" style="display:inline-block"><input type="checkbox" name="destacado"><span></span></label>						
					<label class="control-label" style="display:inline-block;vertical-align:top;">Destacar en el home</label>
				</div>
			</div>

			<div class="block">
				<div class="form-group form-actions">
					<input type="submit" class="btn btn-sm btn-warning" value="Borrador" name="borrador">
		            <input type="submit" class="btn btn-sm btn-primary" value="Publicar" name="publicar">		            
		        </div>	
		    </div>
		</div>		

	</form>
</div>

<!--
<script src="/js/ckeditor/ckeditor.js"></script>
<script>
	CKEDITOR.replace('textarea-ckeditor', {
	    toolbar_Basic: [
	    	[ 'Source'], 
	    	['Bold', 'Italic', 'Underline'],
	    	['NumberedList', 'BulletedList', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'], 
	    	['Link', 'Unlink'],
	    	['Format', 'Font', 'FontSize']
	    ],
	    height: 500
	});
</script>
-->

<!-- // Fin vista -->