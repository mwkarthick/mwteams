        <div class="panel-group" data-collapse-color="amber" role="tablist" aria-multiselectable="true">
            <div class="panel panel-collapse">
                <div class="panel-heading color-block bgm-blue" role="tab" id="headingProduct">
                    <h4 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseProduct" aria-expanded="false" aria-controls="collapseOne">
                            Supervisors For This Team :
                        </a>
                    </h4>
                </div>
                <div id="collapseProduct" class="collapse in" role="tabpanel" aria-labelledby="headingProduct">
                    <div class="panel-body p-10">
                        <div class="p-5 pull-right mm-55-0">
                            <a href="{{url('teams/addsupervisor', $record->id)}}" target="_self">
                                <button class="btn bgm-lime btn-icon waves-effect waves-circle waves-float"><i class="zmdi zmdi-plus"></i></button>
                            </a>
                        </div>
                        <div class="row ">  
                            <div class="col-sm-12">
                                <div class="panel card" data-collapse-color="cyan" id="accordionCyan" role="tablist" aria-multiselectable="true">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="card-head card-padding pd-10-20">
                                                        <div class="row c-black" style="padding: 8px 0 8px 0px;">
                                                            <div class="col-sm-4 text-center">
                                                                 Supervisor_Code
                                                            </div>
                                                            <div class="col-sm-4 text-center">
                                                                 Supervisor_Name       
                                                            </div>
                                                        </div>
                                                            @foreach($record->supervisorslist as $supervisorslist)
                                                                <div class="row" style="padding: 8px 0 8px 0px;">
                                                                    <div class="col-sm-4 text-center">
                                                                         {{$supervisorslist->supervisor->code}}
                                                                    </div>
                                                                    <div class="col-sm-4 text-center">
                                                                         {{$supervisorslist->supervisor->name}}
                                                                    </div>                                                
                                                                </div> 
                                                            @endforeach
                                                                                                                             
                                                    </div>
                                                    <div class="card-body card-padding pd-10-20">
                                                
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                                                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        