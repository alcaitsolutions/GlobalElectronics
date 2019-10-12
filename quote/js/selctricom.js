// Auth Basic Check
var userId;

var selectricom = {

    login: function(username, password){
        if(!username || !password){
            alert("Invalid username or password. Try again.")
        }   
    },

    tokenExist: function(){
        return false;
    },

    logout: function(){

    }

}