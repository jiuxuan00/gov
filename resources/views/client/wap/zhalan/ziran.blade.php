@extends('client.wap.module.layouts')

@section('title') 走进扎兰 @endsection

@section('css')
    <style>
        .art {
            padding: 10px 20px;
        }
        .art p {
            font-size: 14px;
            line-height: 25px;
        }
    </style>
@endsection


@section('content')
    <div class="content">
        <div class="small_mar">
            <div class="ld_title">
                <div class="gover_ser">
                    <div class="clear"></div>
                </div>
            </div>
            <div class="ld_box">
                @include('client.wap.module.zhalan-navs')
            </div>
        </div>
        <div class="local_curr"></div>
        {{--//End--}}
        <div class="con_box">
            <div class="con_title">自然地理</div>
            <div class="con_time"></div>
            <div class="art">
                <ul>
                    <li>
                        <strong>地理位置</strong>
                        <p>扎兰屯市位于内蒙古自治区东部、呼伦贝尔市南端，背倚大兴安岭，面眺松嫩平原，地理坐标为北纬47°5′40″～48°36′34″，东经120°28′51″～123°17′30″。东以音河为界与阿荣旗相依，东南及南以金长城为界与黑龙江省甘南、龙江两县及兴安盟扎赉特旗为邻，西及西北以哈玛尔山和漠克河为界与阿尔山市、鄂温克族自治旗接壤，北以阿木牛河为界与牙克石市相连。市境东西顶端直线距210公里，南北顶端直线距离160公里，全市总面积16926.3平方公里。</p>
                    </li>
                    <li>
                        <strong>自 然 环 境</strong>
                        <p>【地貌特征】 扎兰屯市位于亚洲大陆中部的蒙古高原东缘，地处大兴安岭山脉的中段东麓、松嫩（辽）平原西侧。境内地势西高东低，北高南低。地形最高点为市境西端柴河源林场西南8公里与兴安盟交界处海拔1 706米的无名高地，最低点为成吉思汗镇以南与黑龙江省龙江县交界附近250米处，两地高差达1 456米。区内的地貌形态，主要有山地（中山、低山）、丘陵、平原和河谷4种地形单元，按其表面形态组合的自然分布，全市可划分出中山分区、低山分区、丘陵分区和平原分区4个地貌分区。</p>
                        <p> 【气候特点】 扎兰屯市属中温带大陆性季风气候。气候特点是太阳辐射较强，日照丰富，冬季漫长、严寒干冷。夏季短而温热，雨量集中，气温年、日较差大。春季升温快，秋天气温剧降，积温有效性高，风向呈河谷走向。西部和北部地区属于大兴安岭东部林缘温凉湿润，半湿润林牧业区，东南部地区属于温暖半湿润农业区。</p>
                        <p>【水文特征】 扎兰屯市位于雅鲁河中上游段。该流域在地质构造上属古生代—中生代复式背斜构造；处于新华夏系大兴安岭隆起带中段东缘，区内各类侵入岩较发育，一般以华力西晚期—燕山晚期酸性侵入岩为主，主体岩石主要是大成岩，其次花岗岩，石英片岩等分布较广；该流域自河源呈阶梯状从中山、低山、丘陵下降至松嫩平原，干流哈拉苏以上，两岸为高而陡的山地围绕，地势起伏大，相对高差400米左右，河谷宽2～3公里，哈拉苏至扎兰屯段，河谷增至4～5公里，河宽40～70米。成吉思汗边堡以下河流进入平原区，河道岔流多，两岸多沼泽湿地。全市多年平均地表径流量25.28亿立方米，地下水总补给量3.78亿立方米，水资源总量25.67亿立方米。河流比降大，一般在1/300～1/500之间，水能资源丰富,但时空分布不均,理论蕴藏量15万千瓦，其中雅鲁河及其支流6万千瓦，绰尔河及其支流9万千瓦。</p>
                        <p>【土壤类型与分布】 扎兰屯市境内土壤水平性地带为黑土，属于松嫩平原黑土带。受土壤垂直分布规律控制，海拔250～500米的东南部，为基带地壤黑土，海拔500～800米的山地多为暗棕色土壤。海拔800米以上的为棕色针叶林土。主要有6种类型土壤，即棕色针叶林土、暗棕壤、黑土、草甸土、沼泽土、水稻土。
                        </p><p>【植被类型与分布】 扎兰屯市境内植物种类既有温湿树种和灌草植物，又有寒温性植被。又因山丘起伏，河谷纵横，地形复杂，地带性植被与隐域性的草甸和沼泽植被呈相间分布。中低山地区森林植被有兴安落叶松、白桦、黑桦、山杨、柞树及兴安柳，林下灌木有杜鹃、毛榛、刺玫、蔷薇等。丘陵漫岗地区分布有森林植被和草原草甸植被。森林呈不连续分布，树种以柞树、黑桦占优势，沿谷底尚有水曲柳，并有零星的落叶松分布，林下灌木有胡枝子，毛榛等；草原草甸植物组成以草本为主，灌木少量，种类有大针茅、兴安柴胡、绣线菊、东方野豌豆、山黧豆、萎陵菜、紫菀等，也有少量胡枝子。河川谷地分布着大量的草甸植被和沼泽植被，草甸植被的主要构成是地榆—裂叶蒿杂类草群落。主要地被物有禾本科草、苔草、地榆、野豌豆、野百合、玉竹、蕨类等。</p>
                        <p>【土地资源】 扎兰屯市土地面积25 164 242亩；人口密度每平方公里25.73人；人均占地58.30亩。耕地面积3 397 853.4亩，占总土地面积13.50%；园地面积18 226.5亩，占总土地面积0.07%；林地面积16 556 534.7亩，占总土地面积65.79%；牧草地面积3 194 026.5亩，占总土地面积12.69%；其他农用地面积117 093.3亩，占总土地面积0.47%；居民点及独立工矿用地面积320 300.1亩，占总土地面积1.27%；交通运输用地面积25 352.1亩，占总土地面积0.10%；水利设施用地面积9 513.0亩，占总土地面积0.04%；未利用土地面积1 318 502.9亩，占总土地面积5.24%；其他土地面积206 839.5亩，占总土地面积0.82%。</p>
                        <p>【水资源】 扎兰屯市水资源由入境水资源、流域内地表径流和流域内地下水资源量3个部分组成，入境水资源不计入全市水资源总量中。流域区内多年平均地表径流量25.28亿立方米，流域内地下水总补给量3.78亿立方米，全市水资源总量为25.67亿立方米。
                        </p><p>【野生动植物资源】 扎兰屯市境内野生动物种类约200余种。其中国家一级保护动物7种，主要有细嘴松鸡、单顶鹤、貂熊、梅花鹿、金雕等。国家二级保护动物47种，主要有棕熊、马鹿、驼鹿、雪兔、大天鹅、鸳鸯等。扎兰屯市境内各河流、湖泡等生长各种鱼类46种（包括亚种和人工养殖品种）隶属于12个科（以鲤科鱼类为主，共有29种，占鱼类总数63%），其中经济鱼类15种（包括亚种和人工养殖品种），主要水生植物是芦苇。</p>
                        <p>主要野生树种有蒙古栎、落叶松、樟子松、云杉、榆树、杨树、柳树、白桦、黑桦、山杨、柞树。扎兰屯市草场总面积为506万亩，其中可利用面积为400万亩。天然草场划分为五类，即山地草甸类草场、山地草甸草原类草场、丘陵草甸草原类草、沿河低湿草甸类草场、河泛地草本沼泽类草场。</p>
                        <p>扎兰屯市野生经济植物种类有维管束植物96科、334属、709种。其中野生药物植物100余种，占全市植物种类总数14.1%。主要有黄芪、黄精、沙参、列当、马先蒿、益母草、元胡、龙胆、白藓、桔梗、独行菜、黄芩、防风、柴胡、大叶龙胆、裂叶荆芥、贝母、手掌参、金莲花、苍木、升麻、白藓、远志、草乌、祁洲漏芦、薄荷等。芳香油类植物主要有兴安杜鹃、裂叶荆芥、百里香、百合、白藓、香薷、山刺玫、缬铃兰、黄芩等。单宁类植物（亦称鞣料植物）主要有兴安落叶松、白桦、蒙古栎、地榆、鼠掌草、柳兰、芍药、粗根老草、叉分蓼等。食用类植物主要有稠李、山里红、东方草莓、山丁子、蓝靛果、忍冬白（黑）桦树液等。食用野菜及真菌类植物主要有蕨菜、黄花菜、桔梗、沙参、荨麻、猴头、木耳、蘑菇等。油料类植物主要有榛子、胡枝子、接骨木、苍耳、山野豌豆、兴安落叶松等。纤维类植物主要有大叶樟、小叶樟、射干、羊胡子苔草、柳兰、胡枝子、各种灌木柳、山杨、甜杨、白桦等。</p>
                        <p>【矿产资源】 扎兰屯市矿产资源分布的主要特点是缺煤、少金属矿、石丰、土富。共发现各类矿床、矿点、矿化点55处，其中大型石材矿分布在市区天拜山、卧牛河镇五星村和成吉思汗镇光明村3处，大型砖瓦粘土矿有高台子办事处1处，中型耐火粘土矿有高台子办事处1处，小型粘土矿床较多，铁矿有腰岭子等4处，硅石矿有音河桥头和雅尔根楚2处，石墨矿有中和办事处1处，重晶石矿有柴河办事处巴升河1处，硅灰石矿有哈拉苏办事处1处，其余为矿点、矿化点。矿泉水3处，地下热水1处。金属矿点有铜、铅、锌、钼、金、铀等，非金属矿点中粘土、硅石、花岗岩较多，其次为煤及辰砂等。</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script>
        $(function () {

        })
    </script>
@endsection