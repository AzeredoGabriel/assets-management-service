@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Lista de usuários
    </h1>
    <ol class="breadcrumb">
        <li><a href="/dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Usuários</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
             <!-- /.box-header -->
            <div class="box">
                <div class="box-header">
                    <div class="box-title">Todos os usuários da conta <b>inforce</b></div>
                    <a href="users/create" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Adicionar usuário</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="projects-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Cpf</th>
                                <th>Data de Criação</th>
                                <th>Data de Atualização</th>
                                <th></i> Detalhes</th>
                                <th></i>Atualizar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->person['name'] }}</td>
                                    <td>{{ $user->person['cpf'] }}</td>
                                    <td>{{ Carbon\Carbon::parse($user->person['created_at'])->format('d/m/Y H:i') }}</td>
                                    <td>{{ Carbon\Carbon::parse($user->person['updated_at'])->format('d/m/Y H:i') }}</td>
                                    <td><a href="users/profile/{{ $user->person['id'] }}" class="btn btn-primary"><i class="fa fa-plus"></i> Detalhes</a></td>
                                    <td><a class="btn btn-warning"><i class="fa fa-edit"></i> Alterar</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
@endsection
