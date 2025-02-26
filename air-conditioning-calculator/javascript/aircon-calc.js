var CalcCode = document.getElementById("AirConCalcContainer").innerHTML;

if (CalcCode.indexOf("href=\"http://www.watkinshire.co.uk/air-conditioning-hire/") == -1) {
	document.getElementById("AirConCalcContainer").innerHTML = "";
}
else {
	if (CalcCode.indexOf("nofollow") > -1) {
		document.getElementById("AirConCalcContainer").innerHTML = "";
	}
}

function IsNumeric(IntText) {
	var ValidChars = "0123456789.";
	var IsNumber = true;
	var Char;
	
	for (LoopChar = 0; LoopChar < IntText.length && IsNumber == true; LoopChar++) { 
		Char = IntText.charAt(LoopChar); 
		
		if (ValidChars.indexOf(Char) == -1) {
			IsNumber = false;
		}
	}
	
	if (IntText.length == 0) {
		IsNumber = false;
	}
	
	return IsNumber;
}

function RoundInt(Int, DecPoints) {
	if (!DecPoints) return Math.round(Int);
	
	if (Int == 0) {
		var Decimals = "";
		for(var LoopDec = 0; LoopDec < DecPoints; LoopDec++) Decimals += "0";
		return "0."+Decimals;
	}

	var Exponent = Math.pow(10,DecPoints);
	var NewInt = Math.round((Int * Exponent)).toString();
	NewInt = NewInt.slice(0,-1 * DecPoints) + "." + NewInt.slice(-1 * DecPoints);
	
	if (NewInt.charAt(0) == ".") {
		NewInt = "0" + NewInt;
	}
	
	return NewInt;
}

function CalculateVolume (Length, Width, Total) {
	LengthCheck = IsNumeric(document.getElementById(Length).value);
	WidthCheck = IsNumeric(document.getElementById(Width).value);
	
	if (LengthCheck == true && WidthCheck == true) {
		document.getElementById(Total).value = (document.getElementById(Length).value * document.getElementById(Width).value * 2.5);
	}
	else {
		document.getElementById(Total).value = "";
	}
	
	CalculateArea('AirConCalcElectricItems','AirConCalcPersonnel','AirConCalcType','AirConCalcArea','AirConCalcDuty','AirConCalcVolume');
}

function CalculateArea (Electrical, Personnel, Type, Value, Duty, Volume) {
	ElectricalCheck = IsNumeric(document.getElementById(Electrical).value);
	PersonnelCheck = IsNumeric(document.getElementById(Personnel).value);
	TypeCheck = IsNumeric(document.getElementById(Type).value);
	VolumeCheck = IsNumeric(document.getElementById(Volume).value);
	
	if (ElectricalCheck == true && PersonnelCheck == true && TypeCheck == true && VolumeCheck == true) {
		document.getElementById(Duty).value = RoundInt((((document.getElementById(Volume).value * document.getElementById(Type).value) / 3412) + ((document.getElementById(Electrical).value * 250) + (document.getElementById(Personnel).value * 300)) / 3412), 2);
		
		var ACName = new Array("KwikCOOL 8 Duct", "KwikCOOL 10 Duct", "KwikCOOL 15 Duct", "KwikCOOL 15 Split", "KwikCOOL 21 Duct", "KwikCOOL 22 Split", "KwikCOOL 25 Duct", "KwikCOOL 25 Split", "KwikCOOL SAC25 Split", "KwikCOOL 27 Duct", "KwikCOOL 35 Duct");
		var ACValue = new Array(2.34, 2.93, 4.5, 4.5, 6.27, 6.4, 7.3, 7.4, 7.4, 7.9, 10.25);
		var Required = "";
		
		for (LoopAC = 0; LoopAC <= 10; LoopAC++) {
			if ((document.getElementById(Duty).value / ACValue[LoopAC]) > 1) {
				Required = "<p><span>We recommend:</span><br />" + RoundInt((document.getElementById(Duty).value / ACValue[LoopAC]), 1) + " x " + ACName[LoopAC] + " (" + ACValue[LoopAC] + "Kw Rating Per Unit) A/C unit(s)</p>";
			}
		}
		
		if (Required == "") {
			Required = "<p><span>We recommend:</span><br />1 x " + ACName[0] + " (" + ACValue[0] + "Kw Rating Per Unit) A/C unit(s)</p>";
		}
		
		document.getElementById("AirConCalcResults").innerHTML = Required;
	}
	else {
		document.getElementById(Duty).value = "";
	}
}