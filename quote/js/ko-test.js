// CLASS LineItem 
var LineItem = function(id, name, price, qty) {
	
  var self = this;
  
  this.id    = ko.observable(id);
  this.name  = ko.observable(name);
  this.price = ko.observable(price);
  this.qty 	 = ko.observable(qty);
  
  this.amount = ko.computed(function() { 
  		 var lineAmount = self.price() * self.qty();
		 if(lineAmount>0){
  		 return lineAmount;
		 } else {
			 return "";
		 }
    }); 
};

var view_model = function(){
	
	self = this;
	
	// Observables
	self.clientName = ko.observable();
	self.clientEmail = ko.observable();
	self.clientAddress = ko.observable();
	self.clientBillingAddress = ko.observable();
	self.quoteDate = ko.observable();
	self.quoteExpire = ko.observable();
	self.quoteNumber = ko.observable();
	
	
	// Server data
    self.item = ko.observableArray([
        new LineItem("32", "Cloak","35.99","1"),
        new LineItem("332", "Dagger","235.99","1"),
    ]);
	
	// Computed data
    self.subTotal = ko.computed(function() {
       var total = 0;
       for (var i = 0; i < self.item().length; i++)
           total += self.item()[i].amount();
       return total;
    }, this); 
	
	self.grandTotal = ko.computed(function(){
		var total = 0;
		total = self.subTotal();
		return total;
	});

	 /**
   * Actions
   */
  self.addItem = function() {
    // Instantiate a new CartItem object using the passed
    // in `Product` object, and then set a quantity of 1.
    var line_item = new LineItem();
 
    // Add the CartItem instance to the self.cart (Observable Array)
    self.item.push(line_item);
  };
  
   self.removeItem = function(item) { 
   		self.item.remove(item) 
   }
   
	self.save = function() {
			var dataToSave = $.map(self.item(), function(item) {
				return item.name() ? {
					productName: item.name(),
					quantity: item.qty(),
					itemId: item.id(),
					price: item.price(),
				} : undefined
			});
			
			// Need To Build Rest Of Object Here
			// Get From Form
			dataToSave.client = self.clientName();
			dataToSave.email =  self.clientEmail();
			dataToSave.clientAddress =  self.clientAddress();
			dataToSave.billingAddress =  self.clientBillingAddress();
			dataToSave.quoteDate =  self.quoteDate();
			dataToSave.estimateExpiry = self.quoteExpire();
			dataToSave.quoteNumber = self.quoteNumber();
			dataToSave.subTotal = self.subTotal();
			dataToSave.tax = "";
			dataToSave.discount = "";
			dataToSave.grandTotal = self.grandTotal();
			
			
			console.log(dataToSave);
			alert("TESTING: Could now send this to server: " + JSON.stringify(dataToSave));
		};
		
	
}



 
// Away we go...
ko.applyBindings(window.view_model);