<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="http://localhost/wenda/Admin/Tpl/Public/Css/public.css" />
	<script type="text/javascript" src="http://localhost/wenda/Admin/Tpl/Public/Js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="http://localhost/wenda/Admin/Tpl/Public/Js/public.js"></script>	
</head>

<body>
	<table class="table">
		<tr>
			<td class="th" colspan="20">用户列表</td>
		</tr>
		<tr class="tableTop">
			<td class="tdLittle1">ID</td>
			<td>用户名</td>
			<td>回答数</td>
			<td>被采纳数</td>
			<td>提问数</td>
			<td>金币</td>
			<td>经验</td>
			<td>最后登录时间</td>
			<td>最后登录IP</td>
			<td>注册时间</td>
			<td>帐号状态</td>
			<td>操作</td>
		</tr>
		<?php if(isset($user) && !empty($user)):$_id_n=0;$_index_n=0;$lastn=min(1000,count($user));
$hd["list"]["n"]["first"]=true;
$hd["list"]["n"]["last"]=false;
$_total_n=ceil($lastn/1);$hd["list"]["n"]["total"]=$_total_n;
$_data_n = array_slice($user,0,$lastn);
if(count($_data_n)==0):echo "";
else:
foreach($_data_n as $key=>$n):
if(($_id_n)%1==0):$_id_n++;else:$_id_n++;continue;endif;
$hd["list"]["n"]["index"]=++$_index_n;
if($_index_n>=$_total_n):$hd["list"]["n"]["last"]=true;endif;?>

			<tr>
			
				<td><?php echo $n['uid'];?></td>
				<td><?php echo $n['username'];?></td>
				<td><?php echo $n['answer'];?></td>
				<td><?php echo $n['accept'];?></td>
				<td><?php echo $n['ask'];?></td>
				<td><?php echo $n['point'];?></td>
				<td><?php echo $n['exp'];?></td>
				<?php if($n['logintime'] == 0){?>
					<td>从未登陆</td>
				<?php  }else{ ?>
					<td><?php echo date('Y-m-d',$n['logintime']);?></td>
				<?php }?>
				<?php if($n['loginip'] == ''){?>
					<td>从未登陆</td>
				<?php  }else{ ?>
					<td><?php echo $n['loginip'];?></td>
				<?php }?>
				
				<td><?php echo date('Y-m-d',$n['restime']);?></td>
				<?php if($n['lock'] == 1){?>
					<td>锁定</td>
				<?php  }else{ ?>
					<td>正常</td>
				<?php }?>
				<?php if($n['lock'] == 1){?>
					<td><a href="<?php echo U('User/deblocking', array('uid'=>$n['uid']));?>">解锁</a></td>
				<?php  }else{ ?>
					<td><a href="<?php echo U('User/lock_user', array('uid'=>$n['uid']));?>">锁定</a></td>
				<?php }?>
			
			</tr>
		<?php $hd["list"]["n"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
	</table>

</body>
</html>