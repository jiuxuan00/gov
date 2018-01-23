@extends('client.components.layouts')


@section('content')
    <style>
        .container {
            background: #fff;}
    </style>


    <div class="container">
        <div class="bd article artlist">
            <div class="hd">
                <div class="crumbs">
                    <span><i class="icon_map"></i></span>
                    <span>位置：</span>
                    <span><a target="_blank" href="">首页</a></span>
                    <span class="gt">&gt;</span>
                    <span style="color: #999;">{{$category->name}}</span>
                </div>
                <!--//End crumbs-->


                <div id="tsxa_l" class="fl column">
                    <div class="portlet">
                        <div align="left" class="portlet-header" style="display: none;">
  <span id="menu">
        </span>
                            <div id="submenu636d51af631d4c55902cd2d519402fe2" class="shadow dn">
                                <ul class="float_list_ul">
                                </ul>
                            </div>
                        </div>
                        <div>
                            <div class="nav_third">
                                <div class="nav_name">首页</div>
                                <ul class="nav_ul">
                                    <li class="yili checked">
                                        <a target="_blank" class="yia" href="{{url('/list').'/'.$category->id.'.html'}}" target="_blank">{{$category->name}}</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>

                <div id="tsxa_r" class="fr column">
                    <div class="mod3 clearfix">
                        <span class="title fl">{{$category->name}}</span>
                    </div>
                    <ul class="third_list">
                        @foreach($data as $item)
                        <li class="lih"><span class="fl"><a target="_blank" href="" target="_blank" title="">{{$item->name}}</a></span><span class="fr">{{date('Y-m-d',strtotime($item->updated_at))}}</span></li>
                        @endforeach
                    </ul>
                    <div class="page">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function () {
            navSelect(0)
        })
    </script>
@endsection