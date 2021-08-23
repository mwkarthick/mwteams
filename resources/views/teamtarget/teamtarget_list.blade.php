                    <div class="card">
                        <div class="card-header">
                            <h2>{{ucfirst($baseName)}}</h2>
                        </div>
                        
                            <table id="data-table-command" class="table table-striped table-vmiddle">
                            <thead>
                                <tr>
                                    <th data-column-id="id" data-order="desc" data-type="numeric" data-visible="false">ID</th>
                                    <th data-column-id="code" data-type="string">Code</th>
                                    <th data-column-id="name" data-type="string">Name</th>
                                    <th data-column-id="value" data-type="string">Value</th>
                                    <th data-column-id="startdate" data-type="date">Start Date</th>
                                    <th data-column-id="enddate" data-type="date">Enddate</th>
                                    <th data-column-id="status1"  >Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->team_code}}</td>
                                        <td>{{$item->team->name}}</td>
                                        <td>{{$item->target_value}}</td>
                                        <td>{{$item->startdate}}</td>
                                        <td>{{$item->enddate}}</td>
                                        <td>@if($item->status == 0) Inactive @else Active @endif</td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
  
    @section('js')
       @parent
            <script>
                $(document).ready(function(){                    
                    //Command Buttons
                    $("#data-table-command").bootgrid({
                        css: {
                            icon: 'zmdi icon',
                            iconColumns: 'zmdi-view-module',
                            iconDown: 'zmdi-expand-more',
                            iconRefresh: 'zmdi-refresh',
                            iconUp: 'zmdi-expand-less'
                        }
                    });
                });
            </script>       
        @stop