<div class="portlet">
    <div align="left" class="portlet-header" style="display: none;">
  <span id="menu">
        </span>
        <div class="shadow dn">
            <ul class="float_list_ul">
            </ul>
        </div>
    </div>
    <div>
        <div class="nav_third">
            <div class="nav_name">{{$cateName->name}}</div>
            <ul class="nav_ul">
                @foreach($categories as $item)
                    <li class="yili">
                        <a class="yia" href="/government/{{$item->id}}" target="_blank">{{$item->name}}</a>
                    </li>
                @endforeach
            </ul>
            <div class="pic"><img src="{{url('client/images/20171108-1.jpg')}}" alt=""></div>
        </div>

    </div>
</div>