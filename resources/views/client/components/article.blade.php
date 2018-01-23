<div class="hd wrap">
    <div class="content">
        <h1>{{$article->name}}</h1>
        @if($article->id!=37811)
        <h1 style="margin-bottom: 30px;">{{$article->subname}}</h1>
        @endif
        <div class="info">
            <span class="date">发布日期：{{date('Y-m-d', strtotime($article->updated_at))}}</span>
            <span class="laiyuan">信息来源：@if($article->source=='') 扎兰屯政府网 @else {{$article->source}} @endif</span>
            <span class="date">作者：{{$article->author}}</span>
            <span class="date">审核人：{{$article->department}}</span>
            <span class="date">阅读量：{{$article->count}}</span>
        </div>
        @if(!empty($article->video))
            <div class="video" style="width: 500px;height: 300px;margin: 30px auto;">
                <video width="100%" src="{{$article->video}}" controls></video>
            </div>
        @endif
        <div class="main" id="main">
            {!! $article->content !!}
        </div>
        <div class="right">
            <ul>
                <li>
                    <div class="text"><a target="_blank" href="javascript:print();">打印</a></div>
                    <div class="pic"><img src="{{asset('client/images/fabu_right_icon_1.jpg')}}" alt=""></div>
                </li>
                <li>
                    <div class="text jiathis_txt">分享</div>
                    <div class="pic"><img src="{{asset('client/images/fabu_right_icon_2.jpg')}}" alt=""></div>
                    <!-- JiaThis Button BEGIN -->
                    <div class="jiathis_style" style="position: absolute; left: 0px; top:0px; width: 40px;height:40px;">
                        <a target="_blank" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank" style="background: transparent !important;width: 40px !important;height: 40px !important;position: absolute !important;left: 0px !important;top: 0px !important;margin: 0px !important;padding: 0px !important;"></a>
                        <a target="_blank" class="jiathis_counter_style" style="display: none !important;"></a>
                    </div>
                    <script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
                    <!-- JiaThis Button END -->
                </li>

                <li class="font_small">
                    <div class="text" id="font_size_plus">字大</div>
                    <div class="pic"><img src="{{asset('client/images/fabu_right_icon_3.jpg')}}" alt=""></div>
                </li>
                <li class="font_add font_add_dis">
                    <div class="text" id="font_size_minus">字小</div>
                    <div class="pic"><img src="{{asset('client/images/fabu_right_icon_4.jpg')}}" alt=""></div>
                </li>
            </ul>
        </div>
    </div>

</div>