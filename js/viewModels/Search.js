
function SearchViewModel () {

    self.hasResults = ko.observable(false);

    self.init = function () {

    }

    self.doSearch = function(){
        self.hasResults(true);
    }

    // Initialize View Model
        self.init();

};


ko.applyBindings(new SearchViewModel());

