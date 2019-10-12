let debugMode = true;
// sendToEndpoint(url, verb, obj);
var deviceUrl = "../js/mockData/devices.json";
var clientUrl = "../js/mockData/clients.json";
var serviceProviderUrl = "../js/mockData/serviceProviders.json";
var modelUrl = "../js/mockData/models.json";
var repairUrl = "../js/mockData/repairs.json";
var serialNumberTypeUrl = "../js/mockData/serialNumberTypes.json";
var categoryUrl = "../js/mockData/categories.json";


    let app = {
        oemUrl: ( debugMode === true ) ? "" : "https://pruttposapi20190906123202.azurewebsites.net/api/Oems",
        deviceUrl: (debugMode === true) ? deviceUrl : "https://pruttposapi20190906123202.azurewebsites.net/api/Device",
        clientUrl: (debugMode === true) ? clientUrl : "https://pruttposapi20190906123202.azurewebsites.net/api/Customer",
        repairUrl: (debugMode === true) ? repairUrl : "https://pruttposapi20190906123202.azurewebsites.net/api/Repair",
        repairItem: (debugMode === true) ? "" : "https://pruttposapi20190906123202.azurewebsites.net/api/repairItems",
        serviceProviderUrl: (debugMode === true) ? serviceProviderUrl : "https://pruttposapi20190906123202.azurewebsites.net/api/ServiceProvider",
        ticket: (debugMode === true) ? "" : "https://pruttposapi20190906123202.azurewebsites.net/api/Ticket",
        user: (debugMode === true) ?"" : "https://pruttposapi20190906123202.azurewebsites.net/api/users/getall",
        imageUrl: (debugMode === true) ? "" : "https://pruttposapi20190906123202.azurewebsites.net/api/image/upload",
        modelUrl: (debugMode === true) ? modelUrl : "https://pruttposapi20190906123202.azurewebsites.net/api/Model",
        serialNumberTypeUrl: (debugMode === true) ? serialNumberTypeUrl : "https://pruttposapi20190906123202.azurewebsites.net/api/??",
        customerUrl: "https://pruttposapi20190906123202.azurewebsites.net/api/Customer",
		categoryUrl: (debugMode === true) ? categoryUrl : "https://pruttposapi20190906123202.azurewebsites.net/api/getallcategories"
		
    }


function getRecordById(endpointUrl, id) {
    $.getJSON(endpointUrl + "/" + id, function (resultJson) {
        console.log(resultJson);
    });
    
}

function sendToEndpoint(url, verb, obj){

	$.ajax({
            url: url,
            type: verb,
            dataType: 'json',
            data: ko.toJSON(obj),
            contentType: 'application/json',
            success: function (result) {
                /* TODO: Replace with Sweet Alert */
                
                swal("Success! The process finished without any errors.", {
                    buttons: {
                       
                        ok: {
                            text: "Ok, let's continue!",
                            value: "okay",
                        }
                    },
                })
                    .then((value) => {
                        switch (value) {

                        

                            case "okay":
                                //location.reload();
                                break;

                            default:
                               // location.reload();
                        }
                    });
               
                
            },
            error: function (err) {
            /* TODO: Replace with Sweet Alert */
                 /* TODO: Replace with Sweet Alert */
                swal("Error", "An error occured. Please try again.", "error");
                //location.reload();
            },
            complete: function () {
            /* TODO: TT Mike about this */
               // window.location.href = '/Modules/ModulesOEM/';
            }
        });

} 