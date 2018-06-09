```
 <?php
//我常常忘记的打印*的方法
class xin{
	function xx($x){
		for($i=0;$i <=$x;$i++){
			for($k=0;$k<($x-$i);$k++){
			echo "&nbsp;";
			}
			for($j=0;$j<($i-1)*2+1;$j++){
				echo "*";
			};echo "<br>";
		}
	}
}
$xing = 90;
$s = new xin();
$s->xx($xing);

?>
```
