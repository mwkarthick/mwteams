                    <div class="text-center">
                        <h2 class="f-400"></h2>
                    </div>
                    <?php //echo"<pre>";print_r($record);echo"</pre>";  ?>
                    @include('_common.errors')

                    <div class="clearfix"></div>
                
                    <div class="row m-t-25">
                        
                        @if($record)                                             
                        
                        <div class="col-sm-12 ">
                            <div class="card pt-inner">
                                <div class="pti-header @if($record->status==1) bgm-lightgreen @else bgm-amber @endif">
                                    @include($baseName . '.' . $baseName .'_dt')
                            </div>
                        </div>   
                            
                        @endif
                        
                    </div> 
                        
                    @if(ucfirst($baseName)=='Teams')
                        <div class="panel-group" data-collapse-color="amber" role="tablist" aria-multiselectable="true">
                            @include('teams.teams_subdt')
                        </div>
                    @endif