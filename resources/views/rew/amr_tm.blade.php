@extends('layouts.master')

@section('contenu')
<br>
<div class="col-sm-offset-1 col-sm-8">
  <div class="container">
    <div class="row">
        <div class="col-lg-10">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-table" aria-hidden="true"></i> {{ "AMR-TM" }}</h3>
                    <div class="btn-group">
                    {!! Form::open(['url' => 'amr', 'files' => true]) !!}
                    <br>
                    <button type="submit" class="btn btn-primary">
                    <i class="fa fa-download" aria-hidden="true"></i> Save
                    </button>
                    {!! Form::close() !!}
                    </div>
                </div>

                <div class="panel-body">
                  <div class="table-responive ">
                    <table id="table-users" class="tablesorter-green table table-bordered table-hover table-striped" data-sortlist="[[0, 0]]">
                        <thead>
                        <tr>
                         <th class="sorter-metatext" data-column-name="">{{ ("") }} <i class="fa fa-sort"></i></th>
                         <th class="sorter-metatext" data-column-name="">{{ ("SITE") }} <i class="fa fa-sort"></i></th>
                         <th class="sorter-metatext" data-column-name="">{{ ("SN") }} <i class="fa fa-sort"></i></th>
                         <th class="sorter-metatext" data-column-name="">{{ ("CET(MAX)") }} <i class="fa fa-sort"></i></th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($result as $user)
                        <tr>
                         <td>{{ $loop->iteration }}</td>
                         <td>{{ $user->site }}</td>
                         <td>{{ $user->sn }}</td>
                         <td>{{ $user->cet }}</td>
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