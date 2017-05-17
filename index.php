<!DOCTYPE html>
<html>
<head>
	<script src="js/jquery.js"></script>
	<title>Erintuitive's Psychic Place</title>
</head>
<body>
	<!-- animal or human? -->
	<div id="avatarOptions">
		Is your character an animal?<input type="checkbox" id="notHuman" name="species" value="animal">
	</div>
		<button id="next" onclick="nextOptions()">Next</button>
	<script>	
		$("#top1").hide();
		$("#bottom1").hide();
		$("#hat1").hide();
		$("#gloves1").hide();
		$("#ears1").hide();
		$("#necklace1").hide();
		$("#shoes1").hide();
		$("#eyewear1").hide();
		$("#robe1").hide();
		function nextOptions() {
			if(document.getElementById("notHuman").checked == false){
				avatarOptions.innerHTML = '<input type="radio" name="gender" value="male"> Male<br><input type="radio" name="gender" value="female"> Female<br><input type="radio" name="gender" value="other"> Other<br>Skin color<input type="color" name="skinColor" value="#ff0000"><br>Hair color<input type="color" name="hairColor" value="#ff0000"><br>Eye color<input type="color" name="eyeColor" value="#ff0000"><br></div><div id="top1">Top color<input type="color" name="topColor" value="#ff0000"><br></div><div id="bottom1">Bottom color<input type="color" name="bottomColor" value="#ff0000"><br></div><div id="hat1">Hat color<input type="color" name="hatColor" value="#ff0000"><br></div><div id="gloves1">Glove color<input type="color" name="gloveColor" value="#ff0000"><br></div><div id="ears1">Custom ears/earring color<input type="color" name="necklaceColor" value="#ff0000"><br></div><div id="necklace1">Necklace color<input type="color" name="necklaceColor" value="#ff0000"><br></div><div id="shoes1">Shoe color<input type="color" name="shoeColor" value="#ff0000"><br></div><div id="eyewear1">Eyewear color<input type="color" name="eyewearColor" value="#ff0000"><br></div><div id="robe1">Robe/dress color<input type="color" name="robeColor" value="#ff0000"><br></div>';
				document.getElementById("avatarOptions").setAttribute("class", "human");
			}
			else {
				document.getElementById("avatarOptions").setAttribute("class", "animal");
			}
			if(document.getElementById("check").getAttribute("value")=="human1")
			avatarOptions.innerHTML = '<input type="checkbox" id="top" name="top" value="top">I want to wear a top<br><input type="checkbox" id="bottom" name="bottom" value="bottom">I want to wear a bottom<br><input type="checkbox" id="hat" name="hat" value="hat">I want to wear headgear<br><input type="checkbox" id="gloves" name="gloves" value="gloves">I want to wear gloves<br><input type="checkbox" id="ears" name="ears" value="ears">I want to wear special ears or earrings<br><input type="checkbox" id="necklace" name="necklace" value="necklace">I want to wear neckwear<br><input type="checkbox" id="shoes" name="shoes" value="shoes">I want to wear shoes<br><input type="checkbox" id="eyewear" name="eyewear" value="eyewear">I want eyewear<br>';
			//<option value="shirtStripe1">Choose a shirt stripe</option><option value="shirtStripe2">Choose a second shirt stripe</option><option value="bottomStripe1">Choose a pants/skirt stripe color</option><option value="bottomStripe2">Choose another pants/skirt stripe color</option>
		}
		if($("#top").prop("checked")){
			$("#top1").show();
		}
		else {
			$("#top1").hide();
		}
		if($("#bottom").prop("checked")){
			$("#bottom1").show();
		}
		else {
			$("#bottom1").hide();
		}
		if($("#hat").prop("checked")){
			$("#hat1").show();
		}
		else {
			$("#hat1").hide();
		}
		if($("#gloves").prop("checked")){
			$("#gloves1").show();
		}
		else {
			$("#gloves1").hide();
		}
		if($("#ears").prop("checked")){
			$("#ears1").show();
		}
		else {
			$("#ears1").hide();
		}
		if($("#necklace").prop("checked")){
			$("#necklace1").show();
		}
		else {
			$("#necklace1").hide();
		}
		if($("#shoes").prop("checked")){
			$("#shoes1").show();
		}
		else {
			$("#shoes1").hide();
		}
		if($("#eyewear").prop("checked")){
			$("#eyewear1").show();
		}
		else {
			$("#eyewear1").hide();
		}
		if($("#robe").prop("checked")){
			$("#robe1").show();
		}
		else {
			$("#robe1").hide();
		}
	</script>
</body>
</html>