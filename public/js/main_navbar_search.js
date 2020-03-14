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
//----------------------------------------------------------------------------//

// navbar search implentation
document.getElementById('mainpage-search').addEventListener('click', searchProperties);

function searchProperties() {

    //get all values selected form the form
    let ntType = document.getElementById('mainNavType');
    let plotas  = document.getElementById('mainNavPlotas');
    let apdaila = document.getElementById('mainNavApdaila');
    let miestas = document.getElementById('mainNavCity');
    let rajonas = document.getElementById('mainNavRajon');
    let kambSkaicius = document.getElementById('mainNavKambariuSkaicius');

    let ntTypeVal  = mainNavType.options[mainNavType.selectedIndex].value;
    let plotasVal  = mainNavPlotas.options[mainNavPlotas.selectedIndex].value;
    let apdailaVal = mainNavApdaila.options[mainNavApdaila.selectedIndex].value;
    let miestasVal = mainNavCity.options[mainNavCity.selectedIndex].value;
    let rajonasVal = mainNavRajon.options[mainNavRajon.selectedIndex].value;
    let kambSkVal  = mainNavKambariuSkaicius.options[mainNavKambariuSkaicius.selectedIndex].value;
    // lets check:
    // console.log(ntTipasVal);
    // console.log(miestasVal);
    // console.log(apdailaVal);
    // console.log(plotasVal);
    // console.log(apdailaVal);

    // TODO: change to constant
    // let urlEndpointStr2 = 'onent.test/search/mainSearchEP?tipas='
    // + ntTipasVal + '&plotas=' + plotasVal + '&kambariu_skaicius=' + kambSkVal + '&apdaila=' + apdailaVal +  '&miestas=' + miestasVal + '&rajonas=' + rajonasVal;


    // Construct endpoint url:

    // TODO: change to constant
    let urlEndpointStr = 'onent.test/search/mainSearchEP';
    // Search params array
    let paramArr = [ntTypeVal, plotasVal, kambSkVal, apdailaVal, miestasVal, rajonasVal];
    let paramNameArr = ['type', 'plotas', 'kambariu_skaicius', 'apdaila', 'miestas', 'rajonas']
    // add only selected values to array
    $counter = 0;
    for (var i = 0; i < paramArr.length; i++) {
        console.log(i);
        if (paramArr[i] != '' && $counter == 0 ){
            urlEndpointStr += '?' + paramNameArr[i] + '=' +  paramArr[i]
            $counter += 1;
        } else if(paramArr[i] != '') {
            urlEndpointStr += '&' + paramNameArr[i] + '=' +  paramArr[i]
        }

    }

    console.log(urlEndpointStr);



}

// info :
// var e = document.getElementById("ddlViewBy");
// var strUser = e.options[e.selectedIndex].text;
