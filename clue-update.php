<?php
    $id = empty($_REQUEST["id"])?"null":$_REQUEST["id"];
    if($id=="null"){
        die("请选择要修改的记录");
    }else{
        include("conn.php");

        $sql = "select * from clue where id={$id}";
        $result = mysqli_query($conn,$sql);
        if( mysqli_num_rows($result)>0 ){
			$row=mysqli_fetch_assoc($result);
		}else{
            echo "找不到记录";
        }

        mysqli_close($conn);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>创建线索</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/clue-input.css">

</head>

<body>
    <div style="height:52px;width:100%;background-color: red;"></div>
    <div id="warp">
        <form action="clue-save.php" method="post">
            <!-- 增加一个隐藏的input，用来区分是添加数据还是修改数据 -->
            <input type="hidden" name="action" value="update">
            <!-- 增加一个隐藏的input，用来保存id -->
            <input type="hidden" name="id" value="<?php echo $row['id'];?>">
            <div class="clue_top">
                <div class="set_m">
                    <div class="title">
                        <h2>创建线索</h2>
                    </div>
                    <div class="btn">
                        <input type="submit" value="保存">
                        <input type="submit" value="保存并新建">
                        <input type="submit" value="取消">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="photo">
                    <div class="con_img">
                        <img src="images/user_profile_63238_.svg">
                        <div class="con_photo">
                            <i></i>
                        </div>
                    </div>
                </div>
                <div class="clueDiv">
                    <div class="clue_info">线索信息</div>
                    <div class="clue_content">
                        <div class="float_left floatrow">
                            <div class="row1 left_row">
                                <div class="labelDiv">
                                    <label for="clueOwner" class="label">线索所有者</label>
                                </div>
                                <div class="cons">
                                    <input type="text" name="clueOwner" id="clueOwner" value="<?php echo $row['线索所有者'];?>">
                                </div>
                            </div>
                            <div class="row2 left_row">
                                <div class="labelDiv">
                                    <label for="name" class="label">名</label>
                                </div>
                                <div class="cons">
                                    <input type="text" name="name" id="name" value="<?php echo $row['名'];?>">
                                    <div class="select">
                                        <select name="chenghu" id="chenghu">
                                            <?php 
                                                if($row['称呼']=="0"){
                                                    echo "<option value='0'>-None-</option>";
                                                    echo "<option value='先生'>先生</option>";
                                                    echo "<option value='夫人'>夫人</option>";
                                                    echo "<option value='女士'>女士</option>";
                                                }else if($row['称呼']=="先生"){
                                                    echo "<option value='先生'>先生</option>";
                                                    echo "<option value='0'>-None-</option>";
                                                    echo "<option value='夫人'>夫人</option>";
                                                    echo "<option value='女士'>女士</option>";
                                                }else if($row['称呼']=="夫人"){
                                                    echo "<option value='夫人'>夫人</option>";
                                                    echo "<option value='先生'>先生</option>";
                                                    echo "<option value='0'>-None-</option>";
                                                    echo "<option value='女士'>女士</option>";
                                                }else if($row['称呼']=="女士"){
                                                    echo "<option value='女士'>女士</option>";
                                                    echo "<option value='先生'>先生</option>";
                                                    echo "<option value='0'>-None-</option>";
                                                    echo "<option value='夫人'>夫人</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row3 left_row">
                                <div class="labelDiv">
                                    <label for="position" class="label">职位</label>
                                </div>
                                <div class="cons">
                                    <input type="text" name="position" id="position" value="<?php echo $row['职位'];?>">
                                </div>
                            </div>
                            <div class="row4 left_row">
                                <div class="labelDiv">
                                    <label for="telephone" class="label">电话</label>
                                </div>
                                <div class="cons">
                                    <input type="text" name="telephone" id="telephone" value="<?php echo $row['电话'];?>">
                                </div>
                            </div>
                            <div class="row5 left_row">
                                <div class="labelDiv">
                                    <label for="mobile" class="label">手机</label>
                                </div>
                                <div class="cons">
                                    <input type="text" name="mobile" id="mobile" value="<?php echo $row['手机'];?>">
                                </div>
                            </div>
                            <div class="row6 left_row">
                                <div class="labelDiv">
                                    <label for="source" class="label">线索来源</label>
                                </div>
                                <div class="cons">
                                    <div class="select">
                                        <select name="source" id="source">
                                        <?php 
                                            if($row['线索来源']=="0"){
                                                echo "<option value='0'>-None-</option>";
                                                echo "<option value='广告'>广告</option>";
                                                echo "<option value='推销电话'>推销电话</option>";
                                                echo "<option value='合作伙伴'>合作伙伴</option>";
                                            }else if($row['线索来源']=="广告"){
                                                echo "<option value='广告'>广告</option>";
                                                echo "<option value='0'>-None-</option>";
                                                
                                                echo "<option value='推销电话'>推销电话</option>";
                                                echo "<option value='合作伙伴'>合作伙伴</option>";
                                            }else if($row['线索来源']=="推销电话"){
                                                echo "<option value='推销电话'>推销电话</option>";
                                                echo "<option value='合作伙伴'>合作伙伴</option>";
                                                echo "<option value='0'>-None-</option>";
                                                echo "<option value='广告'>广告</option>";
                                            }else if($row['线索来源']=="合作伙伴"){
                                                echo "<option value='合作伙伴'>合作伙伴</option>";
                                                echo "<option value='0'>-None-</option>";
                                                echo "<option value='广告'>广告</option>";
                                                echo "<option value='推销电话'>推销电话</option>";
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row7 left_row">
                                <div class="labelDiv">
                                    <label for="industry" class="label">行业</label>
                                </div>
                                <div class="cons">
                                    <div class="select">
                                        <select name="industry" id="industry">
                                        <?php 
                                            if($row['行业']=="0"){
                                                echo "<option value='0'>-None-</option>";
                                                echo "<option value='应用服务提供商'>应用服务提供商</option>";
                                                echo "<option value='大企业'>大企业</option>";
                                                echo "<option value='数据/电信/OEM'>数据/电信/OEM</option>";
                                            }else if($row['行业']=="应用服务提供商"){
                                                echo "<option value='应用服务提供商'>应用服务提供商</option>";
                                                echo "<option value='0'>-None-</option>";
                                                echo "<option value='大企业'>大企业</option>";
                                                echo "<option value='数据/电信/OEM'>数据/电信/OEM</option>";
                                            }else if($row['行业']=="大企业"){
                                                echo "<option value='大企业'>大企业</option>";
                                                echo "<option value='数据/电信/OEM'>数据/电信/OEM</option>";
                                                echo "<option value='0'>-None-</option>";
                                                echo "<option value='应用服务提供商'>应用服务提供商</option>";
                                            }else if($row['行业']=="数据/电信/OEM"){
                                                echo "<option value='数据/电信/OEM'>数据/电信/OEM</option>";
                                                echo "<option value='0'>-None-</option>";
                                                echo "<option value='应用服务提供商'>应用服务提供商</option>";
                                                echo "<option value='大企业'>大企业</option>";
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row8 left_row">
                                <div class="labelDiv">
                                    <label for="income" class="label">年收入</label>
                                </div>
                                <div class="cons">
                                    <input type="text" name="income" id="income" value="<?php echo $row['年收入'];?>">
                                </div>
                            </div>
                        </div>
                        <div class="float_right floatrow">
                            <div class="row_rt1 left_row">
                                <div class="labelDiv">
                                    <label for="company" class="label">公司</label>
                                </div>
                                <div class="cons">
                                    <input type="text" name="company" id="company" value="<?php echo $row['公司'];?>">
                                </div>
                            </div>
                            <div class="row_rt2 left_row">
                                <div class="labelDiv">
                                    <label for="surname" class="label">姓</label>
                                </div>
                                <div class="cons">
                                    <input type="text" name="surname" id="surname" value="<?php echo $row['姓'];?>">
                                </div>
                            </div>
                            <div class="row_rt3 left_row">
                                <div class="labelDiv">
                                    <label for="email" class="label">邮箱</label>
                                </div>
                                <div class="cons">
                                    <input type="text" name="email" id="email" value="<?php echo $row['邮箱'];?>">
                                </div>
                            </div>
                            <div class="row_rt4 left_row">
                                <div class="labelDiv">
                                    <label for="website" class="label">网站</label>
                                </div>
                                <div class="cons">
                                    <input type="text" name="website" id="website" value="<?php echo $row['网站'];?>">
                                </div>
                            </div>
                            <div class="row_rt5 left_row">
                                <div class="labelDiv">
                                    <label for="state" class="label">线索状态</label>
                                </div>
                                <div class="cons">
                                    <div class="select">
                                        <select name="state" id="state">
                                        <?php 
                                            if($row['线索状态']=="0"){
                                                echo "<option value='0'>-None-</option>";
                                                echo "<option value='已联系'>已联系</option>";
                                                echo "<option value='未联系'>未联系</option>";
                                                echo "<option value='尝试联系'>尝试联系</option>";
                                            }else if($row['线索状态']=="已联系"){
                                                echo "<option value='已联系'>广告</option>";
                                                echo "<option value='0'>-None-</option>";
                                                echo "<option value='未联系'>未联系</option>";
                                                echo "<option value='尝试联系'>尝试联系</option>";
                                            }else if($row['线索状态']=="未联系"){
                                                echo "<option value='未联系'>未联系</option>";
                                                echo "<option value='尝试联系'>尝试联系</option>";
                                                echo "<option value='0'>-None-</option>";
                                                echo "<option value='已联系'>已联系</option>";
                                            }else if($row['线索状态']=="尝试联系"){
                                                echo "<option value='尝试联系'>尝试联系</option>";
                                                echo "<option value='0'>-None-</option>";
                                                echo "<option value='已联系'>已联系</option>";
                                                echo "<option value='未联系'>未联系</option>";
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row_rt6 left_row">
                                <div class="labelDiv">
                                    <label for="staff" class="label">员工数</label>
                                </div>
                                <div class="cons">
                                    <input type="text" name="staff" id="staff" value="<?php echo $row['员工数'];?>">
                                </div>
                            </div>
                            <div class="row_rt7 left_row">
                                <div class="labelDiv">
                                    <label for="grade" class="label">等级</label>
                                </div>
                                <div class="cons">
                                    <div class="select">
                                        <select name="grade" id="grade">
                                        <?php 
                                            if($row['等级']=="0"){
                                                echo "<option value='0'>-None-</option>";
                                                echo "<option value='项目取消'>项目取消</option>";
                                                echo "<option value='关闭'>关闭</option>";
                                            }else if($row['等级']=="项目取消"){
                                                echo "<option value='项目取消'>项目取消</option>";
                                                echo "<option value='0'>-None-</option>";
                                                echo "<option value='关闭'>关闭</option>";
                                            }else if($row['等级']=="关闭"){
                                                echo "<option value='关闭'>关闭</option>";
                                                echo "<option value='0'>-None-</option>";
                                                echo "<option value='项目取消'>项目取消</option>";
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row_rt8 left_row">
                                <div class="labelDiv">
                                    <label for="spare" class="label">备用邮箱</label>
                                </div>
                                <div class="cons">
                                    <input type="text" name="spare" id="spare" value="<?php echo $row['备用邮箱'];?>">
                                </div>
                            </div>

                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="clueDiv address">
                    <div class="clue_info">地址信息</div>
                    <div class="clue_content">
                        <div class="float_left floatrow">
                            <div class="row1 left_row">
                                <div class="labelDiv">
                                    <label for="street" class="label">街道</label>
                                </div>
                                <div class="cons">
                                    <input type="text" name="street" id="street">
                                </div>
                            </div>
                            <div class="row2 left_row">
                                <div class="labelDiv">
                                    <label for="province" class="label">省/市</label>
                                </div>
                                <div class="cons">
                                    <input type="text" name="province" id="province">
                                </div>
                            </div>
                            <div class="row3 left_row">
                                <div class="labelDiv">
                                    <label for="country" class="label">国家/地区</label>
                                </div>
                                <div class="cons">
                                    <input type="text" name="country" id="country">
                                </div>
                            </div>
                        </div>
                        <div class="float_right floatrow">
                            <div class="row_rt1 left_row">
                                <div class="labelDiv">
                                    <label for="city" class="label">城市</label>
                                </div>
                                <div class="cons">
                                    <input type="text" name="city" id="city">
                                </div>
                            </div>
                            <div class="row_rt2 left_row">
                                <div class="labelDiv">
                                    <label for="code" class="label">邮编</label>
                                </div>
                                <div class="cons">
                                    <input type="text" name="code" id="code">
                                </div>
                            </div>

                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="clueDiv describe">
                    <div class="clue_info">描述</div>
                    <div class="clue_content">
                        <div class="floatrow">
                            <div class="miaorow left_row">
                                <div class="miaoshu1 labelDiv" style="float: none;">
                                    <label for="miaoshu" class="label">描述</label>
                                </div>
                                <div class="miaoshu2" style="float: none;">
                                    <textarea name="" id="" style="width:1380px; height:31px;margin-top:10px;"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>

</body>

</html>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script>
    $(function () {
        var offsetTop = $(".clue_top").offset().top;
        $(document).on('scroll', function () {
            if ($(document).scrollTop() > offsetTop) {
                $('.clue_top').css({
                    "position": "fixed", "top": "0px", "left": "0px", "width": "100%", "z-index": "80", "box-shadow": "rgb(229, 229, 229) 0px 1px 3px"
                })
            } else {
                $('.clue_top').css({
                    "width": "100%",
                    "height": "65px",
                    "margin": " 0 auto",
                    "background-color": "#f8f8f8",
                    "border-bottom": "1px solid #eee"
                });
            }
        });
    });

    $(".floatrow .left_row").each(function (index, element) {
        $(this).on("click", function () {
            $(this).children(".cons").css({ "border-bottom": "1px solid #208aed" });
            $(this).not().eq(index).css({ "border-bottom": "1px solid #f0f0f0" });
        });


    });
    // $(".floatrow .left_row").on("click", function () {




    // $(this).children(".cons").css({ "border-bottom": "1px solid #208aed" }).children("input").focus();
    // $(this).children(".cons").children("input").on("blur", function () {
    //     $(this).parent(".cons").css({ "border-bottom": "1px solid #f0f0f0" });
    // });
    // $(this).children(".cons").children("input").on("focus", function () {
    //     $(this).parent(".cons").css({ "border-bottom": "1px solid #208aed" });
    // });

    // });

    // $(".floatrow .left_row").on("click", function () {
    //     $(this).children(".cons").css({ "border-bottom": "1px solid #208aed" }).children("input").focus();
    //     $(this).children(".cons").children("input").on("blur", function () {
    //         $(this).parent(".cons").css({ "border-bottom": "1px solid #f0f0f0" });
    //     });
    //     $(this).children(".cons").children("input").on("focus", function () {
    //         $(this).parent(".cons").css({ "border-bottom": "1px solid #208aed" });
    //     });

    // });


    $(".floatrow .miaorow").on("click", function () {
        $(this).children(".miaoshu2").css({ "border-bottom": "1px solid #208aed" });
    });
</script>