<?php
require 'php-sdk-7.0.8/autoload.php';

    // 引入鉴权类
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;

    // 需要填写你的 Access Key 和 Secret Key
$accessKey = 'Xgms8WkSyA_RLsFcCnjuwconiVu48-q1wN0I87iT';
$secretKey = 'mU_q8kgCVCY7iurKjR9Q6KczJeWqyLJUFx0-uIA9';

    // 构建鉴权对象
$auth = new Auth($accessKey, $secretKey);

    // 要上传的空间
$bucket = 'complaint';

    // 生成上传 Token
$token = $auth->uploadToken($bucket);
session_start();
$username=@$_SESSION['username'];
$conn = @mysql_connect('localhost', 'root', '');
mysql_select_db('complant', $conn);
mysql_query("set names 'utf8'");
if(!$conn){
    die('数据库连接失败');
}else{
    $sql =  @mysql_query("select * from user WHERE username ='$username'" );
    $arr = @mysql_fetch_array($sql);
    $name1 = @$arr['name1'];
    $phone = @$arr ['username'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>我要投诉</title>
    <link rel="stylesheet" type="text/css" href="css/complaint.css">
    <link rel="stylesheet" type="text/css"  href="../css/bootstrap.min.css"  >
    <link rel="stylesheet" type="text/css" href="css/default.css">
    <link  rel="stylesheet" type="text/css" href="css/fileinput.css" media="all">
    <link  rel="stylesheet" type="text/css" href="../css/index.css" media="only screen and (min-width:610px)">
    <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico" media="screen" />
    <link  rel="stylesheet" type="text/css" href="../css/index_min.css" media="only screen and (max-width:610px)">
    <script src="../js/jquery-1.11.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="js/fileinput.js" type="text/javascript"></script>
    <script src="js/fileinput_locale_zh.js" type="text/javascript"></script>
    <script language="javascript">
        function changeplace1(){
            with(document.myForm){
                var countrys = new Array();
                countrys["0"] = ["--请选择所在省份和地区--"];
                countrys["济南"] = ["市中区","历下区","历城区","槐荫区","天桥区","长清区","章丘市","济阳县","商河县","平阴县"];
                countrys["青岛"] = ["市南区","市北区","城阳区","四方区","李沧区","黄岛区","崂山区","胶南市","胶州市","平度市","莱西市","即墨市"];
                countrys["淄博"] = ["张店区","临淄区","淄川区","博山区","周村区","桓台县","高青县","沂源县"];
                countrys["枣庄"] = ["市中区"," 山亭区","峄城区","台儿庄区","薛城区","滕州市"];
                countrys["东营"] = ["东营区","河口区","垦利县","广饶县","利津县"];
                countrys["烟台"] = ["芝罘区","福山区","牟平区","莱山区","龙口市","莱阳市","莱州市","招远市","蓬莱市","栖霞市","海阳市","长岛县"];
                countrys["济宁"] = [" 市中区","任城区","曲阜市","兖州市","邹城市","鱼台县","金乡县","嘉祥县","微山县","汶上县","泗水县","梁山县"];
                countrys["潍坊"] = [" 潍城区","寒亭区","坊子区","奎文区","青州市","诸城区","寿光市","安丘市","高密市","昌邑市","昌乐县","临朐县"];
                countrys["泰安"] = ["泰山区","岱岳区","新泰市","肥城市","宁阳县","东平县"];
                countrys["威海"] = ["荣成市","乳山市","文登市","环翠区"];
                countrys["日照"] = ["东港区","岚山区","五莲县","莒县"];
                countrys["莱芜"] = ["莱城区","钢城区"];
                countrys["临沂"] = [" 兰山区","罗庄区","河东区","沂南县","郯城县","沂水县","苍山县","费县","平邑县","莒南县","蒙阴县","临沭县"];
                countrys["德州"] = ["德城区","乐陵市","禹城市","陵县","宁津县","齐河县","武城县","庆云县","平原县","夏津县","临邑县"];
                countrys["聊城"] = [" 东昌府区","临清市","高唐县","阳谷县","茌平县","莘县","东阿县","冠县"];
                countrys["滨州"] = ["滨城区","邹平县","沾化县","惠民县","博兴县","阳信县","无棣县"];
                countrys["菏泽"] = [" 牡丹区","曹县","鄄城县","单县","东明县","郓城县","曹县","定陶县","巨野县","成武县"];

                var value = place.value;
                place1.options.length = 0;
                var option;
                for(i = 0;i < countrys[value].length;i++){
                    option = new Option(countrys[value][i],countrys[value][i]);
                    place1.options.add(option);
                }
                if(country.value == "0")
                    place1.disabled = true;
                else
                    place1.disabled = false;
            }
        }
    </script>
    <style>
        label {
            font-weight: normal;
            font-size: 14px;
            font-family: '宋体';
        }
    </style>
    <body>
       <!--顶部导航栏-->
       <div class="navbar navbar-default navbar-fixed-top heade" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">切换导航</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php" style="font-family:宋体">网上在线投诉系统</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav" style="font-family:宋体">
                    <li><a href="../index.php">首页</a></li>
                    <li class="active"><a href="../main/complant.php ">我要投诉</a></li>
                    <li><a href="../window_of_policy/policy.php">政策之窗</a></li>
                    <li><a href="../case_show/case.php ">案例展示</a></li>
                    <li><a href="../help/help.php">帮助文档</a></li>
                </ul>
                <?php
                if(empty($_SESSION['username'])){
                    echo '<div class="pull-right top_top">';
                    echo '<a href="../login_register/login.html"><button type="button" class="btn btn-default ">登录</button></a>';
                    echo '<a href = "../login_register/register.html"><button type="button" class="btn btn-default ">注册</button></a>';
                    echo '</div>';
                }
                else{
                    echo '<ul class="nav navbar-nav navbar-right">';
                    echo '<li class="dropdown">';
                    echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><b>$username</b><span class='caret'></span></a>";
                    echo '<ul class="dropdown-menu">
                    <li><a href="../person/person.php"><b>个人中心</b></a></li>
                    <li><a href="../exit.php"><b>退出</b></a></li>
                </ul>';
                echo '</li>';
                echo '</ul>';
            }
            ?>
        </div>
    </div>
</div>
<div class="container" style="text-align:center">
    <div class="row top">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <img src="images/wyts2.jpg" class="img-responsive" style="margin:auto;width: 887px;height: 90px">
        </div>
        <div class="blank20"></div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <img src="images/wxts.png" class="img-responsive" style="margin:auto">
        </div>
    </div>
    <div class="blank20"></div>
    <form class="form-horizontal" role="form" method="post" action="complantprocess.php" name="myForm" enctype="multipart/form-data" style="margin-left:6%">
        <div class="row">
            <div class="col-xs-12 col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="name1" class="control-label" style="margin-left: -57%">昵称:</label>
                    <input type="text" class="form-control input-lg" id="name1" name="name1"
                    placeholder="请输入昵称" style="margin-left: 30%;margin-top:-5%;width: 40%" value="<?php echo $name1;?>">
                </div>
            </div>
            <div class="col-xs-12 col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="email" class="control-label" style="margin-left: -58%">电子邮箱:</label>

                    <input type="email" class="form-control input-lg" id="email" name="email"
                    placeholder="电子邮箱" maxlength="30" style="margin-left:30%;margin-top:-5%;width: 40%" >
                </div>
            </div>
            <div class="col-xs-12 col-lg-6 col-md-6 col-sm-6">
                <div class="form-group ">
                    <label for="name2" class="control-label" style="margin-left: -57%;">真实姓名:</label>
                    <input type="text" class="form-control input-lg" id="name2" name="name2"
                    placeholder="真实姓名" style="margin-left: 30%;margin-top:-5%;width: 40%">
                </div>
            </div>
            <div class="col-xs-12 col-lg-6 col-md-6 col-sm-6">
                <div class="form-group" style="margin-top:0%">
                    <label for="company" class="control-label" style="margin-left: -57%;">涉及单位:</label>
                    <input type="text" class="form-control input-lg" id="company" name="company"
                    placeholder="单位名称" style="margin-left: 30%;margin-top:-5%;width: 40%">
                </div>
            </div>


            <div class="col-xs-12 col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="topic"  class=" control-label" style="margin-left: -57%;">投诉主题:</label>
                    <input type="text" class="form-control input-lg" id="topic" name="topic"
                    placeholder="投诉主题" style="margin-left: 30%;margin-top:-5%;width: 40%">
                </div>
            </div>
            <div class="col-xs-12 col-lg-6 col-md-6 col-sm-6">
                <div class="form-group" style="margin-top:0%">
                    <label for="phone" class="control-label" style="margin-left: -57%;">联系电话:</label>
                    <input type="text" class="form-control input-lg" id="phone" name="phone"
                    placeholder="联系电话" style="margin-left: 30%;margin-top:-5%;width: 40%" value="<?php echo $phone;?>">
                </div>
            </div>
            <div class="col-xs-12 col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="content" class=" control-label" style="margin-left: -57%;">投诉内容:</label>
                    <textarea class="form-control" rows=5" id="content"  placeholder="投诉原因" name="content" style="margin-left: 30%;margin-top:-5%;width: 40%;height:130px"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-lg-6 col-md-6 col-sm-6">
                <div class="form-group"  >
                    <label for="category" class="control-label" style="margin-left: -57%;">行业类别:</label>
                    <select class="form-control col-xs-offset-12" name="category"style="margin-left: 30%;margin-top:-5%;width: 40%">
                        <option>--请选择--</option>
                        <option>政府</option>
                        <option>民生</option>
                        <option>交通</option>
                        <option>环保</option>
                        <option>教育</option>
                        <option>房地产</option>
                        <option>医疗</option>
                        <option>企业</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-lg-6 col-md-6 col-sm-6">
                <div class="form-group" style="margin-top: 0%;">
                    <label for="place" class=" control-label" style="margin-left:-57%">事发地区:</label>
                    <select class="form-group form-control" name="place" onChange="changeplace1()"id="place" style="width:40%;margin-left:30%;margin-top:-4%">
                        <option value="0">--请选择所在城市--</option>
                        <option value="济南">济南</option>
                        <option value="青岛">青岛</option>
                        <option value="淄博">淄博</option>
                        <option value="枣庄">枣庄</option>
                        <option value="东营">东营</option>
                        <option value="烟台">烟台</option>
                        <option value="济宁">济宁</option>
                        <option value="潍坊">潍坊</option>
                        <option value="泰安">泰安</option>
                        <option value="威海">威海</option>
                        <option value="日照">日照</option>
                        <option value="莱芜">莱芜</option>
                        <option value="临沂">临沂</option>
                        <option value="德州">德州</option>
                        <option value="聊城">聊城</option>
                        <option value="滨州">滨州</option>
                        <option value="菏泽">菏泽</option>

                    </select>
                    <br>
                    <select class="form-group form-control" name="place1"  id="place1" style="width:40%;margin-left:30%;margin-top:-4%">
                        <option>--请选择所在的地区--</option>
                        <option value="济南">市中区</option>
                        <option value="青岛">市南区</option>
                        <option value="淄博">张店区</option>
                        <option value="枣庄">市中区</option>
                        <option value="东营">东营区</option>
                        <option value="烟台">芝罘区</option>
                        <option value="济宁">市中区</option>
                        <option value="潍坊">潍城区</option>
                        <option value="泰安">泰山区</option>
                        <option value="威海">荣成市</option>
                        <option value="日照">东港区</option>
                        <option value="莱芜">莱城区</option>
                        <option value="临沂">兰山区</option>
                        <option value="德州">德城区</option>
                        <option value="聊城">东昌府区</option>
                        <option value="滨州">滨城区</option>
                        <option value="菏泽">牡丹区</option>

                    </select>
                </div>
            </div>
        </div>
        <div class="row">
         <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
             <div class="form-group" style="width: 73%;margin-left: 14%;">
                <label for="email" class="control-label" style="margin-left: -113%;">上传文件:</label>
                <div style="margin-top:-3%;margin-left: -50%;color:red;position: relative;top:5px;left:10px;">* 上传文件所支持的格式有：.jpg .png .gif .mp3 .mp4</div><br>
                <!-- <input id="file-5" type="file" multiple class="file" data-overwrite-initial="false" data-min-file-count="1" name="img" style="margin-top: 5%"> -->
                <input id="file-5" class="file" type="file" name="file" multiple data-preview-file-type="any"  data-preview-file-icon="" >
            </div>
        </div>
    </div>
    <br>
    <div class="row" style="margin-left: 5%">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <input type="hidden" name="field1name" id="file-99">
            <button type="submit" class="btn btn-primary btn-lg" id="submit" value="Submit">提交</button>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <button type="reset" class="btn btn-primary btn-lg" id="reunion" value="Reset" style="margin-right:35%">重置</button>
        </div>
    </div>
</form>
</div>
<!--底部样式-->
<div class="footer">
    <div id="top"><br>
       <div id="one">
        其他举报方式:
    </div>
    <div id="two">
        <span class="glyphicon glyphicon-phone-alt"></span> &nbsp; 17865313062
    </div>
    <div id="three">
        <span class="glyphicon glyphicon-envelope"></span> &nbsp; zxtspt12315@163.com
    </div>
    <div id="four">
        <a style="color:#FFFFFF" href="javascript:void(0)" onMouseOut="hideImg()"  onmouseover="showImg()">
         <span class="glyphicon glyphicon-qrcode"></span> &nbsp; 微信举报</a>
         <div id="wxImg" style="display:none;height:50px;width:50px;back-ground:#f00;position:absolute;">
          <img style="height:120px;width:120px;" src="../images/weixin.jpg"/>
      </div>
  </div>
  <div id="five">
   <span class="glyphicon glyphicon-phone"></span> &nbsp; 下载app举报
</div>
</div>
<div id="mid">
    <br><br>
    <dl class="guanyu1">
        <dt style="">关于我们</dt>
        <dd>山东建筑大学</dd>
        <dd>煜城工作室</dd>
        <dd>煜城B组</dd>
    </dl>
    <dl class="guanyu2">
        <dt style="">友情链接</dt>
        <dd><a href="http://www.sdjzu.edu.cn/index.php?target=edu">山东建筑大学</a></dd>
        <dd><a href="http://www.315.gov.cn/">315消费者协会</a></dd>
        <dd><a href="http://218.57.139.17/Default.html">山东消费维权网</a></dd>
        <dd><a href="http://www.apac.org.cn/">中国反钓鱼网站联盟</a></dd>

    </dl>
    <dl class="guanyu3">
        <dt>联系我们</dt>
        <dd>邮箱：zxtspt12315@163.com</dd>
        <dd>电话：17865313062</dd>
        <dd>济南市历城区山东建筑大学</dd>
    </dl>
</div>
<div id="last">
 版权所有 &copy 煜城B组
</div>
</div>

<!--     <form enctype="multipart/form-data" action="upload.php" method="post">
        <input type="hidden" name="file11" id="file_99"><br>
                      <input id="file-5" class="file" type="file" name="file" multiple data-preview-file-type="any"  data-preview-file-icon="" >
                  </form> -->
                  <a id="ibangkf" href="http://www.ibangkf.com">在线客服系统</a>
              </body>
              <script type="text/javascript">
                $("#file-5").fileinput({
            uploadUrl: 'http://up.qiniu.com', // you must set a valid URL here else you will get an error
            allowedFileExtensions : ['jpg', 'png','gif','txt','mp4','wmv'],
            uploadAsync: true,
            overwriteInitial: false,
            uploadExtraData: {
                token: "<?php echo $token; ?>",
            },
            maxFileSize: 512000,
            maxFilesNum: 1,
            //allowedFileTypes: ['image', 'video', 'flash'],
            slugCallback: function(filename) {
                return  filename.replace('(', '_').replace(']', '_');
            }
        });
                var arr=new Array();
                var i=0;
                $("#file-5").on("fileuploaded", function (event, data, previewId, index) {
                    var x=data.response;
                    arr[i++] = eval(x)["key"];
                    // alert(arr);
                    for(var j = 0 ;j<arr.length;j++)
                    {
                       if(arr[j] == "" || typeof(arr[j]) == "undefined")
                       {
                          arr.splice(j,1);
                          j= j-1;

                      }

                  }
                  var bs = arr.join();
                  document.getElementById("file-99").value = bs;
              });
          </script>
          <script type="text/javascript" src="http://c.ibangkf.com/i/c-zxtspt12315.js"></script>

          </html>