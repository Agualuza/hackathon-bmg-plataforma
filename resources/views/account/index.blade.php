@extends('layouts.app')

@section('content')

<div class="row mx-1">
    <div class="col-md-4 col-xl-4 col-sm-12">
        <div class="card style-card card-round card-account over-y-no-x">
            <div class="card-block">
            <h4 align="center" class="card-title text-orange">Extrato</h4>
            <div align="center">
            <div>
                <div class="card style-card card-round card-border-green pt-0">
                    <div class="card-block">
                        <div class="card-flex-content">
                        <h4><img src="../assets/img/greenup.png"></h4><h4 class="text-right text-green"><span>R$2300,00</span></h4>
                        </div>
                        <div class="card-flex-content">
                            <p style="font-size:14px" class="m-b-0 text-green">23/05/2020</p>
                            <p style="font-size:14px" class="m-b-0 text-green">Depósito em conta</p> 
                        </div>  
                    </div>
                </div>
                <div class="card style-card card-round card-border-red pt-0">
                    <span class="badge badge-success label-cashback">+R$0,17</span>
                    <div class="card-block">
                        <div class="card-flex-content">
                        <h4><img src="../assets/img/reddown.png"></h4><h4 class="text-right text-red"><span>R$23,00</span></h4>
                        </div>
                        <div class="card-flex-content">
                            <p style="font-size:14px" class="m-b-0 text-red">23/05/2020</p>
                            <p style="font-size:14px" class="m-b-0 text-red">Crédito - Uber</p> 
                        </div>  
                    </div>
                </div>
                <div class="card style-card card-round card-border-red pt-0">
                <span class="badge badge-success label-cashback">+R$0,12</span>
                    <div class="card-block">
                        <div class="card-flex-content">
                        <h4><img src="../assets/img/reddown.png"></h4><h4 class="text-right text-red"><span>R$17,00</span></h4>
                        </div>
                        <div class="card-flex-content">
                            <p style="font-size:14px" class="m-b-0 text-red">23/05/2020</p>
                            <p style="font-size:14px" class="m-b-0 text-red">Débito - Ifood</p> 
                        </div>  
                    </div>
                </div>
            </div>
            </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-xl-4 col-sm-12">
        <div class="card style-card card-round card-account">
            <div class="card-block">
                <h4 align="center" class="card-title text-orange">Conta</h4>
                <h5 align="center" class="card-title text-orange mt-1">R$ 2260,29</h5>
                <h5 align="center" class="card-title text-orange text-aux mt-0">100% CDI</h5>
                <br/>
                <h4 align="center" class="card-title text-orange">Cartão de Crédito</h4>
                <h5 align="center" class="card-title text-orange mt-1">Limite disponível</h5>
                <h6 align="center" class="card-title text-orange mt-1">R$ 2365,00</h6>
                <div class="mx-3 progress-container progress-primary">
                    <div align="center" class="progress" style="height: 15px;">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width:45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div align="center" class="text-orange">45% de R$ 4300,00</div>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-xl-4 col-sm-12">
        <div class="card style-card card-round card-account">
            <div class="card-body">
            <h4 align="center" class="card-title text-orange">Enzo Carter</h4>
                <div align="center"><img src="../assets/img/user.png"></div>
                <div align="center" style="font-size:14px;" class="text-orange mt-2">Plano Flex</div>
                <div align="center" style="font-size:14px;" class="text-orange mt-2">000.000.000-00</div>
                <div align="center" style="font-size:14px;" class="text-orange mt-2">enzo@fkmail.bmg</div>
            </div>
        </div>
    </div>

   
</div>



@endsection

@section('scripts')

@endsection