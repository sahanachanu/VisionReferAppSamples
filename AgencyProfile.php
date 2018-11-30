<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="Container" id="content">
<div class="sub-page-top"><a href="index.php/agency/dashboard"><img src="assets/images/back-arrow.png" class="back-arrow" alt="" role="presentation" >Back</a></div>


<div class="refer-client-content">
	<img src="assets/images/profile-img.png" alt="" role="presentation" class="current-page-icon">
<div class="page-form-header-rc"><img class="fourSqBullet" src="assets/images/4square-bullet.png" alt="" role="presentation"><h1 class="Title">Profile</h1></div>


<!-- Status of agency which is non-editable-->
<div class="StatusConatiner" id="StatusContainerAgency">
<!--The current status of the client is shown -->
<div class="DisplayStatus"><h2 class="status-label">Current Status</h2>
<?php if ($status == "Active") echo ('<svg class="svg-circle">
<circle class="status-circle" id="circle1" r="18" cx="20" cy="20" style="fill:#0fc431" ></circle> 
</svg>');?>
<?php if ($status == "Inactive") echo ('<svg class="svg-circle">
<circle class="status-circle" id="circle1" r="18" cx="20" cy="20" style="fill:#ff0000 " ></circle> 
</svg>');?>

<?php if ($status == "Active") echo ("Active") ?>
<?php if ($status == "Inactive") echo ("Inactive") ?>
</div>
</div>

<div class="agencyProfileContainer">
<!--Edit button created to enable the form-edit-->
<button id="EditProfile" onClick="EditFunction()">Edit</button>

<!--<div id="ProfileForm"> -->
<div id="ReadProfile">
<!--Create div for Organization name -->
<div class="ReadDataContain">
<div class="label" for="ReadOrgName_profile">Organization Name:</div>
<div id="ReadOrgName_profile"><?php if(isset($organization)) echo  $organization ; ?> </div>
</div>

<!--create div for Contact Name -->
<div class="ReadDataContain">
<div class="label" for="ReadContactName_profile">Contact Name:</div>
<div id="ReadContactName_profile">  <?php if(isset($contact_name)) echo  $contact_name ; ?></div>
</div>
	
<!--Create divs for address -->
<div class="ReadAddressDiv">
<div class="ReadformSection">Address:</div>
<div class="ReadDataDiv">
<div class="label" for="ReadAddress1_profile">Street Address</div>
<div id="ReadAddress1_profile"> <?php if(isset($address1)) echo  $address1 ; ?></div>
</div>

<div class="ReadDataDiv">
<div class="label" for="ReadAddress2_profile">Street Address Line2</div>
<div id="ReadAddress2_profile"> <?php if(isset($address2)) echo $address2 ; ?> </div>
</div>

<div class="ReadformSection"></div>
<div class="ReadDataDiv">
<div class="label" for="Readcity_profile">City</div>
<div id="Readcity_profile"> <?php if(isset($city)) echo  $city ; ?> </div>
</div>

<div class="ReadDataDiv">
<div class="label" for="Readstate_profile">State</div>
<div id="Readstate_profile"> <?php if(isset($state)) echo  $state ; ?> </div>
</div>

<div class="ReadformSection"></div>
<div class="ReadDataDiv">
<div class="label" for="Readzip_profile">Zip</div>
<div id="Readzip_profile"> <?php if(isset($zip)) echo  $zip; ?></div>
</div>
</div>

<div class="PhoneContain">
<div class="ReadformSection">Phone Number:</div>
<div class="ReadDataDiv">
<div class="label" for="Readphone_profile">Number</div>
<div id="Readphone_profile"> <?php if(isset($phone)) echo $phone; ?> </div>
</div>
<div class="ReadDataDiv">
<div class="label" for="Readext_profile">Ext</div>
<div id="Readext_profile"> <?php if(isset($ext)) echo  $ext; ?> </div>
</div>
</div>

<div class="ReadEmailContain">
<div class="label" for="Reademail_profile">Email:</div>
<div id="Reademail_profile" > <?php if(isset($email)) echo  $email; ?> </div>
</div>
</div>

<!-- Form -->
<form method="post" action="index.php/account/profile">
<input type="hidden" name="<?php echo $csrf['name']; ?>" value="<?php echo $csrf['hash']; ?>" />
<div id="SaveProfile" style="display:none">


<!--Create div for Organization name -->
<div class="DataContain">
<div class="label" for="OrgName_profile">Organization Name:</div>
<input type="text"  name="orgName" id="OrgName_profile" aria-label="Organization Name" readonly <?php if(isset($organization)) echo 'value="' . $organization . '"'; ?>>
</div>

<!--create div for Contact Name -->
<div class="DataContain">
<div class="label" for="ContactName_profile">Contact Name:</div>
<input type="text"  name="contactName" id="ContactName_profile" aria-label="Contact Name" <?php if(isset($contact_name)) echo 'value="' . $contact_name . '"'; ?> required>
</div>
	
<!--Create divs for address -->
<div class="AddressDiv">
<div class="ReadformSection">Address:</div>
<div class="ReadDataDiv">
<div class="label" for="Address1_profile">Street Address</div>
<input type="text"  name="addressLine1" id="Address1_profile" aria-label="Address Line1" <?php if(isset($address1)) echo 'value="' . $address1 . '"'; ?> required>
</div>

<div class="ReadDataDiv">
<div class="label" for="Address2_profile">Street Address Line2</div>
<input type="text"  name="addressLine2" id="Address2_profile" aria-label="Address Line2" <?php if(isset($address2)) echo 'value="' . $address2 . '"'; ?> >
</div>

<div class="ReadformSection"></div>
<div class="ReadDataDiv">
<div class="label" for="city_profile">City</div>
<input type="text"  name="city" id="city_profile" aria-label="City" <?php if(isset($city)) echo 'value="' . $city . '"'; ?> required>
</div>

<input type="hidden" value=" <?php if(isset($state)) echo $stateName = $state;?>">
<div class="ReadDataDiv">
<label class="label" for="state_profile">State</label><div id="state_profile"><select id="stateList_editProfile" name="state" aria-label="State" required><option <?php if ($stateName == "AL") echo "selected" ?> value="AL">Alabama</option><option <?php if ($stateName == "AK") echo "selected" ?> value="AK">Alaska</option><option <?php if ($stateName == "AZ") echo "selected" ?> value="AZ">Arizona</option><option <?php if ($stateName == "AR") echo "selected" ?> value="AR">Arkansas</option><option <?php if ($stateName == "CA") echo "selected" ?> value="CA">California</option><option <?php if ($stateName == "CO") echo "selected" ?> value="CO">Colorado</option><option <?php if ($stateName == "CT") echo "selected" ?> value="CT">Connecticut</option><option <?php if ($stateName == "DE") echo "selected" ?> value="DE">Delaware</option><option <?php if ($stateName == "FL") echo "selected" ?> value="FL">Florida</option><option <?php if ($stateName == "GA") echo "selected" ?> value="GA">Georgia</option><option <?php if ($stateName == "HI") echo "selected" ?> value="HI">Hawaii</option><option <?php if ($stateName == "ID") echo "selected" ?> value="ID">Idaho</option><option <?php if ($stateName == "IL") echo "selected" ?> value="IL">Illinois</option><option <?php if ($stateName == "IN") echo "selected" ?> value="IN">Indiana</option><option <?php if ($stateName == "IA") echo "selected" ?> value="IA">Iowa</option><option <?php if ($stateName == "KS") echo "selected" ?> value="KS">Kansas</option><option <?php if ($stateName == "KY") echo "selected" ?> value="KY">Kentucky</option><option <?php if ($stateName == "LA") echo "selected" ?> value="LA">Louisiana</option><option <?php if ($stateName == "ME") echo "selected" ?> value="ME">Maine</option><option <?php if ($stateName == "MD") echo "selected" ?> value="MD">Maryland</option><option <?php if ($stateName == "MA") echo "selected" ?> value="MA">Massachusetts</option><option <?php if ($stateName == "MI") echo "selected" ?> value="MI">Michigan</option><option <?php if ($stateName == "MN") echo "selected" ?> value="MN">Minnesota</option><option <?php if ($stateName == "MS") echo "selected" ?> value="MS">Mississippi</option><option <?php if ($stateName == "MO") echo "selected" ?> value="MO">Missouri</option><option <?php if ($stateName == "MT") echo "selected" ?> value="MT">Montana</option><option <?php if ($stateName == "NE") echo "selected" ?> value="NE">Nebraska</option><option <?php if ($stateName == "NV") echo "selected" ?> value="NV">Nevada</option><option <?php if ($stateName == "NH") echo "selected" ?> value="NH">New Hampshire</option><option <?php if ($stateName == "NJ") echo "selected" ?> value="NJ">New Jersey</option><option value="NM">New Mexico</option><option <?php if ($stateName == "NY") echo "selected" ?>  value="NY">New York</option><option <?php if ($stateName == "NC") echo "selected" ?>  value="NC">North Carolina</option><option <?php if ($stateName == "ND") echo "selected" ?>  value="ND">North Dakota</option><option <?php if ($stateName == "OH") echo "selected" ?>  value="OH">Ohio</option><option <?php if ($stateName == "OK") echo "selected" ?>  value="OK">Oklahoma</option><option <?php if ($stateName == "OR") echo "selected" ?> value="OR">Oregon</option><option <?php if ($stateName == "PA") echo "selected" ?> value="PA">Pennsylvania</option><option <?php if ($stateName == "RI") echo "selected" ?> value="RI">Rhode Island</option><option <?php if ($stateName == "SC") echo "selected" ?> value="SC">South Carolina</option><option <?php if ($stateName == "SD") echo "selected" ?> value="SD">South Dakota</option><option <?php if ($stateName == "TN") echo "selected" ?> value="TN">Tennessee</option><option <?php if ($stateName == "TX") echo "selected" ?> value="TX">Texas</option><option <?php if ($stateName == "UT") echo "selected" ?> value="UT">Utah</option><option <?php if ($stateName == "VT") echo "selected" ?> value="VT">Vermont</option><option <?php if ($stateName == "VA") echo "selected" ?> value="VA">Virginia</option><option <?php if ($stateName == "WA") echo "selected" ?> value="WA">Washington</option><option <?php if ($stateName == "WV") echo "selected" ?> value="WV">West Virginia</option><option <?php if ($stateName == "WI") echo "selected" ?> value="WI">Wisconsin</option><option <?php if ($stateName == "WY") echo "selected" ?> value="WY">Wyoming</option></select></div>
</div>
<div class="ReadformSection"></div>
<div class="ReadDataDiv">
<div class="label" for="zip_profile">Zip</div>
<input type="text"  name="zip" id="zip_profile" aria-label="ZipCode" <?php if(isset($zip)) echo 'value="' . $zip . '"'; ?> required>
</div>
</div>

<div class="PhoneContain">
<div class="ReadformSection">Phone Number:</div>
<div class="ReadDataDiv">
<div class="label" for="phone_profile">Number</div>
<input type="text"  name="phone" id="phone_profile" aria-label="Phone" onkeydown="javascript:backspacerDOWN(this,event);", onkeyup="javascript:backspacerUP(this,event);" <?php if(isset($phone)) echo 'value="' . $phone. '"'; ?> required>
</div>
<div class="ReadDataDiv">
<div class="label" for="ext_profile">Ext</div>
<input type="text"  name="ext" id="ext_profile" aria-label="Extension" <?php if(isset($ext)) echo 'value="' . $ext. '"'; ?> >
</div>
</div>

<div class="EmailContain">
<div class="label" for="email_profile">Email:</div>
<input type="email"  name="email" id="email_profile" aria-label="Email" <?php if(isset($email)) echo 'value="' . $email . '"'; ?> required>
</div>
<button type="submit" id="save">Save</button>
</div>
</form>

<button id="CancelProfile" style="display:none;"onClick="CancelFunction()">Cancel</button>
</div>

<div class="ChangePwd"><a href="index.php/account/reset_password">Change Password</a></div>

<div id="RulesContainer">
<h1 class="RulesTitle">Referral Rules</h1>
<div id="list_of_rules">
<div id="AllRulesContainer">
<h3>Meet all of the following rules:</h3>
<div id="AllRules"></div>
</div>
<div id="AnyRulesContainer">
<h3>Meet any of the following rules:</h3>
<div id="AnyRules"></div>
</div>
</div>
</div>

<!--Code to automate phone number input -->
<script>
<?php if (isset($message)) : ?>
var status = "<?php echo $message['status']; ?>";
var message = "<?php echo $message['message']; ?>";
console.log(status);
console.log(message);
if(status == "done")
{
	var alert = document.createElement("div");
	alert.innerHTML = message;
	alert.className = "confirm-message";
	alert.setAttribute("role","alert");
	document.body.appendChild(alert);
	
}
else
{
	var alert = document.createElement("div");
	alert.innerHTML = message;
	alert.className = "error-message";
	alert.setAttribute("role","alert");
	document.body.appendChild(alert);
}
<?php endif; ?>
function EditFunction()
{
	document.getElementById("ReadProfile").style.display = "none";
	document.getElementById("EditProfile").style.display = "none";
	document.getElementById("SaveProfile").style.display = "";
	document.getElementById("CancelProfile").style.display = "";
}
function CancelFunction(){
	window.location.reload();
}

var RulesData = <?php echo json_encode ($rules);?>;
console.log(RulesData);
for(i=0; i<RulesData.length; i++)
{
	var any =  RulesData[i].any;
	var all = RulesData[i].all;
	for(j=0; j<any.length; j++)
    {
    	document.getElementById("AnyRules").innerHTML += '<li id="list_any_rules">'+any[j]+'</li></ul>'  ;
    }
	
	for(k=0; k<all.length; k++)
    {
    	document.getElementById("AllRules").innerHTML+= '<li id="list_all_rules">'+all[k]+'</li>' ;
    }
}


</script>
</div>
