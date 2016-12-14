@extends('rew.template')

@section('contenu')
    <br>
    <div class="col-sm-offset-2 col-sm-8">
        
                              <div class="container">

    <div class="row">
        <div class="col-lg-16">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-users"></i> {{ "Devices" }}</h3>

                            <div class="btn-group">
                               
                {!! Form::open(['url' => 'query5', 'files' => true]) !!}

                <br>
                <button type="submit" class="btn btn-primary">
                <i class="fa fa-download" aria-hidden="true"></i> Save
                </button>

                            
                {!! Form::close() !!}



                                <ul class="dropdown-menu">
                                    <li><a href=""><i class="fa fa-user fa-fw" aria-hidden="true"></i> {{ ("RESERVATION") }}</a></li>
                                    <li><a href=""><i class="fa fa-edit fa-fw" aria-hidden="true"></i> {{ ("EDIT") }}</a></li>
                                    <li><a href=""><i class="fa fa-home fa-fw" aria-hidden="true"></i> {{ ("ADDRESS") }}</a></li>

                                    <li class="divider"></li>
                                    <li>
                                        <a href="bill">
                                            <i class="fa fa-euro fa-fw" aria-hidden="true"></i>  {{ ("BILL") }}</a></li>
                                    </li>

                                    <li class="divider"></li>
                                    <li>
                                       
                                    </li>
                                </ul>
                            </div>

                </div>

                                  <div class="panel-body">
                    <div class="table-responsive">
                        <table id="table-users" class="tablesorter table table-bordered table-hover table-striped" data-sortlist="[[0, 0]]">
                            <thead>
                            <tr>
                                <th class="sorter-metatext" data-column-name="">{{ ("Site") }} <i class="fa fa-sort"></i></th>
                                <th class="sorter-metatext" data-column-name="">{{ ("SN") }} <i class="fa fa-sort"></i></th>
                                <th class="sorter-metatext" data-column-name="">{{ ("GroupeStark") }} <i class="fa fa-sort"></i></th>
                                <th class="sorter-metatext" data-column-name="">{{ ("IDCompteur") }} <i class="fa fa-sort"></i></th>
                                <th class="sorter-metanum" data-column-name="">{{ ("Type") }} <i class="fa fa-sort"></i></th>
                                <th class="sorter-metanum" data-column-name="">{{ ("DateFirst") }} <i class="fa fa-sort"></i></th>
                                <th class="sorter-metanum" data-column-name="">{{ ("Nom") }} <i class="fa fa-sort"></i></th>
                                <th class="sorter-metanum" data-column-name="">{{ ("Telephone") }} <i class="fa fa-sort"></i></th>
                                <th class="sorter-metanum" data-column-name="">{{ ("EAN1") }} <i class="fa fa-sort"></i></th>
                                <th class="sorter-metanum" data-column-name="">{{ ("S00") }} <i class="fa fa-sort"></i></th>
                                <th class="sorter-metanum" data-column-name="">{{ ("S02") }} <i class="fa fa-sort"></i></th>
                           <!--     <th data-column-name="flag_enabled">Action <i class=""></i></th>   -->
                            </tr>
                            </thead>

                  @foreach ($device as $user)
<tr>
                     <td>{{ $user->Site }}</td>
                     <td>{{ $user->SN }}</td>
                     <td>{{ $user->cet }}</td>
                     <td>{{ $user->IDCompteur }}</td>
                     <td>{{ $user->Type }} </td>
                     <td>{{ $user->DateFirst }} </td>
                     <td>{{ $user->Nom }} </td>
                     <td>{{ $user->Telephone }} </td>
                     <td>{{ $user->EAN1 }} </td>
                     <td>{{ $user->S00 }} </td>
                     <td>{{ $user->S02 }} </td>
</tr>
                  @endforeach

              </div>


            </div>
            </div>
            </div>
        </div>
    </div>

       <script>
        // These options get set by Twig when the page is rendered
       
        var table_id = "table-users";

        $(document).ready(function() {

            // Callback for generating the AJAX url
            function ajaxGenerateUrlCallback(table, url) {
                var table_state = getTableStateVars(table);
                $.extend(table.config.pager.ajaxObject.data, table_state);
                // Limit to a particular primary group
                if (primary_group) {
                    table.config.pager.ajaxObject.data.primary_group = primary_group;
                }
                return url;
            }

            // Callback for processing data returned from API
            function ajaxProcessingCallback(data) {
                var $table = $(this);
                if (data) {
                    //console.log(data);
                    var col, row, txt,
                    // make # column show correct value
                            index = $('#' + table_id)[0].config.pager.page,
                            json = {},
                            rows = '';
                    size = data['rows'].length;
                    // Render table cells via Handlebars
                    var template_0 = Handlebars.compile($("#user-table-column-info").html());
                    var template_1 = Handlebars.compile($("#user-table-column-registered-since").html());
                    var template_2 = Handlebars.compile($("#user-table-column-last-sign-in").html());
                    var template_3 = Handlebars.compile($("#user-table-column-actions").html());
                    for (row = 0; row < size; row++){
                        rows += '<tr>';
                        var cell_data = {
                            "user" : data['rows'][ row ],       // It is safe to use the data from the API because Handlebars escapes HTML
                            "site" : site
                        };
                        rows += template_0(cell_data);
                        rows += template_1(cell_data);
                        rows += template_2(cell_data);
                        rows += template_3(cell_data);
                        rows += '</tr>';
                    }
                    json.total = data['count'];  // Get total rows without pagination
                    json.filteredRows = data['count_filtered']; // no filtering
                    json.rows = $(rows);
                    return json;
                }
            }

            function ajaxSetupCallback() {
                if (paginate_server_side) {
                    var ajax_pager_options = {
                        ajaxUrl: site['uri']['public'] + "/api/clients?",
                        // Generate the URL for the AJAX request, with the relevant parameters
                        customAjaxUrl: ajaxGenerateUrlCallback,
                        ajaxObject: {
                            data: {
                                // rows   : size, // this doesn't work because size can't be updated dynamically
                            }
                        },
                        ajaxProcessing: ajaxProcessingCallback
                    };
                    return ajax_pager_options;
                } else {
                    return {};
                }
            }

            function pagerCompleteCallback() {
                // Link row buttons
                if (paginate_server_side) {
                    bindUserTableButtons($('#' + table_id));
                }
                // Link CSV download button
                $("#table-users-download").on("click", function (){
                    var state = getTableStateVars($('#' + table_id)[0]);
                    state['format'] = "csv";
                    delete state['page'];
                    delete state['size'];
                    if (primary_group)
                        state['primary_group'] = primary_group;
                    var url = site['uri']['public'] + "/api/users?" + $.param( state );
                    window.location = url;
                });
            }

            ufTable('table-users', ajaxSetupCallback, pagerCompleteCallback);
        });
    </script>
@endsection