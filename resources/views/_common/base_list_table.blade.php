                
                    <div class="text-center pull-right">
                        <div class="p-5">
                            <a href="{{url($basePath)}}/create" target="_self">
                                <button class="btn bgm-lime btn-icon waves-effect waves-circle waves-float" id="addbtn"><i class="zmdi zmdi-plus"></i></button>
                            </a> 
                        </div>
                    </div>
                    <div>
                    @if(isset($errors))
                    @foreach ($errors->toArray() as $kn => $error) {
                    <div>
                        @foreach ($error as $k => $error1)
                        <div class=" pull-left m-5" style="clear:both;">
                            <span class="label label-warning">{{$kn}} : {{$k}} : {{$error1}}</span>
                        </div>
                        @endforeach 
                    </div>
                    @endforeach 
                    @endif
                    </div>
                    <div class="clearfix"></div>                
                    <div class="row m-t-25">
                        @if($data)
                            @include($baseName . '.' . $baseName .'_list')
                        @endif
                    </div>