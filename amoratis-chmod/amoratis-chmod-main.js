window.onload=function(){

//ViewModel for Knockout JS
function ViewModel() {

    //Get the scope we need by declaring this variable
    var self = this;

    //Set up tracking for each of the three permission levels
    self.amo_exec = ko.observableArray([]);
    self.amo_read = ko.observableArray([]);
    self.amo_write = ko.observableArray([]);

            //Knockout JS - the back end of the databindings
            //The functions compute what is displayed
            self.sum_amo_exec = ko.computed(function () {
                return addcombine(self.amo_exec());
            });

            self.sum_amo_read = ko.computed(function () {
                return addcombine(self.amo_read());
            });

            self.sum_amo_write = ko.computed(function () {
                return addcombine(self.amo_write());
            });


            //To avoid repetition, this function is called by the above three functions
            function addcombine($innerarray){
                $innerarray = $innerarray.map(function(item){return parseInt(item)});
                var count = 0;
                for(var i = 0; i < $innerarray.length; i++)
                {
                    count = count + $innerarray[i];
                }
                return count;
            }
}

//A function that dynamically generates the table full of checkboxes
function makeTable(){

//Append headline to the table
jQuery('#permissions_table').append("<tr><td>&nbsp;</td><td>Owner</td><td>Group</td><td>Other</td></tr>");

//Specify the row names, the values for checkboxes, and the names which Knockout JS will use to bind
//the elements to data
$row_names=["r","w","x"];
$vals=[4,2,1];
$bind_names=["amo_exec","amo_read","amo_write"];

//Use the above parameters to dynamically generate the table full of checkboxes
//Dynamically generating a 3 row table? Is this not overkill? No! Because this dynamic system can be used
//the next time around for a plugin with more rows and options. This is the groundwork for more WordPress
//development to come!
for (i = 0; i < $row_names.length; i++) {
        jQuery('#permissions_table').append('<tr></tr>');
            jQuery("#permissions_table tr:last").append("<td>"+$row_names[i]+"</td>");
            for (j = 0; j < $bind_names.length; j++) {
                jQuery("#permissions_table tr:last").append("<td><input type='checkbox' value='"+$vals[i]+"' data-bind='checked: "+$bind_names[j]+"'/></td>");
            }
    }
jQuery('#permissions_table').append("<tr><td></td><td data-bind='text: sum_amo_exec'></td><td data-bind='text: sum_amo_read'></td><td data-bind='text: sum_amo_write'></td></tr>");
}

//Now, execute the function which we just created above
makeTable();

//Apply Knockout bindings
ko.applyBindings(new ViewModel());
}//]]>