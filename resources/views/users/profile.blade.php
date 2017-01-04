@extends('layouts.app') @section('content')
<section class="content-header">
    <h1>
        Perfil de <b>{{ $person->name }}</b>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="/users">Usuários</a></li>
        <li class="active">Perfil</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-primary">
                <!-- <div class="overlay">
                  <i class="fa fa-refresh fa-spin"></i>
                </div> -->
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="AdminLTE/dist/img/user2-160x160.jpg" alt="User profile picture">
                    <h3 class="profile-username text-center">{{ $person->name }}</h3>
                    <p class="text-muted text-center">#job#</p>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Upload de arquivos</b> <a class="pull-right">1,322</a>
                        </li>
                        <li class="list-group-item">
                            <b>Transações</b> <a class="pull-right">543</a>
                        </li>
                        <li class="list-group-item">
                            <b>Valor atual</b> <a class="pull-right">R$ 550,32</a>
                        </li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <!-- About Me Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Sobre {{ $person->name }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong><i class="fa fa-book margin-r-5"></i> Trabalho</strong>
                    <p class="text-muted">
                        #trabalho#
                    </p>
                    <hr>
                    <strong><i class="fa fa-map-marker margin-r-5"></i> Endereço</strong>
                    <p class="text-muted">#endereco#</p>
                    <hr>
                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Descrição</strong>
                    <p>#descricao#</p>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#timeline" data-toggle="tab" aria-expanded="false">Atividade <i class="fa fa-history"></i></a></li>
                    <li class=""><a href="#settings" data-toggle="tab" aria-expanded="false">Editar dados <i class="fa fa-edit"></i></a></li>
                    <li class=""><a href="#payment" data-toggle="tab" aria-expanded="false">Pagamento <i class="fa fa-credit-card"></i></a></li>
                </ul>
                <div class="tab-content">
                    <!-- /.tab-pane -->
                    <div class="tab-pane active" id="timeline">
                        <div class="box">
                            <!-- <div class="overlay">
                              <i class="fa fa-refresh fa-spin"></i>
                            </div> -->
                            <div class="box-body">
                                <!-- The timeline -->
                                <ul class="timeline timeline-inverse">
                                    <!-- timeline time label -->
                                    <li class="time-label">
                                        <span class="bg-purple">
                                      10 Fev. 2016
                                    </span>
                                    </li>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <li>
                                        <i class="fa fa-camera bg-purple"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>
                                            <h3 class="timeline-header"><a href="#">Você</a> subiu 20 novas fotos</h3>
                                            <div class="timeline-body">
                                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                            </div>
                                        </div>
                                    </li>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <li>
                                        <i class="fa fa-camera bg-purple"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>
                                            <h3 class="timeline-header"><a href="#">Você</a> subiu 20 novas fotos</h3>
                                            <div class="timeline-body">
                                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                            </div>
                                            <div class="timeline-body">
                                                Você subiu 20 novas fotos com algumas tags...
                                            </div>
                                            <div class="timeline-footer">
                                                <a class="btn btn-primary btn-xs">imoveis</a>
                                                <a class="btn btn-danger btn-xs">2 quartos</a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- END timeline item -->
                                    <!-- timeline time label -->
                                    <li class="time-label">
                                        <span class="bg-green">
                                      20 Fev. 2016
                                    </span>
                                    </li>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <li>
                                        <i class="fa fa-camera bg-purple"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>
                                            <h3 class="timeline-header"><a href="#">Você</a> subiu 20 novas fotos</h3>
                                            <div class="timeline-body">
                                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                            </div>
                                        </div>
                                    </li>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <li>
                                        <i class="fa fa-camera bg-purple"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>
                                            <h3 class="timeline-header"><a href="#">Você</a> subiu 20 novas fotos</h3>
                                            <div class="timeline-body">
                                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                            </div>
                                            <div class="timeline-body">
                                                Você subiu 20 novas fotos com algumas tags...
                                            </div>
                                            <div class="timeline-footer">
                                                <a class="btn btn-primary btn-xs">imoveis</a>
                                                <a class="btn btn-danger btn-xs">2 quartos</a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- END timeline item -->
                                    <li>
                                        <i class="fa fa-clock-o bg-gray"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="settings">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Nome</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputName" placeholder="Nome">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Apelido</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputName" placeholder="Apelido">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-2 control-label">E-mail</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="E-mail">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Trabalho</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Endereço</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputExperience" class="col-sm-2 control-label">Descrição</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSkills" class="col-sm-2 control-label">Skills</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success pull-right">Atualizar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="payment">
                        <div class="alert alert-warning alert-dismissible">
                            <!--  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> -->
                            <h4><i class="icon fa fa-warning"></i> Cuidado!</h4> Alterando os dados de pagamento, também pode-se altrar o funcionamento do sistema para você e outros usuário da sua conta.
                        </div>
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs pull-right">
                                <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-question-circle"></i></a></li>
                                <li class="pull-right"><a href="#" class="text-muted" data-toggle="tooltip" title="Configurações de pagamento" data-placement="bottom"><i class="fa fa-gear"></i></a></li>
                                <li class=""><a href="#tab_3-2" data-toggle="tab" aria-expanded="false"><i class="fa fa-paypal"></i>  Paypal</a></li>
                                <li class=""><a href="#tab_2-2" data-toggle="tab" aria-expanded="false"><i class="fa fa-cc-mastercard"></i>  Mastercard</a></li>
                                <li class="active"><a href="#tab_1-1" data-toggle="tab" aria-expanded="true"><i class="fa fa-cc-visa"></i>  Visa</a></li>
                                <li class="pull-left header"><i class="fa fa-usd"></i> Faturas</li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1-1">
                                    <div class="box">
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <th>Mês/Ano</th>
                                                        <th>Valor Pago</th>
                                                        <th>Ultrapassou</th>
                                                        <th>Ultrapassou (%)</th>
                                                        <th>Fatura detalhada</th>
                                                    </tr>
                                                    <tr>
                                                        <td><b>09/2016</b></td>
                                                        <td>Pagamento no valor de <b class="text-red">R$ 650,00</b></td>
                                                        <td>
                                                            <div class="progress progress-striped progress-xs active">
                                                                <div class="progress-bar progress-bar-danger" style="width: 75%"></div>
                                                            </div>
                                                        </td>
                                                        <td><span class="badge bg-red"><b>75%</b></span></td>
                                                        <td>
                                                            <button class="btn btn-primary"><i class="fa fa-bars"></i> Detalhar</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>10/2016</b></td>
                                                        <td>Pagamento no valor de <b class="text-blue">R$ 300,00</b></td>
                                                        <td>
                                                            <div class="progress progress-striped progress-xs active">
                                                                <div class="progress-bar progress-bar-blue" style="width: 20%"></div>
                                                            </div>
                                                        </td>
                                                        <td><span class="badge bg-blue">20%</span></td>
                                                        <td>
                                                            <button class="btn btn-primary"><i class="fa fa-bars"></i> Detalhar</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>11/2016</b></td>
                                                        <td>Pagamento no valor de <b class="text-yellow">R$ 450,00</b></td>
                                                        <td>
                                                            <div class="progress progress-xs progress-striped active">
                                                                <div class="progress-bar progress-bar-yellow" style="width: 50%"></div>
                                                            </div>
                                                        </td>
                                                        <td><span class="badge bg-yellow">50%</span></td>
                                                        <td>
                                                            <button class="btn btn-primary"><i class="fa fa-bars"></i> Detalhar</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>12/2016</b></td>
                                                        <td>Pagamento no valor de <b class="text-red">R$ 780,00</td>
                                                        <td>
                                                            <div class="progress progress-xs progress-striped active">
                                                                <div class="progress-bar progress-bar-danger" style="width: 90%"></div>
                                                            </div>
                                                        </td>
                                                        <td><span class="badge bg-red">90%</span></td>
                                                        <td><button class="btn btn-primary"><i class="fa fa-bars"></i> Detalhar</button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_2-2">
                                    <button class="btn btn-success"><i class="fa fa-plus"></i> Adicionar Mastercard</button>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_3-2">
                                    <button class="btn btn-success"><i class="fa fa-plus"></i> Adicionar paypal</button>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
@endsection
