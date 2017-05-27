<script src="js/jquery.js"></script>
<span><font style="font-size: 23px;">Randomize the colors until it's perfect!</font><br>
<button id='random' onclick="clicked()">Randomize</button>
<button id='random' onclick="reverting()">Don't like the result? Revert</button>
<br><a href="index.php" alt="index page">Start over</a>
</span>
<div id="animalObject" height="800" width="800">
<?php
if(isset($_GET['image'])){
	$img0 = $_GET['image'];
	$img = $img0;
	$img = "svg/".substr($img, 4).".svg";
	$handle = fopen($img, "r");
	$contents = fread($handle, filesize($img));
	echo $contents;
	fclose($handle);
	if(isset($_GET['num'])){
		$num = $_GET['num'];
		if((int)substr($img0, count($img0)-3)==0){
			$currentNumberAsString = substr($img0, count($img0)-2);
			$restOfString = substr($img0, 0, count($img0)-2);
		}
		else {
			$currentNumberAsString = substr($img0, count($img0)-3);
			$restOfString = substr($img0, 0, count($img0)-3);
		}
		if((int)$currentNumberAsString+1 > $num){
			$img2 = $restOfString."1";
		}
		else {
			$img2 = $restOfString."".(string)((int)$currentNumberAsString+1);
		}
	}
	else {
		$num = "";
		
	}
}
?>
</div>
<form action="randomizer.php" method="get">
<input type="hidden" name="num" value="<?php echo $num; ?>">
<input type="hidden" name="image" value="<?php echo $img2; ?>">
<input type="submit" id="buttons" value="Next image" name="submit">
</form>
</div>
<style>
	span {
		align: center;
		position: fixed;
		top: 0;
	}
</style>
<script>
	$("#animalObject").children("svg").eq(0).width("440").height("440");
	var revert = document.getElementById("animalObject").innerHTML;
	function reverting(){
		document.getElementById("animalObject").innerHTML = revert;
	}
	function darken(){
		var rand1 = randomColor();
		var randStroke1 = rand1;
		var strokeSplit = randStroke1.split("");
		for(j=1; j<strokeSplit.length; j++){
			if (strokeSplit[j]=="F") {
				strokeSplit[j]="D";
			}
			else if (strokeSplit[j]=="E") {
				strokeSplit[j]="C";
			}
			else if (strokeSplit[j]=="D") {
				strokeSplit[j]="B";
			}
			else if (strokeSplit[j]=="C") {
				strokeSplit[j]="A";
			}
			else if (strokeSplit[j]=="B") {
				strokeSplit[j]="9";
			}else if (strokeSplit[j]=="A") {
				strokeSplit[j]="8";
			}
			else if (strokeSplit[j]=="9") {
				strokeSplit[j]="7";
			}
			else if (strokeSplit[j]=="2") {
				strokeSplit[j]="1";
			}
			else if (strokeSplit[j]=="3") {
				strokeSplit[j]="1";
			}
			else if (strokeSplit[j]=="0") {
				strokeSplit[j]="1";
			}
		}
		randStroke1 = strokeSplit.join(""); 
		return [rand1, randStroke1];
	}
	function clicked(){
		/*var arr6 = document.getElementsByTagName("rect");
		var arr5 = arr6.concat(document.getElementsByTagName("circle"));
		var arr4 = arr5.concat(document.getElementsByTagName("ellipse"));
		var arr3 = arr4.concat(document.getElementsByTagName("polygon"));
		var arr2 = arr3.concat(document.getElementsByTagName("path"));
		var arr = arr2.concat(document.getElementsByTagName("pattern"));
		*/
		//$("circle, ellipse").attr("style", "fill:"+randomColor());
		var d = new Date();
		var time = d.getTime();
		if(time%2==0){
			$("polygon").attr("style", "stroke:"+randomColor()+";stroke-width:"+(Math.floor(Math.random()*4)+1).toString()+";fill:"+randomColor());
			//$("path").attr("style", "stroke:"+randomColor()+";stroke-width:"+(Math.floor(Math.random()*9)+1).toString()+";fill:"+randomColor());
			var length = $("#animalObject").find("path").length;
			if(length > 2){
				for(i=0; i<length-3; i++){
					$rand1 = randomColor();
					$randStroke1 = randomColor();
					$("#animalObject").find("path").eq(i).attr("style", "stroke:"+$randStroke1+";stroke-width:"+(Math.floor(Math.random()*4)+1).toString()+";fill:"+$rand1); 
					$("#animalObject").find("path").eq(i+1).attr("style", "stroke:"+randomColor()+";stroke-width:"+(Math.floor(Math.random()*4)+1).toString()+";fill:"+randomColor());
					$("#animalObject").find("path").eq(i+2).attr("style", "stroke:"+$randStroke1+";stroke-width:"+(Math.floor(Math.random()*4)+1).toString()+";fill:"+$rand1); 
				}
			}
			else {
				$("path").attr("style", "stroke:"+randomColor()+";stroke-width:"+(Math.floor(Math.random()*4)+1).toString()+";fill:"+randomColor());
			}
			$("pattern").attr("style", "stroke:"+randomColor()+";stroke-width:"+(Math.floor(Math.random()*4)+1).toString()+";fill:"+randomColor());
			$("rect").attr("style", "stroke:"+randomColor()+";stroke-width:"+(Math.floor(Math.random()*4)+1).toString()+";fill:"+randomColor());
		}
		else {
			var length = $("#animalObject").find("path").length;
			var rand1 = darken()[0];
			var randStroke1 = darken()[1];
			if(length > 2){
				for(i=0; i<length-3; i++){
					if($("#animalObject").find("path").eq(i).attr("style")==$("#animalObject").find("path").eq(i+1).attr("style")){
						$("#animalObject").find("path").eq(i).attr("style", "stroke:"+randStroke1+";stroke-width:"+(Math.floor(Math.random()*2)+1).toString()+";fill:"+rand1); 
						$("#animalObject").find("path").eq(i+1).attr("style", "stroke:"+randStroke1+";stroke-width:"+(Math.floor(Math.random()*2)+1).toString()+";fill:"+rand1); 
					}
					else {
						$("#animalObject").find("path").eq(i).attr("style", "stroke:"+randStroke1+";stroke-width:"+(Math.floor(Math.random()*2)+1).toString()+";fill:"+rand1); 
						$("#animalObject").find("path").eq(i+1).attr("style", "stroke:"+randomColor()+";stroke-width:"+(Math.floor(Math.random()*2)+1).toString()+";fill:"+randStroke1);
					}
					$("#animalObject").find("path").eq(i+2).attr("style", "stroke:"+randStroke1+";stroke-width:"+(Math.floor(Math.random()*2)+1).toString()+";fill:"+rand1); 
				}
			} 
			else if (length > 3){
				for(i=0; i<length-4; i++){
					if($("#animalObject").find("path").eq(i).attr("style")==$("#animalObject").find("path").eq(i+1).attr("style") &&
					$("#animalObject").find("path").eq(i+1).attr("style")==$("#animalObject").find("path").eq(i+2).attr("style") &&
					$("#animalObject").find("path").eq(i+2).attr("style")==$("#animalObject").find("path").eq(i+3).attr("style") &&
					$("#animalObject").find("path").eq(i+3).attr("style")==$("#animalObject").find("path").eq(i+4).attr("style")){
						$("#animalObject").find("path").eq(i).attr("style", "stroke:"+randStroke1+";stroke-width:"+(Math.floor(Math.random()*2)+1).toString()+";fill:"+rand1); 
						$("#animalObject").find("path").eq(i+1).attr("style", "stroke:"+randStroke1+";stroke-width:"+(Math.floor(Math.random()*2)+1).toString()+";fill:"+rand1); 
						$("#animalObject").find("path").eq(i+2).attr("style", "stroke:"+randStroke1+";stroke-width:"+(Math.floor(Math.random()*2)+1).toString()+";fill:"+rand1); 
						$("#animalObject").find("path").eq(i+3).attr("style", "stroke:"+randStroke1+";stroke-width:"+(Math.floor(Math.random()*2)+1).toString()+";fill:"+rand1);
						$("#animalObject").find("path").eq(i+4).attr("style", "stroke:"+randStroke1+";stroke-width:"+(Math.floor(Math.random()*2)+1).toString()+";fill:"+rand1); 
						$("#animalObject").find("path").eq(i+5).attr("style", "stroke:"+randStroke1+";stroke-width:"+(Math.floor(Math.random()*2)+1).toString()+";fill:"+rand1);
					}
					else if($("#animalObject").find("path").eq(i).attr("style")==$("#animalObject").find("path").eq(i+1).attr("style") &&
					$("#animalObject").find("path").eq(i+1).attr("style")==$("#animalObject").find("path").eq(i+2).attr("style") &&
					$("#animalObject").find("path").eq(i+2).attr("style")==$("#animalObject").find("path").eq(i+3).attr("style") &&
					$("#animalObject").find("path").eq(i+3).attr("style")!=$("#animalObject").find("path").eq(i+4).attr("style")){
						$("#animalObject").find("path").eq(i).attr("style", "stroke:"+randStroke1+";stroke-width:"+(Math.floor(Math.random()*2)+1).toString()+";fill:"+rand1); 
						$("#animalObject").find("path").eq(i+1).attr("style", "stroke:"+randStroke1+";stroke-width:"+(Math.floor(Math.random()*2)+1).toString()+";fill:"+rand1); 
						$("#animalObject").find("path").eq(i+2).attr("style", "stroke:"+randStroke1+";stroke-width:"+(Math.floor(Math.random()*2)+1).toString()+";fill:"+rand1); 
						$("#animalObject").find("path").eq(i+3).attr("style", "stroke:"+randStroke1+";stroke-width:"+(Math.floor(Math.random()*2)+1).toString()+";fill:"+rand1);
						$("#animalObject").find("path").eq(i+4).attr("style", "stroke:"+randStroke1+";stroke-width:"+(Math.floor(Math.random()*2)+1).toString()+";fill:"+rand1);
					}
				}
			}
			else if (length > 5){
				for(i=0; i<length-6; i++){
					if($("#animalObject").find("path").eq(i).attr("style")==$("#animalObject").find("path").eq(i+1).attr("style") &&
					$("#animalObject").find("path").eq(i+1).attr("style")==$("#animalObject").find("path").eq(i+2).attr("style") &&
					$("#animalObject").find("path").eq(i+2).attr( "style")==$("#animalObject").find("path").eq(i+3).attr("style") &&
					$("#animalObject").find("path").eq(i+3).attr("style")==$("#animalObject").find("path").eq(i+4).attr("style") &&
					$("#animalObject").find("path").eq(i+4).attr("style")==$("#animalObject").find("path").eq(i+5).attr("style")){
						$("#animalObject").find("path").eq(i).attr("style", "stroke:"+randStroke1+";stroke-width:"+(Math.floor(Math.random()*2)+1).toString()+";fill:"+rand1); 
						$("#animalObject").find("path").eq(i+1).attr("style", "stroke:"+randStroke1+";stroke-width:"+(Math.floor(Math.random()*2)+1).toString()+";fill:"+rand1); 
						$("#animalObject").find("path").eq(i+2).attr("style", "stroke:"+randStroke1+";stroke-width:"+(Math.floor(Math.random()*2)+1).toString()+";fill:"+rand1); 
						$("#animalObject").find("path").eq(i+3).attr("style", "stroke:"+randStroke1+";stroke-width:"+(Math.floor(Math.random()*2)+1).toString()+";fill:"+rand1);
						$("#animalObject").find("path").eq(i+4).attr("style", "stroke:"+randStroke1+";stroke-width:"+(Math.floor(Math.random()*2)+1).toString()+";fill:"+rand1); 
						$("#animalObject").find("path").eq(i+5).attr("style", "stroke:"+randStroke1+";stroke-width:"+(Math.floor(Math.random()*2)+1).toString()+";fill:"+rand1);
					}
					else if($("#animalObject").find("path").eq(i).attr("style")==$("#animalObject").find("path").eq(i+1).attr("style") &&
					$("#animalObject").find("path").eq(i+1).attr("style")==$("#animalObject").find("path").eq(i+2).attr("style") &&
					$("#animalObject").find("path").eq(i+2).attr("style")==$("#animalObject").find("path").eq(i+3).attr("style") &&
					$("#animalObject").find("path").eq(i+3).attr("style")==$("#animalObject").find("path").eq(i+4).attr("style") &&
					$("#animalObject").find("path").eq(i+4).attr("style")!=$("#animalObject").find("path").eq(i+5).attr("style")){
						$("#animalObject").find("path").eq(i).attr("style", "stroke:"+randStroke1+";stroke-width:"+(Math.floor(Math.random()*2)+1).toString()+";fill:"+rand1); 
						$("#animalObject").find("path").eq(i+1).attr("style", "stroke:"+randStroke1+";stroke-width:"+(Math.floor(Math.random()*2)+1).toString()+";fill:"+rand1); 
						$("#animalObject").find("path").eq(i+2).attr("style", "stroke:"+randStroke1+";stroke-width:"+(Math.floor(Math.random()*2)+1).toString()+";fill:"+rand1); 
						$("#animalObject").find("path").eq(i+3).attr("style", "stroke:"+randStroke1+";stroke-width:"+(Math.floor(Math.random()*2)+1).toString()+";fill:"+rand1);
						$("#animalObject").find("path").eq(i+4).attr("style", "stroke:"+randStroke1+";stroke-width:"+(Math.floor(Math.random()*2)+1).toString()+";fill:"+rand1);
					}
					else if($("#animalObject").find("path").eq(i).attr("style")==$("#animalObject").find("path").eq(i+1).attr("style") &&
					$("#animalObject").find("path").eq(i+1).attr("style")==$("#animalObject").find("path").eq(i+2).attr("style") &&
					$("#animalObject").find("path").eq(i+2).attr("style")==$("#animalObject").find("path").eq(i+3).attr("style") &&
					$("#animalObject").find("path").eq(i+3).attr("style")!=$("#animalObject").find("path").eq(i+4).attr("style") &&
					$("#animalObject").find("path").eq(i+4).attr("style")!=$("#animalObject").find("path").eq(i+5).attr("style")){
						$("#animalObject").find("path").eq(i).attr("style", "stroke:"+randStroke1+";stroke-width:"+(Math.floor(Math.random()*2)+1).toString()+";fill:"+rand1); 
						$("#animalObject").find("path").eq(i+1).attr("style", "stroke:"+randStroke1+";stroke-width:"+(Math.floor(Math.random()*2)+1).toString()+";fill:"+rand1); 
						$("#animalObject").find("path").eq(i+2).attr("style", "stroke:"+randStroke1+";stroke-width:"+(Math.floor(Math.random()*2)+1).toString()+";fill:"+rand1); 
						$("#animalObject").find("path").eq(i+3).attr("style", "stroke:"+randStroke1+";stroke-width:"+(Math.floor(Math.random()*2)+1).toString()+";fill:"+rand1);
					}
					else if($("#animalObject").find("path").eq(i).attr("style")==$("#animalObject").find("path").eq(i+1).attr("style") &&
					$("#animalObject").find("path").eq(i+1).attr("style")==$("#animalObject").find("path").eq(i+2).attr("style") &&
					$("#animalObject").find("path").eq(i+2).attr("style")!=$("#animalObject").find("path").eq(i+3).attr("style") &&
					$("#animalObject").find("path").eq(i+3).attr("style")!=$("#animalObject").find("path").eq(i+4).attr("style") &&
					$("#animalObject").find("path").eq(i+4).attr("style")!=$("#animalObject").find("path").eq(i+5).attr("style")){
						$("#animalObject").find("path").eq(i).attr("style", "stroke:"+randStroke1+";stroke-width:"+(Math.floor(Math.random()*2)+1).toString()+";fill:"+rand1); 
						$("#animalObject").find("path").eq(i+1).attr("style", "stroke:"+randStroke1+";stroke-width:"+(Math.floor(Math.random()*2)+1).toString()+";fill:"+rand1); 
						$("#animalObject").find("path").eq(i+2).attr("style", "stroke:"+randStroke1+";stroke-width:"+(Math.floor(Math.random()*2)+1).toString()+";fill:"+rand1); 
					}
				}
			}
			var lastNum = $("#animalObject").find("path").length-1;
			$("#animalObject").find("path").eq(lastNum).attr("style", "stroke:"+randomColor()+";stroke-width:"+(Math.floor(Math.random()*9)+1).toString()+";fill:"+randomColor());
		}
		/*while(arr.length > 0){
			for (i=0; i<arr.length; i++){
				var temp = [arr[i]];
				var color = randomColor();
				for (j=1; j<arr.length; j++){
					if(arr[i].getAttribute("style")==arr[j].getAttribute("style") && i != j){
						temp.push(arr[j]);
						arr.splice(i, 1);
						arr.splice(j, 1);					
					}
				}
				for(k=0; k<temp; k++){
					var fillColor = "fill:"+color;
					temp[k].setAttribute("style", fillColor);
				}
			}
		}
		var color = randomColor();
		for (i=0; i<arr.length; i++){
			var style = "fill:"+color;
			arr[i].setAttribute("style", style);
		}
		color = randomColor();
		for (i=0; i<arr2.length; i++){
			var style = "fill:"+color;
			arr2[i].setAttribute("style", style);
		}
		color = randomColor();
		for (i=0; i<arr3.length; i++){
			var style = "fill:"+color;
			arr3[i].setAttribute("style", style);
		}
		color = randomColor();
		for (i=0; i<arr4.length; i++){
			var style = "fill:"+color;
			arr4[i].setAttribute("style", style);
		}
		color = randomColor();
		for (i=0; i<arr5.length; i++){
			var style = "fill:"+color;
			arr5[i].setAttribute("style", style);
		}
		color = randomColor();
		for (i=0; i<arr6.length; i++){
			var style = "fill:"+color;
			arr6[i].setAttribute("style", style);
		}*/
	}
	function randomColor() {
		//from https://www.hscripts.com/codes-snippets/PHP/random-hex-color.php
		var rand = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f'];
		var color = "#"+rand[Math.floor(Math.random()*15)+1]+rand[Math.floor(Math.random()*15)+1]+rand[Math.floor(Math.random()*15)+1]+rand[Math.floor(Math.random()*15)+1]+rand[Math.floor(Math.random()*15)+1]+rand[Math.floor(Math.random()*15)+1];
		return color;
	}
</script>