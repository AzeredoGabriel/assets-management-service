<form action="process" method="post" enctype="multipart/form-data">
    Informe as tags (separadas por vírgula) e o arquivo desejado: 
    <br>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="text" name="tags" id="tags"> <br>
    <input type="file" name="files" id="files"> <br>
    
    <input type="submit" value="Enviar" name="submit">
</form>