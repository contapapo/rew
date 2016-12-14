@extends('layouts.master')

@section('contenu')
    <br>
    <div class="col-sm-offset-1 col-sm-1">
      <div class="container">
        <div class="row">
          <div class="col-lg-10">
            <div class="panel panel-primary">
                <div class="panel-heading">
                   <h3 class="panel-title"><i class="fa fa-chain-broken" aria-hidden="true"></i> {{ "Devices" }}</h3>
                  <div class="btn-group">
                    {!! Form::open(['url' => 'comp', 'files' => true]) !!}
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
                                <th class="sorter-metatext" data-column-name="">{{ (" ") }} <i class="fa fa-sort"></i></th>
                                <th class="sorter-metatext" data-column-name="">{{ ("SITE OUT OF DATE") }} <i class="fa fa-sort"></i></th>
                                <th class="sorter-metatext" data-column-name="">{{ ("SN") }} <i class="fa fa-sort"></i></th>
                                <th class="sorter-metatext" data-column-name="">{{ ("CET(MAX)") }} <i class="fa fa-sort"></i></th>
                            </tr>
                            </thead>
                            @foreach ($filteredResults as $filter)
                            <tbody>
                              <tr>
                               <td>{{ $loop->iteration }}</td>
                               <td>{{ $filter->site }}</td>
                               <td>{{ $filter->sn }}</td>
                               <td>{{ $filter->cet }}</td>
                              </tr>
                            </tbody>
                            @endforeach
                        </table>
                            
                        <table id="table-users" class="tablesorter table table-bordered table-hover table-striped" data-sortlist="[[0, 0]]">
                            <thead>
                            <tr>
                                <th class="sorter-metatext" data-column-name="">{{ (" ") }} <i class="fa fa-sort"></i></th>
                                <th class="sorter-metatext" data-column-name="">{{ ("SITE NOT WORKING") }} <i class="fa fa-sort"></i></th>
                                <th class="sorter-metatext" data-column-name="">{{ ("SN") }} <i class="fa fa-sort"></i></th>
                                <th class="sorter-metatext" data-column-name="">{{ ("CET(MAX)") }} <i class="fa fa-sort"></i></th>
                            </tr>
                            </thead>
                            @foreach ($lost_meter as $filter)
                            <tbody>
                              <tr>
                               <td>{{ $loop->iteration }}</td>
                               <td>{{ $filter->site }}</td>
                               <td>{{ $filter->sn }}</td>
                               <td>{{ $filter->cet }}</td>
                              </tr>
                            </tbody>
                            @endforeach                        
                        </table>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@stop