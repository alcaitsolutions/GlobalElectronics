
let CustomerModel = function(firstName,
						lastName,
						customerId,
						email,
						address1,
						address2,
						city,
						state,
						zip,
						phone ){
							
    this.firstName = ko.observable(firstName);
    this.lastName = ko.observable(lastName);
	this.customerId = ko.observable(customerId);
    this.email = ko.observable(email);
    this.address1 = ko.observable(address1);  
	this.address2 = ko.observable(address2);
    this.city = ko.observable(city);
    this.state = ko.observable(state);
    this.zip = ko.observable(zip);  	
	this.phone = ko.observable(phone);  
}



function CustomerViewModel () {

    var self = this; // Scope Trick


    /* Edit Modal Observables */
    self.eFirstName = ko.observable();
    self.eLastName = ko.observable();
    self.eCustomerId = ko.observable();
    self.eAddress1 = ko.observable();
	self.eAddress2 = ko.observable();
	self.eCity = ko.observable();
	self.eState = ko.observable();
    self.eZip = ko.observable();
    self.eEmail = ko.observable();
	self.ePhone = ko.observable();
	
    /* Add Modal Observables */
    self.aFirstName = ko.observable();
    self.aLastName = ko.observable();
    self.aCustomerId = ko.observable();
    self.aAddress1 = ko.observable();
	self.aAddress2 = ko.observable();
	self.aCity = ko.observable();
	self.aState = ko.observable();
    self.aZip = ko.observable();
    self.aEmail = ko.observable();
	self.aPhone = ko.observable();

    /**
     * Observable Arrays
     */
    self.customers = ko.observableArray();

    self.init = function () {

        $("#wrapper").toggleClass("toggled");

        /* Get All Customers's */
        $.getJSON(app.customerUrl,
            function (data) {        
                $.each(data.data,
                    function (key, val) {
                        self.customers.push(new CustomerModel(
							
							val.firstName,
							val.lastName,
                            val.customerId,
                            val.email,
							val.address1,
							val.address2,
							val.city,
							val.state,
							val.zip,
							val.phone
                           
                        ));
                    });

            });
    }

    /* Edit  */
    self.editCustomer = function (data, event) {

        console.log(data.firstName());

        /* Show Modal Manually */
        $("#editCustomer").modal("show");

        /* Pre-Populate Text Fields */
		self.eFirstName ( data.firstName());
		self.eLastName ( data.lastName());
		self.eCustomerId ( data.customerId());
		self.eAddress1 (data.address1());
		self.eAddress2 ( data.address2());
		self.eCity ( data.city());
		self.eState ( data.state());
		self.eZip ( data.zip());
		self.ePhone ( data.phone());
    }

    /* Send the Edit Ajax Call to endpoint */
    self.updateCustomer = function () {
        /* Object to Send */
        var editObj = {
            firstName: self.eFirstName(),
            lastName: self.eLastName(),
            customerId: self.eCustomerId(),
            address1: self.eAddress1(),
			address2: self.eAddress2(),
			city: self.eCity(),
			state: self.eState(),
			zip: self.eZip(),
			phone: self.ePhone
        }

        /* Send PUT Ajax Call */ 
        sendToEndpoint(app.customerUrl, 'put', editObj);
    }


    self.add = function () {

        /* Build Object */
        var addObj = {
            firstName: self.aFirstName(),
            lastName: self.aLastName(),
            customerId: self.aCustomerId(),
            address1: self.aAddress1(),
			address2: self.aAddress2(),
			city: self.aCity(),
			state: self.aState(),
			zip: self.aZip(),
			phone: self.aPhone
        }

        /* Send POST Ajax Call */
        sendToEndpoint(app.customerUrl, 'post', addObj);

    }

    self.delete = function (customer) {
        
        //sendToEndpoint(OemConfig.oemUrl, 'put', editObj);
    }

    // Initialize View Model
        self.init();

};


ko.applyBindings(new CustomerViewModel());

