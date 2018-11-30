<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="Container" id="content">
<div class="sub-page-top"><a href="javascript:history.back()"><img src="assets/images/back-arrow.png" class="back-arrow" alt="" role="presentation">Cancel</a></div>

<div class="refer-client-content">
	<img src="assets/images/refer-a-client.png" alt="" role="presentation" class="current-page-icon">
<div class="page-form-header-rc"><img class="fourSqBullet" src="assets/images/4square-bullet.png" alt="" role="presentation"><h1 class="Title">Refer a Client</h1></div>

<?php if (isset($message)) echo '<div class="error-message" role="alert">' . $message . '</div>'; ?>

<form method="post" action="index.php/doctor/refer" enctype="multipart/form-data">
<input type="hidden" name="<?php echo $csrf['name']; ?>" value="<?php echo $csrf['hash']; ?>" />
<div id="ClientForm"></div>
<script>

require([
	"dojo/dom-construct",
	"dijit/form/DateTextBox",
	"dojo/request",
	"dojo/on",
	"dojo/dom",
	"dijit/form/Select",
	"lw-widgets/DateField",
], function(domConstruct,DateTextBox, request,on,dom, Select, DateField){

	//Creating First dropdown menu for state
	let t=this;

	//Create div for First and Last name
	domConstruct.create("div",{id:"NameContainer", innerHTML:'<div class="formSection">Client Name:</div>'},"ClientForm");
	domConstruct.create("div", {
		innerHTML: '<div class="label">First</div><input type="text"  name="FirstName" id="First" aria-label="First" required>',
    	class : "DataDivFirstName"
	}, "NameContainer");
	domConstruct.create("div", {
		innerHTML: '<div class="label" >Last</div><input type="text"  name="LastName" id="Last" aria-label="Last" required>',
    	class:"DataDivLastName"
	}, "NameContainer");

	//Create div for Parent First and Last name
	domConstruct.create("div",{id:"ParentNameContainer", innerHTML:'<div class="formSection">Parent/Guardian: <div id="ConditionDiv">(if under 18)</div> </div>'},"ClientForm");

	domConstruct.create("div", {
		innerHTML: '<div class="label" >First</div><input type="text"  name="First_Parent" id="First_Parent" aria-label="First">',
    	class : "DataDivFirstName"
	}, "ParentNameContainer");
	domConstruct.create("div", {
		innerHTML: '<div class="label" >Last</div><input type="text"  name="Last_Parent" id="Last_Parent" aria-label="Last">',
    	class:"DataDivLastName"
	}, "ParentNameContainer");

	domConstruct.create("div",{id:"AddressContainer", innerHTML:'<div class="formSection">Address:</div>', class:"AddressContainer"},"ClientForm");
	//Address Line1 
	domConstruct.create("div", {
		innerHTML: '<div class="label" >Street Address</div><input type="text"  name="Address1" id="Address1" aria-label="Street Address" required>',
    	class:"DataDiv"
	}, "AddressContainer");
	
	//Address Line2
	domConstruct.create("div", {
		innerHTML: '<div class="label" >Street Address Line2</div><input type="text"  name="Address2" id="Address2" aria-label="Street Address Line2">',
    	class:"DataDiv"
	}, "AddressContainer");

    //Spacer to move cities and state left
	domConstruct.create("div",{innerHTML:'', class:"formSection"},"AddressContainer");
	
	//Creating second dropdown menu for state
	domConstruct.create("div", {
		innerHTML: '<div class="label" for="statesList1">State (must select first)</div><div id="states1"><select id="statesList1" name= "state" onChange="StateFunction1()" aria-label="State (must select first)" required><option value=""></option><option value="AL">Alabama</option><option value="AK">Alaska</option><option value="AZ">Arizona</option><option value="AR">Arkansas</option><option value="CA">California</option><option value="CO">Colorado</option><option value="CT">Connecticut</option><option value="DE">Delaware</option><option value="FL">Florida</option><option value="GA">Georgia</option><option value="HI">Hawaii</option><option value="ID">Idaho</option><option value="IL">Illinois</option><option value="IN">Indiana</option><option value="IA">Iowa</option><option value="KS">Kansas</option><option value="KY">Kentucky</option><option value="LA">Louisiana</option><option value="ME">Maine</option><option value="MD">Maryland</option><option value="MA">Massachusetts</option><option value="MI">Michigan</option><option value="MN">Minnesota</option><option value="MS">Mississippi</option><option value="MO">Missouri</option><option value="MT">Montana</option><option value="NE">Nebraska</option><option value="NV">Nevada</option><option value="NH">New Hampshire</option><option value="NJ">New Jersey</option><option value="NM">New Mexico</option><option value="NY">New York</option><option value="NC">North Carolina</option><option value="ND">North Dakota</option><option value="OH">Ohio</option><option value="OK">Oklahoma</option><option value="OR">Oregon</option><option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option><option value="SD">South Dakota</option><option value="TN">Tennessee</option><option value="TX">Texas</option><option value="UT">Utah</option><option value="VT">Vermont</option><option value="VA">Virginia</option><option value="WA">Washington</option><option value="WV">West Virginia</option><option value="WI">Wisconsin</option><option value="WY">Wyoming</option></select></div>',
    class:"DataDiv"
	}, "AddressContainer");

	//Creating the dropdown menu for cities
	domConstruct.create("div", {
		innerHTML: '<div class="label" >City</div><div id="cities"><select id="citiesList" name= "city" aria-label="city" style="background:#e8eaf3" required><option value=""></option></select></div>',
    	class:"DataDiv"
	}, "AddressContainer");

    //Spacer to move counties and zip left
	domConstruct.create("div",{innerHTML:'', class:"formSection"},"AddressContainer");

    //Creating the dropdown menu for counties
	domConstruct.create("div", {
		innerHTML: '<div class="label">County</div><div id="counties"><select id="countiesList" name="county" aria-label="county" style="background:#e8eaf3" required><option value=""></option></select></div>',
    	class:"DataDiv"
	}, "AddressContainer");

	//Creating div for ZipCode
	domConstruct.create("div", {
		innerHTML: '<div class="label" >Zip Code</div><input type="text"  name="ZipCode" id="zip" aria-label ="Zip Code"required>',
    	class:"DataDiv"
	}, "AddressContainer");

	//Creating div for Phone
	domConstruct.create("div", {
    	class:"PhoneData",
    	id:"phoneDiv"
	}, "ClientForm");
	
	domConstruct.create("label",{class:"label", for:"phone", innerHTML:"Phone Number:"},"phoneDiv");
	domConstruct.create("input",{type:"text", name:"Phone", id:"phone",onkeydown:"javascript:backspacerDOWN(this,event);", onkeyup:"javascript:backspacerUP(this,event);", required:true},"phoneDiv");
	
	//Creating div for Email
	domConstruct.create("div", {
		innerHTML: '<div class="label" for="email">Email:</div><input type="email"  name="Email" id="email" aria-label="Email" required>',
    	class:"EmailData"
	}, "ClientForm");

	// Create the widget for birth date
	// Creating a div where the date text box will go
	domConstruct.create("div", {
    	id:"DOBcontainer"
	}, "ClientForm");
	this.BirthDate = new DateField({label: "Date of Birth:"});
	this.BirthDate.set("required",true);
	this.BirthDate.placeAt("DOBcontainer");
	
	this.DateContainer = domConstruct.create("input", {
		type:"hidden", id:"DOB", name:"BirthDate", value:""
	}, "ClientForm");
	t.BirthDate.on("change", function()
    {
    		t.DateContainer.value = t.BirthDate.get("value");
    });
	
	//Creating the referred services list
	domConstruct.create("div",{id:"ReferredServicesContainer"},"ClientForm");
	domConstruct.create("div",{class:"servicesLabel", innerHTML:"Referred Services:"},"ReferredServicesContainer");
	domConstruct.create("div",{id:"ReferredServicesListContainer"},"ReferredServicesContainer");
	domConstruct.create("div", {
		innerHTML: "Children Services(birth to 21):", id:"Referred_Services_Child"}, "ReferredServicesListContainer");
	domConstruct.create("div", {id:"ServicesListDivChild", innerHTML:'<div class="listedService"><input type="checkbox" name="earlyIntervention" id="earlyIntervention" value="earlyIntervention">Early Intervention</div><div class="listedService"><input type="checkbox" name="schoolAge" id="schoolAge" value="schoolAge">School Age</div><div class="listedService"><input type="checkbox" name="parentSupport" id="parentSupport" value="parentSupport">Parent Support</div>'},"ReferredServicesListContainer");
	domConstruct.create("div", {
		innerHTML: "Adult Services(age 14 and up):", id:"Referred_Services_Adult"}, "ReferredServicesListContainer");
	domConstruct.create("div", {id:"ServicesListDivAdult", innerHTML:'<div class="listedService"><input type="checkbox" name="adjustmentToVisionLoss" id="adjustmentToVisionLoss" value="adjustmentToVisionLoss">Adjustment to Vision Loss</div><div class="listedService"><input type="checkbox" name="dailyLivingSkills" id="dailyLivingSkills" value="dailyLivingSkills">Functional Daily Living Skills</div><div class="listedService"><input type="checkbox" name="travelSkills" id="travelSkills" value="travelSkills">Travel Skills(white cane/guide dog)</div><div class="listedService"><input type="checkbox" name="assistiveTech" id="assistiveTech" value="assistiveTech">Assistive Technology</div><div class="listedService"><input type="checkbox" name="lowVisionEvaluation" id="lowVisionEvaluation" value="lowVisionEvaluation">Low Vision Evaluation/Examination</div><div class="listedService"><input type="checkbox" name="jobPlacement" id="jobPlacement" value="jobPlacement">Job Placement</div>'},"ReferredServicesListContainer");

	//Creating div for special considerations
	domConstruct.create("div", {
		innerHTML: '<div class="label" for="special">Special Considerations(i.e. - additional disabilities, language spoken, etc.):</div><textarea name="SpecialCon" id="special" aria-label = "Special Considerations">',
    	class:"scDataDiv"
	}, "ClientForm");

	//Creating div for special considerations
	domConstruct.create("div", {
		innerHTML: '<div class="label" for="special">Document Upload</div><input type="file" name="fileName" onChange="CheckSize()" id="myFile">',
    	class:"fileDataDiv"
	}, "ClientForm");

});

	function CheckSize(){
	var x = document.getElementById("myFile");
    var txt = "File uploaded successfully";
    if ('files' in x) {
        if (x.files.length == 0) {
            txt = "Please Select a file.";
        } else {
            for (var i = 0; i < x.files.length; i++) {
                var file = x.files[i];
                if ('size' in file) {
                    if(file.size > 5000000)
                    {
  	 					txt = "Please upload a file less than 5MB";
                		document.getElementById("myFile").value = "";
                    }
                }
            }
        }
    } 
    else {
        if (x.value == "") {
        	txt ="Please select a file.";
        } else {
            txt = "The files property is not supported by your browser!";
        }
    }
	messageBox("Alert",txt,"close","");		
    
}


	
	//onChange function for state dropdown menu
	function StateFunction1(){
    var city = document.getElementById("citiesList");
	var county = document.getElementById("countiesList");
	var state1 = document.getElementById("statesList1").value;

    //setting value of first state dropdown with same value as second state dropdown

		require([
		"dojo/dom-construct",
		"dojo/request",
		"dojo/on",
		"dojo/dom",
		], function(domConstruct,request,on,dom){
        		if(state1 == "")
    			{
    				city.style = "background:#e8eaf3";
    				county.style = "background:#e8eaf3";
      				city.innerHTML = "";
                	county.innerHTML = "";
    			}
        		else
                {
    			request("index.php/doctor/refer/" + state1).then(function(data){
       			let txt = JSON.parse(data);
                //append data to city dropdwon
                city.innerHTML = "";
                domConstruct.create("option", {value: "", innerHTML: "Please Select"}, city);
        		for (i=0; i<txt.cities.length; i++)
        		{
                	domConstruct.create("option", {innerHTML: txt.cities[i]}, city);
                	city.style = "background:white";
                
        		}
                
                //append data to county dropdown
                county.innerHTML = "";
                domConstruct.create("option", {value: "", innerHTML: "Please Select"}, county);
        		for (i=0; i<txt.counties.length; i++)
        		{
                	domConstruct.create("option", {innerHTML: txt.counties[i]}, county);
                	county.style = "background:white";
        		}
    		})
        }
        	
		});
   }

</script>
 <button type="submit" id="SubmitReferral">Submit</button>
</form>

<!-- 
And here we'll probably want to set the form fields to whatever they were before
(since it's still reloading the page). Because they were created by JavaScript,
we'll need to set the values using JS too (and you can probably come up with a
better way than my setTimeout below, lol). The PHP variable names are the same as
the "name" attribute for each form element.
-->
<?php if (isset($message)) : ?>
<script>

var wait4dojoStuff = setInterval(function(){
	if (document.getElementById('First'))
    {
		document.getElementById('First').value = "<?php echo $FirstName; ?>";
		document.getElementById('Last').value = "<?php echo $LastName; ?>";
		document.getElementById('First_Parent').value = "<?php echo $Last_Parent; ?>";
    	document.getElementById('Last_Parent').value = "<?php echo $Last_Parent; ?>";
    	document.getElementById('Address1').value = "<?php echo $Address1; ?>";
    	document.getElementById('Address2').value = "<?php echo $Address2; ?>";
    	document.getElementById('statesList1').value = "<?php echo $state; ?>";
    	var cityval = "<?php echo $city; ?>";;
    	var countyval = "<?php echo $county; ?>";
    	if((cityval != null) || (countyval!= null))
        {
    		StateFunction1();
    		document.getElementById('citiesList').value = "<?php echo $city; ?>";
    		document.getElementById('countiesList').value = "<?php echo $county; ?>";
        }
        		
    	document.getElementById('zip').value = "<?php echo $ZipCode; ?>";
    	document.getElementById('phone').value = "<?php echo $Phone; ?>";
    	document.getElementById('email').value = "<?php echo $Email; ?>";
    	<?php if (isset($earlyIntervention)) : ?>
    	document.getElementById('earlyIntervention').checked = true;
    	<?php endif; ?>
    	<?php if (isset($schoolAge)) : ?>
    	document.getElementById('schoolAge').checked = true;
    	<?php endif; ?>
    	<?php if (isset($parentSupport)) : ?>
    	document.getElementById('parentSupport').checked = true;
    	<?php endif; ?>
    	<?php if (isset($adjustmentToVisionLoss)) : ?>
    	document.getElementById('adjustmentToVisionLoss').checked = true;
    	<?php endif; ?>
    	<?php if (isset($dailyLivingSkills)) : ?>
    	document.getElementById('dailyLivingSkills').checked = true;
    	<?php endif; ?>
    	<?php if (isset($travelSkills)) : ?>
    	document.getElementById('travelSkills').checked = true;
    	<?php endif; ?>
    	<?php if (isset($assistiveTech)) : ?>
    	document.getElementById('assistiveTech').checked = true;
    	<?php endif; ?>
    	<?php if (isset($lowVisionEvaluation)) : ?>
    	document.getElementById('lowVisionEvaluation').checked = true;
    	<?php endif; ?>
    	<?php if (isset($jobPlacement)) : ?>
    	document.getElementById('jobPlacement').checked = true;
		<?php endif; ?>
    	
    	document.getElementById('special').value = "<?php echo $SpecialCon; ?>";
    	// etc.
    	clearInterval(wait4dojoStuff);
    }
}, 100);
</script>
<?php endif; ?>

</div>
</div>