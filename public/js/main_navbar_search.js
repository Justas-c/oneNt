// Add rajonai according to coressponding city name
function rajonSelect(){
    let cityField = document.getElementById('mainNavCity');
    let districtField = document.getElementById('mainNavRajon');
    districtField.innerHTML = 'Rajonai';

    console.log(cityField);
    console.log(districtField);

    // i switch statement galima bus pakeist
	if(cityField.value == "Vilnius"){
		var Rajonai = ['Senamiestas', 'Naujamiestis', 'Pilaitė'];
	} else if(cityField.value == "Kaunas"){
		var Rajonai = ['Senamiestas', 'Naujamiestis', 'Aleksotas'];
	} else if(cityField.value == "Tauragė"){
		var Rajonai = ['Senamiestas', 'Naujamiestis', 'Rajonas'];
	}

    console.log(Rajonai);

    for (var i = 0; i < Rajonai.length; i++) {
        var Option = document.createElement("option");
        Option.value = Rajonai[i];
        Option.innerHTML = Rajonai[i];
        districtField.options.add(Option);
    }
}

// add event listener
document.getElementById('mainNavCity').addEventListener('change', rajonSelect);
