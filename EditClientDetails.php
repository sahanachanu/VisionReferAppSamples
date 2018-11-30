<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="Container" id="content">
<div class="sub-page-top"><a href="index.php/agency/dashboard"><img src="assets/images/back-arrow.png" class="back-arrow" alt="" role="presentation" >Back</a></div>

<div class="refer-client-content">
	<img src="assets/images/client-details.png" alt="" role="presentation" class="current-page-icon">
<!--Create Page title-->
<div class="page-form-header-rc"><img class="fourSqBullet" src="assets/images/4square-bullet.png" alt="" role="presentation"><h1 class="Title">Client Details</h1></div>

<!--Dropdown menu to update the status-->
<div class="StatusConatiner">
<!--The current status of the client is shown -->
<div class="DisplayStatus"><h2 class="status-label">Current Status</h2>
<?php if ($status == "Received") echo ('<svg class="svg-circle">
<circle class="status-circle" id="circle1" r="18" cx="20" cy="20" style="fill:#7b589c" ></circle> 
</svg>');?>
<?php if ($status == "Providing Services") echo ('<svg class="svg-circle">
<circle class="status-circle" id="circle1" r="18" cx="20" cy="20" style="fill:#0fc431" ></circle> 
</svg>');?>
<?php if ($status == "Completed Services") echo ('<svg class="svg-circle">
<circle class="status-circle" id="circle1" r="18" cx="20" cy="20" style="fill:#007cb1" ></circle> 
</svg>');?>

<?php if ($status == "Received") echo ("Received") ?>
<?php if ($status == "Providing Services") echo ("Providing Services") ?>
<?php if ($status == "Completed Services") echo ("Completed Services") ?>
</div>

<!--Dropdown for status update-->
<form method = "post" action="index.php/agency/set_status">
<div class="change-status-label">Update Status:</div><div id="status"><select id="statusList" aria-label="Status" name="status">
<option  value=""></option>
<option <?php if ($status == "Received") echo "selected" ?> value="received">Received</option>
<option <?php if ($status == "Providing Services") echo " selected" ?> value="providing services">Providing Services</option>
<option <?php if ($status == "Completed Services") echo "selected" ?> value="completed services">Completed Services</option></select></div>
<input type="hidden" name="<?php echo $csrf['name']; ?>" value="<?php echo $csrf['hash']; ?>" />
<input type="hidden" name="id" value="<?php show($id); ?>">
<input type="submit" value="Update" class="UpdateStatus"/>
</form>
</div>

<!--Container that allows only viewing of data -->
<div id="ClientDetailsContainer">

<h2 class="client-info-label">Client Information</h2>

<!--Edit button created to enable the form-edit-->
<button id="EditButton" onClick="EditFunction()">Edit</button>

<!-- Divs created for view only data container -->
<div class="detailsNameContainer">
<div class="formSection">Client Name:</div>
<div class ="ReadDataDiv">
<div class="label" for="details-First">First</div>
<div id="details-First"><?php show($first_name); ?></div>
</div>

<div class="ReadDataDiv">
<div class="label" for="details-Last">Last</div>
<div id="details-Last" ><?php show($last_name); ?></div>
</div>
</div>

<div class="ParentNameDetailsContainer">
<div class="formSection">Parent/Guardian
<div id="ConditionDiv">(if under 18)</div>
</div>

<div class ="DataDivParentFirst">
<div class="label" for="details-Parent-First">First</div>
<div id="details-Parent-First"><?php show($Parent_First_Name); ?></div>
</div>

<div class="DataDivParentLast">
<div class="label" for="details-Parent-Last">Last</div>
<div id="details-Parent-Last" ><?php show($Parent_Last_Name); ?></div>
</div>
</div>



<div class="details-DateOfBirth" >Date of Birth:</div>
<div class="data"><?php show($dob); ?></div>


<div class="AddressContainer2">
<div class="formSection">Address:</div>
<div class ="ReadDataDiv">
<div class="label" for="details-Address1">Street Address</div>
<div id="details-Address1"><?php show($address1); ?></div>
</div>
<div class ="ReadDataDiv">
<div class="label" for="details-Address2">Street Address Line 2</div>
<div id="details-Address2" ><?php show($address2); ?></div>
</div>

<div class="formSection"></div>
<div class ="ReadDataDiv">
<div class="label" for="details-citiesList">City</div>
<div id="details-citiesList"><?php show($city); ?></div>
</div>
<div class ="ReadDataDiv">
<div class="label" for="details-statesList1">State</div>
<div id="details-statesList1"><?php show($state); ?></div>
</div>

<div class="formSection"></div>
<div class ="ReadDataDiv">
<div class="label" for="details-zip">Zip</div>
<div id="details-zip"><?php show($zip); ?></div>
</div>
<div class ="ReadDataDiv">
<div class="label" for="details-countiesList">County</div>
<div id="details-countiesList"><?php show($county); ?></div>
</div>

</div>



<div class ="PhoneData">
<div class="label" for="details-phone">Phone Number:</div>
<div id="details-phone"><?php show($phone); ?></div>
</div>
<div class ="EmailData">
<div class="label" for="details-email">Email:</div>
<div id="details-email"><?php show($email); ?></div>
</div>
<div class="ServicesContainer">
<div class="formSection">Services:</div>
<div id="ReferredServicesListContainer">
<div id="ServicesListChildTitle"> Children Services(birth to 21):</div>
<div class="ChildServicesDiv">
<ul id="ServicesListChild"></ul>
</div>
<div id="ServicesListAdultTitle">Adult Services(age 14 and up):</div>
<div class="AdultServicesDiv">
<ul id="ServicesListAdult"></ul>
</div>
</div>
</div>
<div class ="SpecialDataDiv">
<div class="label" for="special">Special Considerations:</div>
<div class="special-data"><?php show($considerations); ?></div>
</div>
<div class ="ViewDataDiv">
<div class="details-label">Referred By:</div>
<div class="data" ><?php show($referred_by); ?></div>
</div>
<div class ="ViewDataDiv">
<div class="details-label">Assigned Agency:</div>
<div class="data"><?php show($referred_to); ?></div>
</div>
<div class ="ViewDataDiv">
<div class="details-label">Referred Date:</div>
<div class="data"><?php show($referral_date); ?></div>
</div>
</div>

<!--Container that allows form edit -->
<div id="EditContainer" style="display:none">
<h2 class="client-info-label">Client Information</h2>

<form method="post" action="index.php/agency/edit_client_details">
<input type="hidden" name="<?php echo $csrf['name']; ?>" value="<?php echo $csrf['hash']; ?>" />

<div class="detailsNameContainer">
<div class="formSection">Client Name:</div>
<div class = "EditDataDiv">
<div class="label" for="FirstName">First</div><div class="DataBox"><input type="text"  name="FirstName" id="FirstName" class="dataEdit" value="<?php show($first_name); ?>" aria-label="First Name" readonly></div>
</div>

<div class = "EditDataDiv">
<div class="label" for="LastName">Last</div><div class="DataBox"><input type="text"  name="LastName" id="LastName" class="dataEdit" value="<?php show($last_name);?>" aria-label="Last Name" readonly></div>
</div>
</div>

<div class="ParentNameDetailsContainer">
<div class="formSection">Parent/Guardian
<div id="ConditionDiv">(if under 18)</div>
</div>

<div class = "EditDataDiv">
<div class="label" for="details-Parent-First-Edit">First</div>
<input type="text" name="Parent_First_Name" id="details-Parent-First-Edit"  value="<?php show($Parent_First_Name);?>">
</div>

<div class = "EditDataDiv">
<div class="label" for="details-Parent-Last-Edit">Last</div>
<input type="text" id="details-Parent-Last-Edit" name="Parent_Last_Name"  value="<?php show($Parent_Last_Name);?>">
</div>
</div>

<!-- Creating a div where the date text box will go-->
<div class="BirthDateData">
<div class="label" for="BirthDate">Date of Birth:</div><div class="DataBox"><input type="text" class="dataEdit" name="BirthDate" id="BirthDate" value="<?php show($dob);?>"  aria-label="Date of Birth" readonly/></div>
</div>
<!--Creating div for Address Line 1 & 2 -->
<div class="AddressContainer">
<div class="formSection">Address:</div>
<div class = "EditDataDiv">
<div class="label" for="editAddress1">Street Address</div><div class="DataBox"><input type="text"  name="Address1" id="editAddress1" class="dataEdit" value="<?php show($address1);?>"  aria-label="Address Line1" required></div>
</div>


<div class = "EditDataDiv">
<div class="label" for="editAddress2">Street Address Line 2</div><div class="DataBox"><input type="text"  name="Address2" id="editAddress2" class="dataEdit" value="<?php show($address2);?>" aria-label="Address Line2"></div>
</div>
<!--Creating the dropdown menu for cities-->
<div class="formSection"></div>
<div class = "EditDataDiv">
<label class="label" for="cities_dropdown">City</label><div id="cities_dropdown"><select id="citiesList_1" name="city" aria-label="City" required><option value="<?php show($city);?>"><?php show($city);?></option><?php show($cities);?></select></div>
</div>

<!--Creating dropdown menu for state-->
<div class = "EditDataDiv">
<label class="label" for="states_dropdown">State</label><div id="states_dropdown"><select id="statesList_1" name="state" onChange="StateFunction()" aria-label="State" required><option <?php if ($state == "AL") echo "selected" ?> value="AL">Alabama</option><option <?php if ($state == "AK") echo "selected" ?> value="AK">Alaska</option><option <?php if ($state == "AZ") echo "selected" ?> value="AZ">Arizona</option><option <?php if ($state == "AR") echo "selected" ?> value="AR">Arkansas</option><option <?php if ($state == "CA") echo "selected" ?> value="CA">California</option><option <?php if ($state == "CO") echo "selected" ?> value="CO">Colorado</option><option <?php if ($state == "CT") echo "selected" ?> value="CT">Connecticut</option><option <?php if ($state == "DE") echo "selected" ?> value="DE">Delaware</option><option <?php if ($state == "FL") echo "selected" ?> value="FL">Florida</option><option <?php if ($state == "GA") echo "selected" ?> value="GA">Georgia</option><option <?php if ($state == "HI") echo "selected" ?> value="HI">Hawaii</option><option <?php if ($state == "ID") echo "selected" ?> value="ID">Idaho</option><option <?php if ($state == "IL") echo "selected" ?> value="IL">Illinois</option><option <?php if ($state == "IN") echo "selected" ?> value="IN">Indiana</option><option <?php if ($state == "IA") echo "selected" ?> value="IA">Iowa</option><option <?php if ($state == "KS") echo "selected" ?> value="KS">Kansas</option><option <?php if ($state == "KY") echo "selected" ?> value="KY">Kentucky</option><option <?php if ($state == "LA") echo "selected" ?> value="LA">Louisiana</option><option <?php if ($state == "ME") echo "selected" ?> value="ME">Maine</option><option <?php if ($state == "MD") echo "selected" ?> value="MD">Maryland</option><option <?php if ($state == "MA") echo "selected" ?> value="MA">Massachusetts</option><option <?php if ($state == "MI") echo "selected" ?> value="MI">Michigan</option><option <?php if ($state == "MN") echo "selected" ?> value="MN">Minnesota</option><option <?php if ($state == "MS") echo "selected" ?> value="MS">Mississippi</option><option <?php if ($state == "MO") echo "selected" ?> value="MO">Missouri</option><option <?php if ($state == "MT") echo "selected" ?> value="MT">Montana</option><option <?php if ($state == "NE") echo "selected" ?> value="NE">Nebraska</option><option <?php if ($state == "NV") echo "selected" ?> value="NV">Nevada</option><option <?php if ($state == "NH") echo "selected" ?> value="NH">New Hampshire</option><option <?php if ($state == "NJ") echo "selected" ?> value="NJ">New Jersey</option><option value="NM">New Mexico</option><option <?php if ($state == "NY") echo "selected" ?>  value="NY">New York</option><option <?php if ($state == "NC") echo "selected" ?>  value="NC">North Carolina</option><option <?php if ($state == "ND") echo "selected" ?>  value="ND">North Dakota</option><option <?php if ($state == "OH") echo "selected" ?>  value="OH">Ohio</option><option <?php if ($state == "OK") echo "selected" ?>  value="OK">Oklahoma</option><option <?php if ($state == "OR") echo "selected" ?> value="OR">Oregon</option><option <?php if ($state == "PA") echo "selected" ?> value="PA">Pennsylvania</option><option <?php if ($state == "RI") echo "selected" ?> value="RI">Rhode Island</option><option <?php if ($state == "SC") echo "selected" ?> value="SC">South Carolina</option><option <?php if ($state == "SD") echo "selected" ?> value="SD">South Dakota</option><option <?php if ($state == "TN") echo "selected" ?> value="TN">Tennessee</option><option <?php if ($state == "TX") echo "selected" ?> value="TX">Texas</option><option <?php if ($state == "UT") echo "selected" ?> value="UT">Utah</option><option <?php if ($state == "VT") echo "selected" ?> value="VT">Vermont</option><option <?php if ($state == "VA") echo "selected" ?> value="VA">Virginia</option><option <?php if ($state == "WA") echo "selected" ?> value="WA">Washington</option><option <?php if ($state == "WV") echo "selected" ?> value="WV">West Virginia</option><option <?php if ($state == "WI") echo "selected" ?> value="WI">Wisconsin</option><option <?php if ($state == "WY") echo "selected" ?> value="WY">Wyoming</option></select></div>
</div>

<!--Creating div for ZipCode-->
<div class="formSection"></div>
<div class = "EditDataDiv">
<div class="label" for="ZipCode">Zip</div><div class="DataBox"><input type="text"  name="ZipCode" id="ZipCode" class="dataEdit" value="<?php show($zip);?>"  aria-label="Zip" required></div>
</div>
<!--Creating the dropdown menu for counties-->
<div class = "EditDataDiv">
<label class="label" for="counties_dropdown">County</label><div id="counties_dropdown"><select id="countiesList_1" name="county" aria-label="County" required><option value="<?php show($county); ?>"><?php show($county); ?></option><?php show($counties);?></select></div>
</div>
</div>
<!--Creating div for Phone-->
<div class = "PhoneData">
<div class="label" for="editPhone">Phone Number:</div><div class="DataBox"><input type="text"  name="Phone" id="editPhone" class="dataEdit" value="<?php show($phone);?>" aria-label="Phone" onkeydown="javascript:backspacerDOWN(this,event);", onkeyup="javascript:backspacerUP(this,event);" required></div>
</div>
<!--Creating div for Email-->
<div class = "EmailData">
<div class="label" for="Email">Email:</div><div class="DataBox"><input id="emailEdit" type="email"  name="Email" class="dataEdit" value="<?php show($email);?>"  aria-label="Email" required></div>
</div>

<div class="ServicesContainerEdit">
<div class="servicesLabel" aria-label="Services">Services:</div>
<div id="ReferredServicesListContainer">
<div class="ServicesListChildTitle">Children Services(birth to 21):</div>
<div class="ServicesListChildEdit" id="ServicesListChildEdit">
<div class="listedService"><input type="checkbox" name="earlyIntervention" id="earlyIntervention">Early Intervention</div><div class="listedService"><input type="checkbox" name="schoolAge" id="schoolAge" >School Age</div><div class="listedService"><input type="checkbox" id="parentSupport" name="parentSupport">Parent Support</div></div>
<div class="ServicesListAdultTitle">Adult Services(age 14 and up):</div>
<div class="ServicesListAdultEdit" id="ServicesListAdultEdit"><div class="listedService"><input type="checkbox" name="adjustmentToVisionLoss" id="adjustmentToVisionLoss"" >Adjustment to Vision Loss</div><div class="listedService"><input type="checkbox" name="dailyLivingSkills" id="dailyLivingSkills" ">Functional Daily Living Skills</div><div class="listedService"><input type="checkbox" name="travelSkills" id="travelSkills" >Travel Skills(white cane/guide dog)</div><div class="listedService"><input type="checkbox" name="assistiveTech" id="assistiveTech"  >Assistive Technology</div><div class="listedService"><input type="checkbox" name="lowVisionEvaluation" id="lowVisionEvaluation" >Low Vision Evaluation/Examination</div><div class="listedService"><input type="checkbox" name="jobPlacement" id="jobPlacement">Job Placement</div></div>
</div>
</div>

<!--Creating div for Special Considerations-->
<div class = "specialCons">
<div class="label" for="special">Special Considerations:</div><div class="DataBox"><textarea  name="SpecialCon" id="special" class="dataEdit" aria-label="Special Considerations" ><?php show($considerations);?></textarea></div>
</div>
<!--Referred by and referred to-->
<div class = "ViewDataDiv">
<div class="details-label">Referred By:</div><div class="DataBox"><input type="text"  name="ReferredBy" class="data" value="<?php show($referred_by);?>" aria-label="Referred By" readonly></div>
</div>
<input type="hidden" name="id" value="<?php show($id); ?>">
<div class = "ViewDataDiv">
<div class="details-label">Assigned Agency:</div><div class="DataBox">
<select name="ReferredTo" class="data assignAgency" aria-label="Assigned Agency" id="AssignAgency" onChange="ConfirmChange();">
<?php
	for ($i=0; $i<count($agencies); $i++)
    {
    	$a = $agencies[$i];
    	if ($a['label'] == $referred_to)
        	echo '<option selected value="' . $a['value'] . '">' . $a['label'] . '</option>';
    	else
        	echo '<option value="' . $a['value'] . '">' . $a['label'] . '</option>';
    }
?>
</select>
</div>
</div>
<div class = "ViewDataDiv">
<div class="details-label">Referred Date:</div><div class="DataBox"><input type="text"  name="ReferredDate" class="data" value="<?php show($referral_date);?>"  aria-label="Referred Date" readonly></div>
</div>
<script>

//This function is used to verify if the assigned agency need to be changed
function ConfirmChange(){
	messageBox("Alert", "Are you sure you want to change the Assigned Agency?", ["Yes", "No"], false, function(answer){
    		if (answer == "No") 
            {
            	//If No then revert back the original form value
            	var agency_assigned = "<?php show($referred_to);?>";
           		document.getElementById("AssignAgency").selectedIndex = agency_assigned ;
            }
    		//if Yes return to the form 
        	return;
	});
}
               
//This is to call the function on page load
AssignServices();

//This function is created so it can be called again in edit mode i.e when edit container is displayed
function AssignServices(){
var services = <?php echo json_encode($services); ?>;
console.log(services);
if(services.adjustmentToVisionLoss)
{
	document.getElementById("ServicesListAdult").innerHTML = "";
	document.getElementById("ServicesListChild").innerHTML = "";
	if(document.getElementById("ServicesListAdult"))
		document.getElementById("ServicesListAdult").innerHTML += "<li>Adjustment to Vision Loss</li>";
	if(document.getElementById("adjustmentToVisionLoss"))
    	document.getElementById("adjustmentToVisionLoss").checked = true;
}
if(services.assistiveTech)
{
	if(document.getElementById("ServicesListAdult"))
		document.getElementById("ServicesListAdult").innerHTML += "<li>Assistive Technology</li>";
	if(document.getElementById("ServicesListAdultEdit"))
    	document.getElementById("assistiveTech").checked = true;
}

if(services.dailyLivingSkills)
{
	if(document.getElementById("ServicesListAdult"))
		document.getElementById("ServicesListAdult").innerHTML += "<li>Function daily Living Skills</li>";
	if(document.getElementById("ServicesListAdultEdit"))
    	document.getElementById("dailyLivingSkills").checked = true;
}

if(services.earlyIntervention)
{
	if(document.getElementById("ServicesListChild"))
		document.getElementById("ServicesListChild").innerHTML += "<li>Early Intervention</li>";
	if(document.getElementById("ServicesListChildEdit"))
    	document.getElementById("earlyIntervention").checked = true;
}

if(services.jobPlacement)
{
	if(document.getElementById("ServicesListAdult"))
		document.getElementById("ServicesListAdult").innerHTML += "<li>Job Placement</li>";
	if(document.getElementById("ServicesListAdultEdit"))
    	document.getElementById("jobPlacement").checked = true;
}

if(services.lowVisionEvaluation)
{
	if(document.getElementById("ServicesListAdult"))
		document.getElementById("ServicesListAdult").innerHTML += "<li>Low Vision Evaluation/Examination</li>";
	if(document.getElementById("ServicesListAdultEdit"))
    	document.getElementById("lowVisionEvaluation").checked = true;
}


if(services.parentSupport)
{
	if(document.getElementById("ServicesListChild"))
		document.getElementById("ServicesListChild").innerHTML += "<li>Parent Support</li>";
	if(document.getElementById("ServicesListChildEdit"))
    	document.getElementById("parentSupport").checked = true;
}

if(services.schoolAge)
{
	console.log("I am here");
	if(document.getElementById("ServicesListChild"))
		document.getElementById("ServicesListChild").innerHTML="<li>School Age</li>";
	if(document.getElementById("ServicesListChildEdit"))
    	document.getElementById("schoolAge").checked = true;
}


if(services.travelSkills)
{
	if(document.getElementById("ServicesListAdult"))
		document.getElementById("ServicesListAdult").innerHTML += "<li>Travel Skills</li>"
	if(document.getElementById("ServicesListAdultEdit"))
    	document.getElementById("travelSkills").checked = true;
}
}
</script>

<script>
//onChange function for first state dropdown menu
	function StateFunction(){
	var state = document.getElementById("statesList_1").value;
	var city = document.getElementById("citiesList_1");
	var county = document.getElementById("countiesList_1");
    
	require([
	"dojo/dom-construct",
	"dojo/request",
	"dojo/on",
	"dojo/dom",
	], function(domConstruct,request,on,dom){
    			request("index.php/doctor/refer/" + state).then(function(data){
       			let txt = JSON.parse(data);
                //append data to city dropdown
                city.innerHTML = "";
                domConstruct.create("option", {value: "", innerHTML: "Please Select"}, city);
        		for (i=0; i<txt.cities.length; i++)
        		{
                	domConstruct.create("option", {innerHTML: txt.cities[i]}, city);
        		}
                
                //append data to county dropdown
                county.innerHTML = "";
                domConstruct.create("option", {value: "", innerHTML: "Please Select"}, county);
        		for (i=0; i<txt.counties.length; i++)
        		{
                	domConstruct.create("option", {innerHTML: txt.counties[i]}, county);
        		}
    		})
		});
	}
function CancelEditWindow()
{
	window.location.reload();
}
function EditFunction()
{
	document.getElementById("ClientDetailsContainer").style.display = "none";
	document.getElementById("EditButton").style.display = "none";
	document.getElementById("EditContainer").style.display = "";
	AssignServices();
}
<?php if (isset($message)) : ?>
var status = "<?php echo $message['status']; ?>";
var message = "<?php echo $message['message']; ?>";

if(status == "done")
{
	var alert = document.createElement("div");
	alert.innerHTML = message;
	alert.id="clientsDetails-confirm-message";
	alert.className = "confirm-message";
	alert.setAttribute("role","alert");
	document.body.appendChild(alert);
	
}
else
{
	var alert = document.createElement("div");
	alert.innerHTML = message;
	alert.id="clientsDetails-error-message";
	alert.className = "error-message";
	alert.setAttribute("role","alert");
	document.body.appendChild(alert);
}
<?php endif; ?>
</script>


<button type="submit" class="SaveChanges1">Save</button>
</form>

<button  class="CancelEdit" onClick="CancelEditWindow()">Cancel</button>

</div>
<input type="hidden" id="clientId" value="<?php show($id); ?>">
<!-- Comments section in the page -->
<div id="CommentsContainer"  class="CommentsContainer">
<h2 class="CommentsTitle">Comments</h2>

<div class="PostCommentContainer">
<div class="NewCommentTitle">Add New Comment:</div>

<div><textarea id="commentsBox" class="CommentsBox" name="comment" aria-label="Add New Comment"></textarea></div>
<div id="blankCommentalert"></div>
<button id="postButton" onClick="RequestPostComments();">Post</button>

</div>
<div class="commentList" id="comment-list">
<?php
if (isset($comments))
{
	
	// I went with a table here, but you guys can do whatever you like - this is just an example of how to do it in PHP.
	echo '<table class="commentsTable">';
	echo '<thead><tr><th>User</th><th>Organization</th><th>Date/Time</th><th>Comment</th></tr></thead>';
	if (count($comments) == 0)
    {
    	echo '<tr>';
		echo '<td colspan="5">No records found</td>';
		echo '</tr>';
		echo '</table>';
    }
	else foreach($comments as $comment)
    {
    	echo '<tr>';
    	echo '<td>' . $comment["user"] . '</td>';
    	echo '<td>' . $comment["organization"] . '</td>';
    	echo '<td>' . $comment["timestamp"] . '</td>';
    	echo '<td>' . $comment["text"] . '</td>';
    	echo '</tr>';
    }
	echo '</table>';
}
?>

</div>

</div>

<!--Create file uploader -->
<div class="filesContainer" id="filesContainer">
<h2 class="FilesTitle">Files</h2>
<div id="fileUploader"></div>
<script>


function RequestPostComments(){
  require([
	"dojo/dom-construct",
	"dojo/request",
	"dojo/on",
	"dojo/dom",
	], function(domConstruct,request,on,dom){
  									if(dom.byId("commentsBox").value == "")
                                       {
                                       		if(dom.byId("alert-message"))
                                            {
                                            	dom.byId("alert-message").remove();
                                            }
                                       		domConstruct.create("div",{id:"alert-message", role:"alert", innerHTML:"Please enter a comment", style:"color:red"},"blankCommentalert");
                                       }
  									else
                                    {
    									var id = <?php echo ($id); ?>;
										var comment = dom.byId("commentsBox").value;
    									//dom.byId("CommentText").value = "";
    									request.post("index.php/agency/comment", {
            							data: {
                						id: id,
                						message: comment,
                						<?php echo $csrf['name']; ?>: "<?php echo $csrf['hash']; ?>"
                						}
            							}).then(function(txt){
          								var comments = JSON.parse(txt);
                                        console.log(comments);
                                        document.getElementById("commentsBox").value="";
               	 						CreateTable(comments.data);
                                        if(comments.status=="done")
                                        {
                                        		if(document.getElementById("onload-confirm-message"))
                    								document.getElementById("onload-confirm-message").remove();
                    							if(document.getElementById("onload-error-message"))
                    								document.getElementById("onload-error-message").remove();
                    							if(document.getElementById("upload-confirm-message"))
                    								document.getElementById("upload-confirm-message").remove();
                    							if(document.getElementById("delete-confirm-message"))
                        							document.getElementById("delete-confirm-message").remove();
                                        		if(document.getElementById("clientsDetails-confirm-message"))
                                               	 document.getElementById("clientsDetails-confirm-message").remove();
                                        		if(document.getElementById("clientsDetails-error-message"))
                                               	 document.getElementById("clientsDetails-error-message").remove();
                                        		if(document.getElementById("clientsComments-confirm-message"))
                                               	 document.getElementById("clientsComments-confirm-message").remove();
                                        		if(document.getElementById("clientsComments-error-message"))
                                               	 document.getElementById("clientsComments-error-message").remove();
                                        
                                        	var alert = document.createElement("div");
											alert.innerHTML = comments.message;
                                        	alert.id = "clientsComments-confirm-message";
											alert.className = "confirm-message";
											alert.setAttribute("role","alert");
											document.body.appendChild(alert);
                                        }
                                        else
                                        {
                                    
                    							if(document.getElementById("upload-confirm-message"))
                    								document.getElementById("upload-confirm-message").remove();
                    							if(document.getElementById("delete-confirm-message"))
                        							document.getElementById("delete-confirm-message").remove();
                                        		if(document.getElementById("clientsDetails-confirm-message"))
                                               	 document.getElementById("clientsDetails-confirm-message").remove();
                                        		if(document.getElementById("clientsDetails-error-message"))
                                               	 document.getElementById("clientsDetails-error-message").remove();
                                        		if(document.getElementById("clientsComments-confirm-message"))
                                               	 document.getElementById("clientsComments-confirm-message").remove();
                                        		if(document.getElementById("clientsComments-error-message"))
                                               	 document.getElementById("clientsComments-error-message").remove();
                                        
                                        	var alert = document.createElement("div");
											alert.innerHTML = comments.message;
                                        	alert.id = "clientsComments-error-message";
											alert.className = "error-message";
											alert.setAttribute("role","alert");
											document.body.appendChild(alert);
                                        }
            							}) 
   }
  });
}

function CreateTable(DisplayData){
 require([
	"dojo/dom-construct",
	"dojo/request",
	"dojo/on",
	"dojo/dom",
	], function(domConstruct,request,on,dom){
 										if(dom.byId("comment-list"))
                                        {
 											dom.byId("comment-list").remove();
                                        }
										if(dom.byId("newCommentTable"))
                                        {
                                        	dom.byId("newCommentTable").remove();
                                        }
 											//Comments Table
 										domConstruct.create("div",{class:"commentList", id:"newCommentTable"},"CommentsContainer");
                            			var table = domConstruct.create("table",{id:"comments-Table", class:"commentsTable"},"newCommentTable");
                            			var tr1 = domConstruct.create("thead",{id:"Row", },"comments-Table");
                            			var th1 = domConstruct.create("th",{},"Row");
                                    	var th2 = domConstruct.create("th",{},"Row");
                                    	var th3 = domConstruct.create("th",{},"Row");
 										var th4 = domConstruct.create("th",{},"Row");
                                    	th1.innerHTML = "User";
                                    	th2.innerHTML = "Organization";
                                    	th3.innerHTML = "Date/TimeTime";
 										th4.innerHTML = "Comment";
										for(j=0; j<DisplayData.length; j++)
                                    	{
                                    		var tr2 = domConstruct.create("tr",{id:"Row" + j, },"comments-Table");
                                    		var td1 = domConstruct.create("td",{},"Row" + j);
                                    		var td2 = domConstruct.create("td",{},"Row" + j);
                                    		var td3 = domConstruct.create("td",{},"Row" + j);
                                        	var td4 = domConstruct.create("td",{},"Row" + j);
                                    		td1.innerHTML = DisplayData[j].user;
                                    		td2.innerHTML = DisplayData[j].organization;
                                    		td3.innerHTML = DisplayData[j].timestamp;
                                        	td4.innerHTML = DisplayData[j].text;
                                    	}
 
 });
}


require([
	"dojo/dom-construct",
	"dojo/request",
	"dojo/on",
	"dojo/dom",
	"dojox/form/Uploader"
], function(domConstruct,request,on,dom, Uploader){
			domConstruct.create("div",{class:"uploadTitle", innerHTML:"Upload File"},"fileUploader");
let t = this, html = '<form method="post" action="index.php/file/upload" id="uploadForm" enctype="multipart/form-data" >'+'<input type="hidden" name="<?php echo $csrf['name']; ?>" value="<?php echo $csrf['hash']; ?>" />'
                + '<input type="hidden" id="client_id" name="id" value="<?php show($id); ?>" />'
				+ '</form>';
            domConstruct.create("div", {innerHTML: html, id:"formContainer"}, "fileUploader");
            this.uploader = new Uploader({
               	uploadOnSelect: false,
				name: "file2upload",
               	id: "file2upload",
               	multiple: false,
               	label: "Select File"
            }).placeAt("uploadForm");
            this.uploader.on("change", function(){
                t.uploader.submit();
			});
			this.uploader.on("complete", function(txt){
                try
                {
                    if (txt.status == "done")
                    {
                    							if(document.getElementById("upload-confirm-message"))
                    								document.getElementById("upload-confirm-message").remove();
                    							if(document.getElementById("delete-confirm-message"))
                        							document.getElementById("delete-confirm-message").remove();
                                        		if(document.getElementById("clientsDetails-confirm-message"))
                                               	 document.getElementById("clientsDetails-confirm-message").remove();
                                        		if(document.getElementById("clientsDetails-error-message"))
                                               	 document.getElementById("clientsDetails-error-message").remove();
                                        		if(document.getElementById("clientsComments-confirm-message"))
                                               	 document.getElementById("clientsComments-confirm-message").remove();
                                        		if(document.getElementById("clientsComments-error-message"))
                                               	 document.getElementById("clientsComments-error-message").remove();
                		var alert = document.createElement("div");
						alert.innerHTML = txt.message;
						alert.className = "confirm-message";
                    	alert.id="upload-confirm-message";
						alert.setAttribute("role","alert");
						document.body.appendChild(alert);
                    	CreateFilesTable(txt.data);
                    }
                }
                catch(e)
                {
                	//alert("Error uploading file.");
                	//console.log(JSON.stringify(data));
                }
			});
			this.uploader.startup();
 
});

function CreateFilesTable(DisplayData){
 require([
	"dojo/dom-construct",
	"dojo/request",
	"dojo/on",
	"dojo/dom",
	], function(domConstruct,request,on,dom){
 										if(dom.byId("fileList"))
                                        {
 											dom.byId("fileList").remove();
                                        }
 										if(dom.byId("newFileTable"))
                                        {
                                        	dom.byId("newFileTable").remove();
                                        }
										console.log(DisplayData);
 											//Comments Table
 										domConstruct.create("div",{class:"filesList", id:"newFileTable"},"filesContainer");
                            			var table = domConstruct.create("table",{id:"files-Table", class:"filesTable"},"newFileTable");
                            			var tr1 = domConstruct.create("thead",{id:"FileRow", },"files-Table");
                            			var th1 = domConstruct.create("th",{},"FileRow");
                                    	var th2 = domConstruct.create("th",{},"FileRow");
                                    	var th3 = domConstruct.create("th",{},"FileRow");
 										var th4 = domConstruct.create("th",{},"FileRow");
 										var th5 = domConstruct.create("th",{},"FileRow");
                                    	th1.innerHTML = "Name";
                                    	th2.innerHTML = "Type";
                                    	th3.innerHTML = "Size";
 										th4.innerHTML = "Uploaded";
 										th5.innerHTML = "";
 									
										for(j=0; j<DisplayData.length; j++)
                                    	{
                                    		var tr2 = domConstruct.create("tr",{id:"FileRow" + j, },"files-Table");
                                    		var td1 = domConstruct.create("td",{},"FileRow" + j);
                                    		var td2 = domConstruct.create("td",{},"FileRow" + j);
                                    		var td3 = domConstruct.create("td",{},"FileRow" + j);
                                        	var td4 = domConstruct.create("td",{},"FileRow" + j);
                                        	var td5 = domConstruct.create("td",{},"FileRow" + j);
                                    		td1.innerHTML = '<a href="index.php/file/download/' + DisplayData[j].id +'">' + DisplayData[j].name + '</a>';
                                    		if( DisplayData[j].type == ".xlsx")
											td2.innerHTML = "<img title='Microsoft Excel spreadsheet' src='assets/images/file_icons/excel.png' />";
                							if( DisplayData[j].type ==  ".docx")
											td2.innerHTML ="<img title='Microsoft Word document' src='assets/images/file_icons/word.png' />";
                							if( DisplayData[j].type ==  ".pptx")
											td2.innerHTML ="<img title='Microsoft PowerPoint presentation' src='assets/images/file_icons/powerpoint.png' />";
                							if( DisplayData[j].type ==  ".pdf")
											td2.innerHTML ="<img title='Portable Document Format (PDF) document' src='assets/images/file_icons/pdf.png' />";
                    						if((DisplayData[j].type ==  ".bmp") || (DisplayData[j].type == ".jpg") || (DisplayData[j].type == ".jpeg" )||( DisplayData[j].type == ".png") || (DisplayData[j].type == ".gif"))
                                            {
												td2.innerHTML = "<img title='Image' src='assets/images/file_icons/image.png' />";
                								td2.innerHTML= "<img title='Rich Text Format (RTF) document' src='assets/images/file_icons/rtf.png' />";
                                           	}
                                        
                    						td3.innerHTML = DisplayData[j].size ;
                                        	td4.innerHTML = DisplayData[j].uploaded;
                                        	td5.innerHTML =  '<button class="DeleteFile" onClick="DeleteFile(' +DisplayData[j].id+')">Remove</button>';
                                    	}
 
 });
}

</script>

<div class="filesList" id="fileList" tabindex = 0>
<?php
// Create file list

	echo '<table class="filesTable">';
	echo '<thead><tr><th>Name</th><th>Type</th><th>Size</th><th>Uploaded</th><th></th></tr></thead>';
if (isset($files))
{
	if (count($files) == 0)
    {
    	echo '<tr>';
		echo '<td colspan="5">No records found</td>';
		echo '</tr>';
		echo '</table>';
    }
	else foreach($files as $file)
    {
    	echo '<tr>';
    	echo '<td><a href="index.php/file/download/' . $file["id"] . '">' . $file["name"] . '</a></td>';
    	if ($file["type"] == ".docx")
    		echo '<td><img title="Microsoft Word document" src="assets/images/file_icons/word.png" /></td>';
    	else if ($file["type"] == ".xlsx")
    		echo '<td><img title="Microsoft Excel spreadsheet" src="assets/images/file_icons/excel.png" /></td>';
    	else if ($file["type"] == ".pptx")
    		echo '<td><img title="Microsoft PowerPoint presentation" src="assets/images/file_icons/powerpoint.png" /></td>';
    	else if ($file["type"] == ".pdf")
    		echo '<td><img title="Portable Document Format (PDF) document" src="assets/images/file_icons/pdf.png" /></td>';
    	else if ($file["type"] == ".rtf")
    		echo '<td><img title="Rich Text Format (RTF) document" src="assets/images/file_icons/rtf.png" /></td>';
    	else
    		echo '<td><img title="Image" src="assets/images/file_icons/image.png" /></td>';
    	echo '<td>' . $file["size"] . '</td>';
    	echo '<td>' . $file["uploaded"] . '</td>';
    	echo "<td>". '<button class="DeleteFile" onClick="DeleteFile(' .  $file["id"] .')">Remove</button>' . "</td>";
    	echo '</tr>';
    }
	echo '</table>';
}
?>
</div>
<script>

function DeleteFile(id){
	require([
		"dojo/request"
	], function(request){
    	var clientID = document.getElementById("clientId").value;
		messageBox("Alert", "Are you sure you want to delete this file?", ["Yes", "No"], false, function(answer){
    		if (answer != "Yes") return;
        	var lastFocus = document.getElementById("fileList");
    		request("index.php/file/recycle/" + id + "/" + clientID).then(function(txt){
        	let fileDeleteData = JSON.parse(txt);
				if(fileDeleteData.status == "done")
                {
                								if(document.getElementById("upload-confirm-message"))
                    								document.getElementById("upload-confirm-message").remove();
                    							if(document.getElementById("delete-confirm-message"))
                        							document.getElementById("delete-confirm-message").remove();
                                        		if(document.getElementById("clientsDetails-confirm-message"))
                                               	 document.getElementById("clientsDetails-confirm-message").remove();
                                        		if(document.getElementById("clientsDetails-error-message"))
                                               	 document.getElementById("clientsDetails-error-message").remove();
                                        		if(document.getElementById("clientsComments-confirm-message"))
                                               	 document.getElementById("clientsComments-confirm-message").remove();
                                        		if(document.getElementById("clientsComments-error-message"))
                                               	 document.getElementById("clientsComments-error-message").remove();    
                
                	CreateFilesTable(fileDeleteData.data);
                	var alert = document.createElement("div");
					alert.innerHTML = fileDeleteData.message;
					alert.className = "confirm-message";
                	alert.id="delete-confirm-message";
					alert.setAttribute("role","alert");
					document.body.appendChild(alert);
				}
				else
				{
					messageBox("Alert",fileDeleteData.message,"OK",false);
				}
  
        	});
    	});
	});
}
</script>
</div>
</div>