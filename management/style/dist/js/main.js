const  BASE_URL = "http://localhost/yesilcamkuyumculuk/management/";
//const  BASE_URL = "https://yesilcamkuyumculuk/management/";

function arrayConvertToString (array) {
    let stringArray = "";
    array.forEach(x => {
        stringArray = stringArray + x + ";";
    })

    return stringArray.slice(0, -1);
}
