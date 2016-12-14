@extends('layouts.master')

@section('contenu')
<br>
<div class="col-sm-offset-1 col-sm-1">
  <div class="container">
    <div class="row">
      <div class="col-lg-10">
        <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-table" aria-hidden="true"></i> {{ "ERP-CH Daily" }}</h3>
               <div class="btn-group">
                   {!! Form::open(['url' => 'erpdaily', 'files' => true]) !!}
                   <br>
                   <button type="submit" class="btn btn-primary">
                       <i class="fa fa-download" aria-hidden="true"></i> Save
                   </button>
                   {!! Form::close() !!}
               </div>
            </div>
             <div class="panel-body">
                <div class="table-responsive">
                    <table id="table-users" class="tablesorter table table-bordered table-hover table-striped" data-sortlist="[[0, 0]]">
                        <thead>
                          <tr>
                            <th class="sorter-metatext" data-column-name="">{{ ("") }} <i class="fa fa-sort"></i></th>
                            <th class="sorter-metatext" data-column-name="">{{ ("SITE") }} <i class="fa fa-sort"></i></th>
                            <th class="sorter-metatext" data-column-name="">{{ ("EAN1") }} <i class="fa fa-sort"></i></th>
                            <th class="sorter-metatext" data-column-name="">{{ ("JOUR") }} <i class="fa fa-sort"></i></th>
                            <th class="sorter-metatext" data-column-name="">{{ ("KWH") }} <i class="fa fa-sort"></i></th>
                          </tr>
                        </thead>

                        <tbody>
                        @foreach ($result as $user)
                          <tr>
                           <td>{{ $loop->iteration }}</td>
                           <td>{{ $user->site }}</td>
                           <td>{{ $user->ean1 }}</td>
                           <td>{{ $user->jour }}</td>
                           <td>{{ $user->kwh }}</td>
                          </tr>
                        @endforeach
                      </tbody>
                </div>
             </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop