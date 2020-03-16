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

            //found properties
            var foundProperties = JSON.parse(this.responseText);
            // clear div
            document.getElementById('search-results').innerHTML = '';

            var allCards = '';

            for (var i = 0; i < foundProperties.length; i++) {
                //createCard(foundProperties[i]);
                allCards += createCard(foundProperties[i]);
            }

            // add all new cards created to search-results element:

            // Display cards:
            document.getElementById('search-results').innerHTML = allCards;

            console.log(foundProperties);
            // 1) create element
            var propertydiv = document.createElement('div');
            //propertyDiv.className = 'col-12 col-md-4';
            for (var i = 0; i < foundProperties.length; i++) {
                console.log(foundProperties.length);
            }
        }
    }
    ep2 = 'http://' + searchProperties();
    xhttp.open("GET", ep2, true);
    xhttp.send();
}

/**
 * helper func.
 * def: will create a card element tree and add values. All in string format.
 */
function createCard(Property) {
    // 1) form
    //div1 col
    const mainCol = '<div class="col-12 col-md-4">';
    const mainColclose = '</div>';
    // div2 card
    const card = '<div class="card my-3 mx-1">';
    const cardclose = '</div>';
    //div3 img
    var img = '<a href="#"><img class="card-img-top card-img" src="/images/uploads/{img}" alt="img"></a>';
    //div4 cardbody
    const cardBody = '<div class="card-body">';
    const cardBodyclose = '</div>';
    //div5 row
    const cardBodyRow = '<div class="row">';
    const cardBodyRowclose ='</div>';

    var gatveMiestas = '<div class="col-12 p-1"> {gatveMiestas} </div>';
    var plotas       = '<div class="col-3 p-1"> {plotas} m² </div>';
    var kambSkaicius  = '<div class="col-3 p-1"> {kambSkaicius} - kamb </div>';
    var kaina        = '<div class="col-3 p-1"> € {kaina} </div>';

    // 2) add values to the form
    img = img.replace('{img}', Property['nuotraukos']);
    gatveMiestas = gatveMiestas.replace('{gatveMiestas}', Property['gatve']);
    plotas       = plotas.replace('{plotas}', Property['plotas']);
    kambSkaicius  = kambSkaicius.replace('{kambSkaicius}', Property['KambariuSkaicius']);
    kaina        = kaina.replace('{kaina}', Property['kaina']);

    var finalCardStr = mainCol + card + img + cardBody + cardBodyRow + gatveMiestas + plotas + kambSkaicius + kaina + '</div></div></div></div>';
    console.log(finalCardStr);
    return finalCardStr;
    // console.log(finalCardStr);
    // helpinfo:
    //const finalMarkup = products.map(({ title }) => myTemplate.replace('{title}', title));
}
    // 3) combine



    // sample form
    /**
    <div class="col-12 col-md-4"><div class="card my-3 mx-1">
        <a href="#"><img src="" alt="img"></a>
        <div class="card-body">
            <div class="row">
                <div class="col-12 p-1">1</div>
                <div class="col-3 p-1">2</div>
                <div class="col-4 p-1">3</div>
                <div class="col-4 p-1">4</div>
            </div>
        </div>
    </div></div>
    */



// row_elem = document.createElement('div');
// row_elem.className = 'row';
// somehow it didn't work on multiple lines
// var row1 = '<div class="row">';
// var row2 = '</div>'
// var x = [{title: 'world'}, {title: 'world2'}];

// somehow it didn't register as html string on multiline so i packed it on one line
//var singleCardMarkup = '<div class="col-12 col-md-4"><div class="card my-3 mx-1"><a href="#"><img src="" alt="img"></a><div class="card-body"><div class="row"><div class="col-12 p-1">{gatve,miestas}</div><div class="col-3 p-1">{plotas}</div><div class="col-4 p-1">City</div></div></div></div></div>';
//finalCardMarkup = singleCard.replace('{title}', 'rereqrqreqwe');
//finalCardMarkup = x.map(( { title } ) => singleCard.replace('{title}', title));
// console.log('founded:');
// console.log(foundProperties);
//
// for (var i = 0; i < foundProperties.length; i++) {
//     var singleProperty = foundProperties[i];
//     var gatve_miestas = foundProperties[i]['gatve'] + ', ' + foundProperties[i]['miestas']
//     var plotas = foundProperties[i]['plotas'] + ' m²';
//
//     //finalCardMarkup = singleProperty()
//     // const finalMarkup = products.map(({ title }) => myTemplate.replace('{title}', title))
//
//     finalCardMarkup = singleCardMarkup.replace('{gatve,miestas}', gatve_miestas);
//     finalCardMarkup = singleCardMarkup.replace('{plotas}', plotas);
//     //finalCardMarkup = singleCardMarkup.replace('{gatve,miestas}', gatve_miestas);
//     row1 += finalCardMarkup;
// }
// row1 += '</div>'; // closing row tag
// console.log(row1);
//
//
// console.log(finalCardMarkup);
// console.log('check1:');
// var xx = document.getElementById('search-results');
// console.log(singleCardMarkup);
// //xx.innerHTML = finalCardMarkup;
// xx.innerHTML = row1;
// console.log(xx);

//}
// add event listener
document.getElementById('mainpage-search').addEventListener('click', myAjax);
//----------------------------------------------------------------------------//

// info:
// const products = [{ title: 'gearbox' }, { title: 'drive shaft' }, { title: 'spark plug'}]
// const myTemplate = '<div class="product">{title}</div>'
// const finalMarkup = products.map(({ title }) => myTemplate.replace('{title}', title))
//
// document.getElementId('targetNode').innerHtml = finalMarkup
