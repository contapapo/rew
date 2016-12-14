@extends('rew.template')

@section('contenu')
    <br>
    <div class="col-sm-offset-3 col-sm-6">
        <div class="panel panel-info">
            <div class="panel-heading">Contactez-moi</div>
            <div class="panel-body">
           
                              <div class="container">

                  @foreach ($device as $user)
<tr>
                      {{ $user->Site }}
</tr>
                  @endforeach

              </div>
              
            </div>
        </div>
    </div>
@endsection