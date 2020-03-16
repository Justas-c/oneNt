/**
 * All the functions relevant to implementing javascript search
 * funcs: rajonSelect, searchProperties, myAjax, createCard
 */

// Add rajonai according to coressponding city name
function rajonSelect(){
    let cityField = document.getElementById('mainNavCity');
    let districtField = document.getElementById('mainNavRajon');
    districtField.innerHTML = 'Rajonai';

    console.log(cityField);
    console.log(districtField);

    // i switch statement galima bus pakeist
	if(cityField.value == "Vilnius"){
		var Rajonai = ['Senamiestis', 'Naujamiestis', 'Pilaitė'];
	} else if(cityField.value == "Kaunas"){
		var Rajonai = ['Senamiestis', 'Naujamiestis', 'Aleksotas'];
	} else if(cityField.value == "Tauragė"){
		var Rajonai = ['Senamiestis', 'Naujamiestis', 'Rajonas'];
	}

    console.log(Rajonai);

    if (cityField.value) {
        for (var i = 0; i < Rajonai.length; i++) {
            var Option = document.createElement("option");
            Option.value = Rajonai[i];
            Option.innerHTML = Rajonai[i];
            districtField.options.add(Option);
        }
    }
}

// add event listener
document.getElementById('mainNavCity').addEventListener('change', rajonSelect);
//----------------------------------------------------------------------------//

// Construct search url
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

    // Construct endpoint url:
    // TODO: change to constant
    let urlEndpointStr = 'onent.test/search/mainSearchEP';
    // Search params array
    let paramArr = [ntTypeVal, plotasVal, kambSkVal, apdailaVal, miestasVal, rajonasVal];
    let paramNameArr = ['type', 'plotas', 'kambariu_skaicius', 'apdaila', 'miestas', 'rajonas']
    // add only selected values to array
    $counter = 0;
    for (var i = 0; i < paramArr.length; i++) {
        //console.log(i);
        if (paramArr[i] != '' && $counter == 0 ){
            urlEndpointStr += '?' + paramNameArr[i] + '=' +  paramArr[i]
            $counter += 1;
        } else if(paramArr[i] != '') {
            urlEndpointStr += '&' + paramNameArr[i] + '=' +  paramArr[i]
        }

    }
    return urlEndpointStr;
}

// ajax
function myAjax() {
    console.log('my ajax func');
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // info:
            console.log(this.responseText);

            //found properties json
            var foundProperties = JSON.parse(this.responseText);
            // clear div
            document.getElementById('search-results').innerHTML = '';

            // add all new cards created to search-results element:
            var allCards = '';
            for (var i = 0; i < foundProperties.length; i++) {
                allCards += createCard(foundProperties[i]);
            }

            // Display cards:
            document.getElementById('search-results').innerHTML = allCards;
        }
    }
    ep = 'http://' + searchProperties();
    xhttp.open("GET", ep, true);
    xhttp.send();
}

/**
 * helper func.
 * def: will create a card element tree and add values. All in string format.
 */
function createCard(Property) {
    // all the html divs

    // 1) form
    //div1 col
    const mainCol = '<div class="col-12 col-md-4">';
    const mainColclose = '</div>';
    // div2 card
    const card = '<div class="card my-3 mx-1">';
    const cardclose = '</div>';
    //div3 link
    link =  '<a href="/individual-property-{id}">';
    linkclose = '</a>';
    //div4 img
    var img = '<img class="card-img-top card-img" src="/images/uploads/{img}" alt="img">';
    //div5 cardbody
    const cardBody = '<div class="card-body">';
    const cardBodyclose = '</div>';
    //div6 row
    const cardBodyRow = '<div class="row">';
    const cardBodyRowclose ='</div>';

    var gatveMiestas = '<div class="col-12 p-1"> {gatveMiestas} </div>';
    var plotas       = '<div class="col-3 p-1"> {plotas} m² </div>';
    var kambSkaicius  = '<div class="col-3 p-1"> {kambSkaicius} - kamb </div>';
    var kaina        = '<div class="col-3 p-1"> € {kaina} </div>';

    // 2) add values to the form
    link = link.replace('{id}', Property['id']);
    img = img.replace('{img}', Property['nuotraukos']);
    gatveMiestas = gatveMiestas.replace('{gatveMiestas}', Property['gatve']);
    plotas       = plotas.replace('{plotas}', Property['plotas']);
    kambSkaicius  = kambSkaicius.replace('{kambSkaicius}', Property['KambariuSkaicius']);
    kaina        = kaina.replace('{kaina}', Property['kaina']);

    // construct the card str
    var finalCardStr = mainCol + card + link + img + linkclose + cardBody + cardBodyRow + gatveMiestas + plotas + kambSkaicius + kaina + '</div></div></div></div>';
    console.log(finalCardStr);
    return finalCardStr;

}

// event listener
document.getElementById('mainpage-search').addEventListener('click', myAjax);
