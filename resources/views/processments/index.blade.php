@extends('layouts.app')

@section('content')
<section class="content-header">
	<h1>
		Processamentos
	</h1>
	<ol class="breadcrumb">
		<li><a href="/dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Processamentos</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-6">
	    	<!-- general form elements -->
			<div class="box box-primary">
			    <div class="box-header with-border">
			        <h3 class="box-title">Upload e processamento simples</h3>
			    </div>
			    <!-- /.box-header -->
			    <!-- form start -->
			    <form role="form">
			        <div class="box-body">
				        <div class="form-group">
			                <label for="exampleInputFile">Arquivos <span class="red">*</span></label>
			                <input type="file" id="exampleInputFile" multiple>
			                <p class="help-block">Faça upload dos arquivos à serem processados.</p>
			            </div>
			            <div class="form-group">
			                <label>Tags:</label>
			                <select class="form-control select2" multiple="multiple" data-placeholder="Escolha as tags para esse arquivo." style="width: 100%;">
				                <option>Imovel</option>
				                <option>teste</option>
				                <option>1052</option>
				                <option>copacabana</option>
				                <option>2 quartos</option>
				                <option>area</option>
				            </select>
			            </div>
			            <div class="form-group">
			                <label>Processamentos:</label>
			                <select class="form-control select2" multiple="multiple" data-placeholder="Escolha os processamentos para esse arquivo." style="width: 100%;">
				                <option>Marca D'Água</option>
				                <option>Otimização</option>
				                <option>Compactação</option>
				                <option>Filtro Preco e Branco</option>
				                <option>Brilho</option>
				            </select>
			            </div>
			        </div>
			        <!-- /.box-body -->
			        <div class="box-footer">
			            <button type="submit" class="btn btn-primary"><i class="fa fa-gear"></i> Processar</button>
			        </div>
			    </form>
			</div>
			<!-- /.box -->
	    </div>
	</div>
</section>

@endsection
