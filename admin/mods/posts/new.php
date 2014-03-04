<?php
// Obtengo: Redes sociales
require_once dirname(__FILE__) . '/../../../application/models/mappers/RedSocialMapper.php';
$redSocialMapper = new RedSocialMapper();
$redesSociales = $redSocialMapper->getAll();

// Obtengo: Categorias
?>
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="gi gi-notes_2"></i>Nueva nota
        </h1>
    </div>
</div>

<div class="row">
	<form action="" method="post" class="" onsubmit="return false;">
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
		            <textarea id="textarea-ckeditor" name="textarea-ckeditor" class="ckeditor"></textarea>
		        </div>

		        <div class="form-group">
		            <input type="text" id="pregunta" name="pregunta" class="form-control" placeholder="¿Qué quieres preguntar al usuario?">
		            <span class="help-block">En caso de no ingresar una pregunta, se utilizará el texto: "Deja tus impresiones a continuación..."</span>
		        </div>

			</div>
		</div>

		<div class="col-sm-3">
			<div class="block">
				<div class="block-title">
					<h2>Imagen (real)</h2>
				</div>
				<div class="form-group">
					<input type="file" name="imagen_real" id="imagen_real">			
				</div>
			</div>
		</div>

		<div class="col-sm-3">
			<div class="block">
				<div class="block-title">
					<h2>Imagen (falsa)</h2>
				</div>
				<div class="form-group">
					<input type="file" name="imagen_real" id="imagen_real">		
					<span class="help-block">En caso de no ingresar esta imagen, se tomará por defecto la versión real</span>	
				</div>
			</div>
		</div>

		<div class="col-sm-3">
			<div class="block">
				<div class="block-title">
					<h2>Red social</h2>
				</div>
				<div class="form-group">
					<select name="red_social" id="red_social">
						<option value="">Selecciona</option>
						<? foreach($redesSociales as $rs): ?>
							<option value="<?=$rs->getField('id')?>"><?=$rs->getField("nombre");?></option>
						<? endforeach; ?>
					</select>				
				</div>
			</div>
		</div>

		<div class="col-sm-3">
			<div class="block">
				<div class="block-title">
					<h2>Categoría</h2>
				</div>
				<div class="form-group">
					<select name="categoria" id="categoria">
						<option value="">Selecciona</option>
					</select>				
				</div>
			</div>
		</div>

		<div class="col-sm-3">
			<div class="block">
				<div class="block-title">
					<h2>Destacado</h2>
				</div>
				<div class="form-group">					
					<label class="control-label" style="line-height:30px">Destacar</label>
					<label class="switch switch-primary"><input type="checkbox"><span></span></label>						
				</div>
			</div>
		</div>

		<div class="col-sm-3">
			<div class="block">
				<div class="form-group form-actions">
					<button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-angle-right"></i> Borrador</button>
		            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Publicar</button>		            
		        </div>	
		    </div>
		</div>

		<div class="col-sm-9">
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
	</form>
</div>

<script src="/js/ckeditor/ckeditor.js"></script>
<script>
CKEDITOR.replace('textarea-ckeditor', {
    toolbar: 'Basic',
    height: 500
});
</script>