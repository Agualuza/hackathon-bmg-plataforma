@extends('layouts.app')

@section('content')

<div class="row mx-1">
    <div class="col-md-4 col-xl-4 col-sm-12">
        <div class="card style-card card-round card-account over-y-no-x">
            <div class="card-block">
            <h4 align="center" class="card-title text-orange">Extrato</h4>
            <div align="center">
            <div>
            @foreach ($transactions as $t)
                <?php
                    $img = "greenup.png";
                    $color = "green";
                    $cashback = NULL;

                    if($t->transaction_sign == "N"){
                        $img = "reddown.png";
                        $color = "red";
                        $cashback = '<span class="badge badge-success label-cashback">+R$ '. App\Transaction::getTransactionCashback($t->id) . ' </span>';
                    }

                ?>
                <div class="card style-card card-round card-border-{{$color}} pt-0">
                    <?php 
                        if($cashback){
                            echo $cashback;
                        }
                    ?>
                    <div class="card-block">
                        <div class="card-flex-content">
                        <h4><img src="../assets/img/{{$img}}"></h4><h4 class="text-right text-{{$color}}"><span>R$ <?php echo money_format('%.2n',$t->amount)?></span></h4>
                        </div>
                        <div class="card-flex-content">
                            <p style="font-size:14px" class="m-b-0 text-{{$color}}">{{ $t->d }}</p>
                            <p style="font-size:14px" class="m-b-0 text-{{$color}}">{{ $tp[$t->transaction_type] }} - {{ $t->note }}</p> 
                        </div>  
                    </div>
                </div>
                @endforeach
            </div>
            </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-xl-4 col-sm-12">
        <div class="card style-card card-round card-account">
            <div class="card-block">
                <h4 align="center" class="card-title text-orange">Conta</h4>
                <h5 align="center" class="card-title text-orange mt-1">R$ {{ $user->balance }}</h5>
                <h5 align="center" class="card-title text-orange text-aux mt-0">100% CDI</h5>
                <br/>
                <h4 align="center" class="card-title text-orange">Cartão de Crédito</h4>
                <h5 align="center" class="card-title text-orange mt-1">Limite disponível</h5>
                <h6 align="center" class="card-title text-orange mt-1">R$ {{ $user->getLimit() }}</h6>
                <div class="mx-3 progress-container progress-primary">
                    <div align="center" class="progress" style="height: 15px;">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width:<?php echo $user->getPercLimit() ?>%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div align="center" class="text-orange">{{ $user->getPercLimit() }}% de R$ {{ $user->credit_limit }}</div>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-xl-4 col-sm-12">
        <div class="card style-card card-round card-account">
            <div class="card-body">
            <h4 align="center" class="card-title text-orange">{{ $user->name }}</h4>
                <div align="center"><img src="../assets/img/user.png"></div>
                <div align="center" style="font-size:14px;" class="text-orange mt-2">Plano {{ $user->getPlan() }}</div>
                <div align="center" style="font-size:14px;" class="text-orange mt-2">{{ $user->cpf }}</div>
                <div align="center" style="font-size:14px;" class="text-orange mt-2">{{ $user->email }}</div>
            </div>
        </div>
    </div>

   
</div>



@endsection

@section('scripts')

@endsection