@extends('layouts.master')

@section('contenu')
<br>
<div class="col-sm-offset-1 col-sm-1">
    <div class="container">
      <div class="row">
        <div class="col-lg-10">
            <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title"><i class="fa fa-table" aria-hidden="true"></i> {{ "ERP-CH Monthly" }}</h3>
                   <div class="btn-group">
                   {!! Form::open(['url' => 'erpmonthly', 'files' => true]) !!}
                   <br>
                   <button type="submit" class="btn btn-primary">
                       <i class="fa fa-download" aria-hidden="true"></i> Save
                   </button>
                   {!! Form::close() !!}
                   </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="table-users" class="tablesorter table table-bordered table-hover table-striped" >
                            <thead>
                            <tr>
                                <th  data-column-name="">{{ ("") }} <i class="fa fa-sort"></i></th>
                                <th class="sorter-metatext" data-column-name="">{{ ("SITE") }} <i class="fa fa-sort"></i></th>
                                <th class="sorter-metatext" data-column-name="">{{ ("EAN1") }} <i class="fa fa-sort"></i></th>
                                <th class="sorter-metatext" data-column-name="">{{ ("S00") }} <i class="fa fa-sort"></i></th>
                                <th class="sorter-metatext" data-column-name="">{{ ("AP") }} <i class="fa fa-sort"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($result as $user)
                              <tr>
                               <td>{{ $loop->iteration }}</td>
                               <td>{{ $user->site }}</td>
                               <td>{{ $user->ean1 }}</td>
                               <td>{{ $user->s00 }}</td>
                               <td>{{ $user->ap }}</td>
                              </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
@stop