@extends('layouts.app') @section('content')
<section class="content-header">
    <h1>
        Configuração de <b>Permissões</b>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Configurar permissões</a>
        </li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <form role="form">
            <!-- DADOS BASICOS -->
            <div class="col-md-6">
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i> Atenção!</h4> Qualquer alteração feita nessa sessão poderá afetar a utilização do sistema para você e outros usuários.
                </div>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><b>Escolha o perfil e marque as permissões relacionadas.</b></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <div class="form-group">
                            <label for="perfil">Selecione o perfil:</label>
                            <select name="perfil" id="perfil" class="form-control">
                                <option value="">-Selecione-</option>
                                <option value="1">Mínimo</option>
                                <option value="2">Superior</option>
                                <option value="3">Admin</option>
                                <option value="4">Master</option>
                            </select>
                        </div>
                        
                        <div class="box hide">
                            <div class="box-body">
                                <h3 class="box-title">
                                    <b>Nenhum perfil selecionado ainda :(</b>
                                </h3>
                            </div>
                        </div>
                        
                        <div class="box">
                           <!--  <div class="overlay">
                              <i class="fa fa-refresh fa-spin"></i>
                            </div> -->
                            <div class="box-body">
                                <fieldset class="form-group">
                                    <legend>Permissões para o perfil <b>Mínimo</b></legend>
                                    <div class="box box-default box-solid">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Usuários</h3>
                                            <div class="box-tools pull-right">
                                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-times"></i>
                                                </button>
                                            </div>
                                            <!-- /.box-tools -->
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="permissions" value="1" checked> Acessar usuários
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="permissions" value="2"> Adicionar usuários
                                                </label>
                                            </div>
                                            <div class="form-check disabled">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="permissions" value="3" checked> Editar usuários
                                                </label>
                                            </div>
                                            <div class="form-check disabled">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="permissions" value="4" checked> Remover usuários
                                                </label>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                    <div class="box box-default box-solid">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Projetos</h3>
                                            <div class="box-tools pull-right">
                                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-times"></i>
                                                </button>
                                            </div>
                                            <!-- /.box-tools -->
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="permissions" value="1" checked> Acessar Projetos
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="permissions" value="2"> Adicionar Projetos
                                                </label>
                                            </div>
                                            <div class="form-check disabled">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="permissions" value="3" checked> Editar Projetos
                                                </label>
                                            </div>
                                            <div class="form-check disabled">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="permissions" value="4" checked> Remover Projetos
                                                </label>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                    <div class="box box-default box-solid">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Relatórios</h3>
                                            <div class="box-tools pull-right">
                                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-times"></i>
                                                </button>
                                            </div>
                                            <!-- /.box-tools -->
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="permissions" value="1" checked> Relatório de consumo
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="permissions" value="2"> Relatório de porcentagem
                                                </label>
                                            </div>
                                            <div class="form-check disabled">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="permissions" value="3" checked> Relatório de gastos
                                                </label>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                    <div class="box box-default box-solid">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Processos</h3>
                                            <div class="box-tools pull-right">
                                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-times"></i>
                                                </button>
                                            </div>
                                            <!-- /.box-tools -->
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="permissions" value="1" checked> Acessar Processos
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="permissions" value="2"> Adicionar Processos
                                                </label>
                                            </div>
                                            <div class="form-check disabled">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="permissions" value="3" checked> Editar Processos
                                                </label>
                                            </div>
                                            <div class="form-check disabled">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="permissions" value="4" checked> Remover Processos
                                                </label>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
