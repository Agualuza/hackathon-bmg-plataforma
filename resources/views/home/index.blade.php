@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-4 col-xl-3 col-sm-10">
        <div class="card style-card card-round card-border-orange">
            <div class="card-block">
                <h6 class="m-b-20">Cashback</h6>
                <div class="card-flex-content">
                <h2><i class="now-ui-icons loader_refresh"></i></h2><h2 class="text-right"><span>{{ $user->profile->cashback }}%</span></h2>
                </div>
                <div class="card-flex-content">
                    <p style="font-size:14px" class="m-b-0">No programa Volta Pra_Mim</p> 
                </div>  
            </div>
        </div>
    </div>

    <div class="col-md-4 col-xl-3 col-sm-10">
        <div class="card style-card card-round card-border-orange">
            <div class="card-block">
                <h6 class="m-b-20">Juros</h6>
                <div class="card-flex-content">
                <h2><i class="now-ui-icons business_money-coins"></i></h2><h2 class="text-right"><span>{{ $user->profile->loan }}%</span></h2>
                </div>
                <div class="card-flex-content">
                    <p style="font-size:14px" class="m-b-0">a.a em empréstimos pessoais</p> 
                </div>  
            </div>
        </div>
    </div>

    <div>
        <div class="card card-graphic card-round" style="width: 30rem;">
            <div class="card-body">
                <div align="center"><h4 class="card-title text-orange">Seu Perfil</h4></div>
                <div align="center"><h6 class="card-title text-orange">{{ $user->profile->profile_name }}</h6></div>
                <div id="canvas-holder" style="width:100%">
                     <canvas id="polar-chart" width="800" height="450"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div align="center">
        <h3 class="text-orange">Sugestões de Leituras</h3>
            <div>
                <div class="card card-round" style="width: 30rem;">
                    <div class="card-body">
                        <div class="col-12">
                            @foreach ($posts as $post)
                            <div class="card card-post card-round col-5 mx-1">
                                <img class="card-img-top" src="../assets/img/{{$post->img}}">
                                <div class="card-body">
                                    <p class="text-orange post-title">{{ $post->title }}</p>
                                    <a href="leitura/2" class="btn btn-primary">Ler</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>



@endsection

@section('scripts')
<script>
    $(document).ready(() => {
    
    var arrayHabitsScores = [];
    var arrayHabitsNames = [];

    <?php foreach ($user->user_habit as $value) { ?>
        arrayHabitsScores.push(<?php echo $value->score?>);
        arrayHabitsNames.push('<?php echo $value->habit->habit_name?>');
    <?php } ?>
   
    new Chart(document.getElementById("polar-chart"), {
    type: 'polarArea',
    data: {
      labels: arrayHabitsNames,
      datasets: [
        {
          label: "Population (millions)",
          backgroundColor: ["#3e95cd73", "#8e5ea273","#9e9e9e73","#3cba9f73","#cddc3973","#c4585073"],
          data: arrayHabitsScores
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Gráfico dos 6 hábitos'
      }
    }
});
    });
		
    </script>
    
@endsection