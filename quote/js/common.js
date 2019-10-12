var CartItems = function(product, qty){
	

}

var ProductModel = function(product) {
	
    var self = this;
	var subtotal;
	var grandTotal;
	var discount;
	
	var tax;

	
    self.product = ko.observableArray(product);
 
    self.addProduct = function() {
        self.product.push({
            name: "",
			desc: "",
            price: "",
			qty: ""
        });
    };
	

 
    self.removeProduct = function(product) {
        self.product.remove(product);
    };
 
    self.save = function(form) {
        alert("Could now transmit to server: " + ko.utils.stringifyJson(self.products));
        // To actually transmit to server as a regular form post, write this: ko.utils.postJson($("form")[0], self.gifts);
    };
	
};
 
var viewModel = new ProductModel([
    { name: "Tall Hat", desc: "a hat",price: "39.95",qty: "2", lineAmount: "0"},
    { name: "Long Cloak", desc: "a cloak",price: "120.00",qty: "2", lineAmount: "0"}
]);

ko.applyBindings(viewModel);