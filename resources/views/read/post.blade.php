@extends('layouts.app')

@section('content')

<div class="row mx-1">
<div class="col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card card-round col-12">
        <div>
            <?php echo $post->content; ?>
        </div>
    </div>
</div>



@endsection

@section('scripts')

@endsection