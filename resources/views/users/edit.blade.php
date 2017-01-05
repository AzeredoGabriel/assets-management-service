@extends('layouts.app') @section('content')
<section class="content-header">
    <h1>
        Adicionar usuário
    </h1>
    <ol class="breadcrumb">
        <li><a href="/dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/users">Usuários</a></li>
        <li class="active">Adicionar usuário</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <form role="form">
            <!-- DADOS BASICOS -->
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><b>Dados Básicos</b></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nome_completo">Nome Completo <span class="text-red">*</span></label>
                            <input type="text" class="form-control" id="nome_completo" name="nome_completo" placeholder="Nome completo">
                        </div>
                         <div class="form-group">
                            <label for="apelido">Apelido<span class="text-red"></span></label>
                            <input type="text" class="form-control" id="apelido" name="apelido" placeholder="Apelido">
                        </div>
                         <div class="form-group">
                            <label for="email">E-mail <span class="text-red">*</span></label>
                            <input type="email" class="form-control" id="email" placeholder="E-mail">
                        </div>
                         <div class="form-group">
                            <label for="cpf">CPF <span class="text-red">*</span></label>
                            <input type="text" class="form-control" id="cpf" placeholder="CPF">
                        </div>
                         <div class="form-group">
                            <label for="nascimento">Nascimento <span class="text-red">*</span></label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="datepicker">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cargo">Cargo <span class="text-red">*</span></label>
                            <input type="text" class="form-control" id="cargo" placeholder="Cargo">
                        </div>
                         <div class="form-group">
                            <label for="perfil">Perfil <span class="text-red">*</span></label>
                            <select name="perfil" id="perfil" class="form-control">
                                <option value="">-Selecione-</option>
                                <option value="1">Mínimo</option>
                                <option value="2">Superior</option>
                                <option value="3">Admin</option>
                                <option value="4">Master</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- DADOS DE LOCALIZACAO -->
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><b>Dados de localização</b></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <div class="form-group">
                            <label for="cep">CEP <span class="text-red">*</span></label>
                            <div class="input-group">
                            <input type="text" class="form-control" name="cep" id="cep" placeholder="Digite o seu cep">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-flat"><i class="fa fa-map-marker"></i></button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="logradouro">Logradouro <span class="text-red">*</span></label>
                            <input type="text" class="form-control" id="logradouro" placeholder="Logradouro">
                        </div>
                        <div class="form-group">
                            <label for="numero">Número <span class="text-red">*</span></label>
                            <input type="text" class="form-control" id="numero" placeholder="Número">
                        </div>
                        <div class="form-group">
                            <label for="complemento">Complemento</label>
                            <input type="text" class="form-control" id="complemento" placeholder="Complemento">
                        </div>
                        <div class="form-group">
                            <label for="bairro">Bairro <span class="text-red">*</span></label>
                            <input type="text" class="form-control" id="bairro" placeholder="Bairro">
                        </div>
                        <div class="form-group">
                            <label for="cidade">Cidade <span class="text-red">*</span></label>
                            <input type="text" class="form-control" id="cidade" placeholder="Cidade">
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado <span class="text-red">*</span></label>
                            <input type="text" class="form-control" id="estado" placeholder="Estado">
                        </div>
                    </div>
                </div>
            </div>
            <!-- DESCRICAO -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><b>Faça uma breve descrição sobre você</b></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <div class="form-group">
                            <label>Descrição</label>
                            <textarea class="form-control" rows="3" placeholder="Coloque uma breve descrição sobre você..."></textarea>
                        </div>
                         <div class="form-group">
                            <label for="login">Login <span class="text-red">*</span></label>
                            <input type="text" class="form-control" id="login" name="login" placeholder="Login">
                        </div>
                         <div class="form-group">
                            <label for="senha">Senha<span class="text-red">*</span></label>
                            <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
                        </div>
                         <div class="form-group">
                            <label for="repita_senha">Repita a senha <span class="text-red">*</span></label>
                            <input type="password" class="form-control" id="repita_senha" placeholder="Repita a senha">
                        </div>
                    </div>


                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
