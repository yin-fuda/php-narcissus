<?php
$name=$_POST['name'];
$pass1=$_POST['pass1'];
$pass2=$_POST['pass2'];
if($name==null || $pass1==null){
	echo "用户名和密码不能为空";
	
}elseif($pass1!=$pass2){
	echo "两次密码不一致";
}else{
	$server="localhost";
	$username="root";
	$password='';
	$dbname="studb";
	$b=0;
	$conn=new mysqli($server,$username,$password,$dbname);
	$sql = "select * from users";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
			if($name==$row["username"]){
				$b=1;
				break;	
			}
			}
			}
	if($b){
		echo "用户名已创建";
	} else{
				$sj=(int)date('Ymd');
				$sql = "INSERT INTO users (username,password,ctime) VALUES ('$name','$pass1',$sj)";
							 
							if ($conn->query($sql) === TRUE) {
							    echo "新记录插入成功";
							} else {
							    echo "Error: " . $sql . "<br>" . $conn->error;
							}
			}
	$conn->close();
}

