<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="gi gi-notes_2"></i>Nueva nota
        </h1>
    </div>
</div>

<div class="row">
	<form action="page_forms_general.php" method="post" class="" onsubmit="return false;">
		<div class="col-sm-9">
			<div class="block">
			    <!-- Normal Form Title -->
			    <div class="block-title">
			        <div class="block-options pull-right">            
			        </div>
			        <h2>Contenido</h2>	
			    </div>
			    <!-- END Normal Form Title -->

			    <!-- Normal Form Content -->	    
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
			            <input type="text" id="pregunta" name="pregunta" class="form-control" placeholder="Pregunta">
			        </div>

			    <!-- END Normal Form Content -->
			</div>
		</div>

		<div class="col-sm-3">
			<div class="block">
				<div class="form-group form-actions">
		            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Publicar</button>
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