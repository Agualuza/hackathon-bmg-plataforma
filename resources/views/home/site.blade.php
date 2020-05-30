@extends('layouts.app')

@section('content')
  <div class="page-header clear-filter" filter-color="orange">
    <div class="page-header-image" style="background-image:url(../assets/img/bg.png)"></div>
    <div class="content">
      <div class="row">
        <div class="col-md-6 col-sm-12 col-12 ml-auto mr-auto">
          <div class="card card-login card-plain">
            <form class="form" action="login" method="post" >
              @csrf
              <div class="card-header text-center mt-2">
                <div class="logo-container">
                <img src="../assets/img/duda.png">
                </div>
              </div>
              <b>Duda Academy<b>
              <div class="card-body">
                <div class="input-group no-border input-lg">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="now-ui-icons users_circle-08"></i>
                    </span>
                  </div>
                  <input type="email" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="input-group no-border input-lg">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="now-ui-icons text_caps-small"></i>
                    </span>
                  </div>
                  <input type="password" name="password" placeholder="Password" class="form-control" />
                </div>
              </div>
              <div class="card-footer text-center">
                <input class="btn btn-primary btn-round btn-lg btn-block" type="submit" value="Entrar">
                <div class="pull-left">
                  <h6>
                    <a href="#" class="link">Abrir conta</a>
                  </h6>
                </div>
                <div class="pull-right">
                  <h6>
                    <a href="#" class="link">Precisa de Ajuda?</a>
                  </h6>
                </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection  