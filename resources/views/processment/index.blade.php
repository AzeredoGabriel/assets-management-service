<form action="form_direct_url" method="post" enctype="multipart/form-data">
    Informe as tags (separadas por vírgula) e o arquivo desejado: 
    <br>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	
	<input type="hidden" 	name="project" 	id="project" value="50cd0fa95639f1d0bd57af0b68f73633"> <br>
	<input type="text" 		name="tags" 	id="tags"> <br>
    <input type="file" 		name="files" 	id="files"> <br>
    
    <input type="submit" value="Enviar" name="submit">
</form>