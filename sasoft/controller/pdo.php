<?php
class _pdo_{
	public function fireWebApp(){
		$this->readHeader();
		$this->readBody();
		$this->readFooter();
	}
	protected function readHeader(){
		require_once("../model/header.php");
	}
	protected function readBody(){
		global $conn;
		
		if($this->IsnoEmployees()=="No"){
			$this->noEmployeesHeader();
			$this->noEmployeesBody();
		}
		else{
			$this->EmployeesHeader();
			?>
			<div class="body-container d-flex">
				<div class="left-side-bar">
					<!-- would have been scripted here if it was required -->
				</div>
				<div class="right-data-display">
					<?php
						$this->tableBodyDisplay();
					?>
				</div>

			</div>
			<?php
		}
		?>

		<!-- <img src="../model/img/icon.jpg"> -->
		<?php
	}
	protected function isIdExists($id){
		$conn=$this->connection();
		$_="select id from employees where id=?";
		$stmt=$conn->prepare($_);
		$stmt->bind_param("s",$id);
		$stmt->execute();
		$stmt->bind_result($id);
		$stmt->store_result();
		$num_rows=$stmt->num_rows;
		return($num_rows==1);
	}
	protected function search($column,$value){
		$conn=$this->connection();
		// $abc=;
		$find=$conn->query("select * from employees where ".$column." like '%$value%'");
		$results=array();
		while($row=mysqli_fetch_array($find)){
			array_push($results, $row);
		}
		return $results;
	}
	protected function displayResults($results,$search_query){
		// $conn=$this->connection();
		?>
		<div class="do-over"> 
			<div class="card-header text-bold text-white text-left ">
	          <span><i class="bi bi-table me-2"></i></span> Search Results of {<?php echo $search_query;?>}
	        </div>
	        <div class="card-body">
	          <div class="table-responsive">
	            <table
	              id="tableComposition"
	              class="table table-striped data-table"
	              style="width: 100%"
	            >
	              <thead class="bg-purple text-white">
	                <tr>
	                   <th>#</th>
	                  <th>EmployeeID</th>
	                  <th>dob</th>
	                  <th>Name</th>
	                  <th>Surname</th>
	                  <th>Phone</th>
	                  <th>Email</th>
	                  <th>country</th>
	                  
	                  <th>Analysis</th>
	                  
	                </tr>
	              </thead>
	              <tbody>
	              	<?php 
	              	$count=1;
	              	foreach ($results as $row) {
	              		$name=$row['name'];
	              		$surname=$row['surname'];
	              		$email=$row['email'];
	              		$phone=$row['phone'];
	              		$dob=$row['dob'];
	              		$id=$row['id'];
	              		$country=$row['country'];
	              		?>
	              		<!-- <tr class="remove_id_employee<?php //echo $id;?>" style="border: none;">
	              			<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
		                </tr> -->
		                
	              		<tr class="remove_id_employee<?php echo $id;?>" style="background: <?php if($count%2==0){echo "grey";}else{echo"lightgrey";}?>; border-radius: 10px; color: purple;">
	              		  <td><div class="round-counter-tag"><h5><?php echo $count;?></h5></div></td>
		          		  <td><?php echo $id;?></td>
		          		  <td><?php echo $dob;?></td>
		                  <td><?php echo $name;?></td>
		                  <td><?php echo $surname;?></td>
		                  
		                  <td><?php echo $phone;?></td>
		                  <td><?php echo $email;?></td>
		                  <td><?php echo $country;?></td>
		                  
		                  <td>
		                  	<span class="badge bg-purple text-white" title="Visit <?php echo $name." ".$surname;?>">
		                  		<a href="./?employee=<?php echo $id;?>" style="color: white;">-></a>
		                  	</span> :
			                <span class="badge bg-primary text-white text-bold text-center details" id="<?php echo $id;?>">
		                  	  <i class="fa fa-edit"></i>
		                  	</span> : 
							<span class="badge bg-danger text-white text-bold text-center asap_remove_employee<?php echo $id;?>" onclick="deleteEmployee('<?php echo $id;?>')">
		                  	  <i class="bi bi-trash"></i>
		                  	</span>

		                  </td>
		                </tr>

		                <!-- <tr style="border: none;">
	              		  <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
		                </tr> -->
	              		<?php
	              		$count++;
	              	}
	              	?>
	              </tbody>
	              <tfoot class="bg-purple text-white">
	                <tr>
	                  <th>#</th>
	                  <th>EmployeeID</th>
	                  <th>dob</th>
	                  <th>Name</th>
	                  <th>Surname</th>
	                  <th>Phone</th>
	                  <th>Email</th>
	                  <th>country</th>
	                  
	                  <th>Analysis</th>
	                </tr>
	              </tfoot>
	            </table>
	  
	          </div>
	        </div>
	    </div>
		<?php
	}
	public function displayUserInfo($results){
		$conn=$this->connection();
		$employee=$results['id'];

		?>
		<input hidden class="IdToUpdate2" value="<?php echo $employee;?>">
		<div class="phase1">
      		<h6 class="text-purple text-left">Update <?php echo $results['name']." ".$results['surname'];?></h6>
      		<div class="group-input d-flex text-left text-white">
	        	<div class="input-fname">
	        		<div class="label text-left text-white">First Name</div>
	        		<div class="input-source">
	        			<input type="text" class="fname" value="<?php echo $results['name'];?>" placeholder="First Name">	
	        		</div>
	        		
	        	</div>
	        	<div class="input-lname">
	        		<div class="label text-left text-white">Last Name</div>
	        		<div class="input-source">
	        			<input type="text" class="lname" value="<?php echo $results['surname'];?>" placeholder="Last Name">	
	        		</div>
	        		
	        	</div>
	        </div>
	        <div class="group-input d-flex text-left text-white">
	        	<div class="input-phone">
	        		<div class="label text-left text-white">Contact Number</div>
	        		<div class="input-source">
	        			<input type="number" class="phone" value="<?php echo $results['phone'];?>"placeholder="Contact number">	
	        		</div>
	        		
	        	</div>
	        </div>
	        <div class="group-input d-flex text-left text-white">
	        	<div class="input-email">
	        		<div class="label-mail text-left text-white">Email Address</div>
	        		<div class="input-source">
	        			<input type="email" class="email" value="<?php echo $results['email'];?>" placeholder="Email Address">	
	        		</div>
	        	</div>
	        </div>
	        <div class="group-input d-flex text-left text-white">
	        	<div class="input-date">
	        		<div class="label text-left text-white">Date of Birth</div>
	        		<div class="input-source">
	        			<input type="date" class="dob" value="<?php echo $results['dob'];?>" placeholder="Date Of Birth">	
	        		</div>
	        	</div>
	        </div>
      	</div>
	     <div class="phase2">
	     	<h6 class="text-purple text-left">Address Info</h6>
	     	<div class="group-input d-flex text-left text-white">
	     		<div class="group-input d-flex text-left text-white">
		        	<div class="input-address">
		        		<div class="label text-left text-white">Street Address</div>
		        		<div class="input-street">
		        			<select class="street" >
		        				<option value="<?php echo $results['street'];?>"><?php echo $results['street'];?></option>
		        				<option value="23 Dr Xaba">23 Dr Xaba </option>
		        				<option value="1 Smith Avanue">1 Smith Avanue</option>
		        				<option value="Durban South pave way">Durban South pave way</option>
		        				<option value="28 Solomon street">28 Solomon street</option>
		        				<option value="D995 Main Road">D995 Main Road</option>
		        				<option value="504 Blue Matrix Avenue">504 Blue Matrix Avenue</option>
		        				<option value="Smith Street">Smith Street</option>
		        			</select>
		        		</div>
		        	</div>

		        </div>
	     	</div>
	     	<div class="group-input d-flex text-left text-white">
	        	<div class="input-date">
	        		<div class="label text-left text-white">City</div>
	        		<div class="input-city">
	        			<select class="city">
	        				<option value="<?php echo $results['city'];?>"><?php echo $results['city'];?></option>
	        				<option value="Durban">Durban </option>
	        				<option value="Johannesburg">Johannesburg</option>
	        				<option value="Pretoria">Pretoria</option>
	        				<option value="Cape Town">Cape Town</option>
	        				<option value="Petermaritzburg">Petermaritzburg</option>
	        				<option value="Polokwane">Polokwane</option>
	        				<!-- <option value="Smith Street">Smith Street</option> -->
	        			</select>	
	        		</div>
	        	</div>
	        	<div class="input-date">
	        		<div class="label text-left text-white">Postal Code</div>
	        		<div class="input-code">
	        			<select class="code">
	        				<option value="<?php echo $results['postal'];?>"><?php echo $results['postal'];?></option>
	        				<option value="4100">4100 </option>
	        				<option value="4001">4001</option>
	        				<option value="4350">4350</option>
	        				<option value="4256">4256</option>
	        				<option value="3251">3251</option>
	        				<option value="2457">4710</option>
	        				<option value="2547">2547</option>
	        			</select>	
	        		</div>
	        	</div>
	        	<div class="input-date">
	        		<div class="label text-left text-white">Country</div>
	        		<div class="input-country">
	        			<select class="country">
	        				<option value="<?php echo $results['country'];?>"><?php echo $results['country'];?></option>
	        				<?php $this->countryArray()?>
	        			</select>	
	        		</div>
	        	</div>
	        </div>
	     </div>  
	     <div class="phase3">
	     	<h6 class="text-left" style="border:2px solid red; padding: 5px 5px;color:red;">To edit Skills of Employee, visit the employee profile and edit the employee skills.</h6>
	     </div>

      </div>
      <div class="group-input d-flex text-left text-white">
    	<div class="input-btn">
    		<div class="input-left-source">
    				
    		</div>
    	</div>
    	<div class="input-btn">
    		<div class="input-right-source">
    			<button class="btn text-center UpdateEmployee text-white"><i class="fa fa-plus" style="padding: 5px 5px; color:purple;background: white;border-radius: 50px;"></i>Update Employee</button>	
    		</div>
    	</div>
<script>
	$(document).ready(function(){
	    $(".UpdateEmployee").click(function(){
			const fname1=$(".fname").val();
			const lname1=$(".lname").val();
			const phone1=$(".phone").val();
			const email1=$(".email").val();
			const dob1=$(".dob").val();
			const street1=$(".street").val();
			const city1=$(".city").val();
			const code1=$(".code").val();
			
			const country1=$(".country").val();
			const employeeID=$(".IdToUpdate2").val();
			
			
			$(".fname").removeAttr("style");
			$(".fname").removeAttr("placeholder");
			$(".lname").removeAttr("style");
			$(".lname").removeAttr("placeholder");
			$(".phone").removeAttr("style");
			$(".phone").removeAttr("placeholder");
			$(".email").removeAttr("style");
			$(".email").removeAttr("placeholder");
			$(".dob").removeAttr("style");
			$(".dob").removeAttr("placeholder");
			$(".street").removeAttr("style");
			$(".street").removeAttr("placeholder");
			$(".city").removeAttr("style");
			$(".city").removeAttr("placeholder");
			$(".code").removeAttr("style");
			$(".code").removeAttr("placeholder");
			$(".country").removeAttr("style");
			$(".country").removeAttr("placeholder");
			// console.log("testing");
			// $(".skill").removeAttr("style");
			// $(".skill").removeAttr("placeholder");
			// $(".yrs-experience").removeAttr("style");
			// $(".yrs-experience").removeAttr("placeholder");
			// $(".seniority").removeAttr("style");
			// $(".seniority").removeAttr("placeholder");
			$(".label-mail").removeAttr("style");
			$(".label-mail").html("Email Address");
			if(fname1==""){
				$(".fname").attr("style","border:2px solid red;color:red;");
				$(".fname").attr("placeholder","Input Empty!!..");
			}
			else if(lname1==""){
				$(".lname").attr("style","border:2px solid red;color:red;");
				$(".lname").attr("placeholder","Input Empty!!..");
			}
			else if(phone1==""){
				$(".phone").attr("style","border:2px solid red;color:red;");
				$(".phone").attr("placeholder","Input Empty!!..");
			}
			else if(email1==""){
				$(".email").attr("style","border:2px solid red;color:red;");
				$(".email").attr("placeholder","Input Empty!!..");
				
			}
			else if(!emailL(email1)){
				$(".email").attr("style","border:2px solid red;color:red;");
				$(".label-mail").attr("style","background:red;");
				$(".label-mail").html("Invalid Email!!..");
			}
			else if(dob1==""){
				$(".dob").attr("style","border:2px solid red;color:red;");
				$(".dob").attr("placeholder","Input Empty!!..");
			}
			else if(street1==""){
				$(".street").attr("style","border:2px solid red;color:red;");
				$(".street").attr("placeholder","Input Empty!!..");
			}
			else if(city1==""){
				$(".city").attr("style","border:2px solid red;color:red;");
				$(".city").attr("placeholder","Input Empty!!..");
			}
			else if(code1==""){
				$(".code").attr("style","border:2px solid red;color:red;");
				$(".code").attr("placeholder","Input Empty!!..");
			}
			else if(country1==""){
				$(".country").attr("style","border:2px solid red;color:red;");
				$(".country").attr("placeholder","Input Empty!!..");
			}
			else{
				const url="../controller/upload.php";
				// console.log(url);
		        $.ajax({
		          url:url,
		          type:"POST",
		          data:{fname1:fname1,lname1:lname1,phone1:phone1,email1:email1,dob1:dob1,street1:street1,city1:city1,code1:code1,country1:country1,employeeID:employeeID},
		          cache:false,
		          beforeSend:function(){
		            $(".UpdateEmployee").html("<img src='../model/img/loader.gif' style='width:3%;'> Uploading Data....");
		          },
		          success:function(e){
		            console.log(e);
		            console.log(e.length);
		            if(e.length>2){
		              $(".UpdateEmployee").attr("style","border:3px solid red;background:#212121;color:red;");
		              $(".UpdateEmployee").html(e);
		            }
		            else{
		              $(".UpdateEmployee").attr("style","border:3px solid green;background:#212121;color:green;");
		              $(".UpdateEmployee").html("Employee "+fname1+" "+lname1+" Added sucessfuly.");
		              
					      
				  //     for(let i=1;i<=size;i++){
						// $(".skill"+i).val("");
						// $(".yrs-experience"+i).val("");
						// $(".seniority"+i).val("");
					 //  }
		            }
		          }
		        });
			}
		});
	});
</script>
		<?php
		return '';
	}
	public function countryArray(){
		$countryList = array(
			"Afghanistan",
			"Albania",
			"Algeria",
			"American Samoa",
			"Andorra",
			"Angola",
			"Anguilla",
			"Antarctica",
			"Antigua and Barbuda",
			"Argentina",
			"Armenia",
			"Aruba",
			"Australia",
			"Austria",
			"Azerbaijan",
			"Bahamas",
			"Bahrain",
			"Bangladesh",
			"Barbados",
			"Belarus",
			"Belgium",
			"Belize",
			"Benin",
			"Bermuda",
			"Bhutan",
			"Bolivia",
			"Bosnia and Herzegovina",
			"Botswana",
			"Bouvet Island",
			"Brazil",
			"British Antarctic Territory",
			"British Indian Ocean Territory",
			"British Virgin Islands",
			"Brunei",
			"Bulgaria",
			"Burkina Faso",
			"Burundi",
			"Cambodia",
			"Cameroon",
			"Canada",
			"Canton and Enderbury Islands",
			"Cape Verde",
			"Cayman Islands",
			"Central African Republic",
			"Chad",
			"Chile",
			"China",
			"Christmas Island",
			"Cocos [Keeling] Islands",
			"Colombia",
			"Comoros",
			"Congo - Brazzaville",
			"Congo - Kinshasa",
			"Cook Islands",
			"Costa Rica",
			"Croatia",
			"Cuba",
			"Cyprus",
			"Czech Republic",
			"Côte d’Ivoire",
			"Denmark",
			"Djibouti",
			"Dominica",
			"Dominican Republic",
			"Dronning Maud Land",
			"East Germany",
			"Ecuador",
			"Egypt",
			"El Salvador",
			"Equatorial Guinea",
			"Eritrea",
			"Estonia",
			"Ethiopia",
			"Falkland Islands",
			"Faroe Islands",
			"Fiji",
			"Finland",
			"France",
			"French Guiana",
			"French Polynesia",
			"French Southern Territories",
			"French Southern and Antarctic Territories",
			"Gabon",
			"Gambia",
			"Georgia",
			"Germany",
			"Ghana",
			"Gibraltar",
			"Greece",
			"Greenland",
			"Grenada",
			"Guadeloupe",
			"Guam",
			"Guatemala",
			"Guernsey",
			"Guinea",
			"Guinea-Bissau",
			"Guyana",
			"Haiti",
			"Heard Island and McDonald Islands",
			"Honduras",
			"Hong Kong SAR China",
			"Hungary",
			"Iceland",
			"India",
			"Indonesia",
			"Iran",
			"Iraq",
			"Ireland",
			"Isle of Man",
			"Israel",
			"Italy",
			"Jamaica",
			"Japan",
			"Jersey",
			"Johnston Island",
			"Jordan",
			"Kazakhstan",
			"Kenya",
			"Kiribati",
			"Kuwait",
			"Kyrgyzstan",
			"Laos",
			"Latvia",
			"Lebanon",
			"Lesotho",
			"Liberia",
			"Libya",
			"Liechtenstein",
			"Lithuania",
			"Luxembourg",
			"Macau SAR China",
			"Macedonia",
			"Madagascar",
			"Malawi",
			"Malaysia",
			"Maldives",
			"Mali",
			"Malta",
			"Marshall Islands",
			"Martinique",
			"Mauritania",
			"Mauritius",
			"Mayotte",
			"Metropolitan France",
			"Mexico",
			"Micronesia",
			"Midway Islands",
			"Moldova",
			"Monaco",
			"Mongolia",
			"Montenegro",
			"Montserrat",
			"Morocco",
			"Mozambique",
			"Myanmar [Burma]",
			"Namibia",
			"Nauru",
			"Nepal",
			"Netherlands",
			"Netherlands Antilles",
			"Neutral Zone",
			"New Caledonia",
			"New Zealand",
			"Nicaragua",
			"Niger",
			"Nigeria",
			"Niue",
			"Norfolk Island",
			"North Korea",
			"North Vietnam",
			"Northern Mariana Islands",
			"Norway",
			"Oman",
			"Pacific Islands Trust Territory",
			"Pakistan",
			"Palau",
			"Palestinian Territories",
			"Panama",
			"Panama Canal Zone",
			"Papua New Guinea",
			"Paraguay",
			"People's Democratic Republic of Yemen",
			"Peru",
			"Philippines",
			"Pitcairn Islands",
			"Poland",
			"Portugal",
			"Puerto Rico",
			"Qatar",
			"Romania",
			"Russia",
			"Rwanda",
			"Réunion",
			"Saint Barthélemy",
			"Saint Helena",
			"Saint Kitts and Nevis",
			"Saint Lucia",
			"Saint Martin",
			"Saint Pierre and Miquelon",
			"Saint Vincent and the Grenadines",
			"Samoa",
			"San Marino",
			"Saudi Arabia",
			"Senegal",
			"Serbia",
			"Serbia and Montenegro",
			"Seychelles",
			"Sierra Leone",
			"Singapore",
			"Slovakia",
			"Slovenia",
			"Solomon Islands",
			"Somalia",
			"South Africa",
			"South Georgia and the South Sandwich Islands",
			"South Korea",
			"Spain",
			"Sri Lanka",
			"Sudan",
			"Suriname",
			"Svalbard and Jan Mayen",
			"Swaziland",
			"Sweden",
			"Switzerland",
			"Syria",
			"São Tomé and Príncipe",
			"Taiwan",
			"Tajikistan",
			"Tanzania",
			"Thailand",
			"Timor-Leste",
			"Togo",
			"Tokelau",
			"Tonga",
			"Trinidad and Tobago",
			"Tunisia",
			"Turkey",
			"Turkmenistan",
			"Turks and Caicos Islands",
			"Tuvalu",
			"U.S. Minor Outlying Islands",
			"U.S. Miscellaneous Pacific Islands",
			"U.S. Virgin Islands",
			"Uganda",
			"Ukraine",
			"Union of Soviet Socialist Republics",
			"United Arab Emirates",
			"United Kingdom",
			"United States",
			"Unknown or Invalid Region",
			"Uruguay",
			"Uzbekistan",
			"Vanuatu",
			"Vatican City",
			"Venezuela",
			"Vietnam",
			"Wake Island",
			"Wallis and Futuna",
			"Western Sahara",
			"Yemen",
			"Zambia",
			"Zimbabwe",
			"Åland Islands"
			);
			for($i=0;$i<sizeof($countryList);$i++){
				?>
				<option value="<?php echo $countryList[$i]?>"><?php echo $countryList[$i]?></option>
				<?php
			}
	}
	public function displaySkillInfo($results){
		 $skill_id=$results['id'];
	?>
		<input hidden class="SkillIdToUpdate2" value="<?php echo $skill_id;?>">
		<div class="phase3">
	     	<h6 class="text-purple text-left">Updating Skills</h6>
	     	<div class="group-input d-flex text-left text-white">
	     		<div class="group-input d-flex text-left text-white">
		        	<div class="input-skill">
		        		<div class="label text-left text-white">Skill</div>
		        		<div class="input-skills">
		        			<input type="text" class="skill1_" placeholder="PHP v7" value="<?php echo $results['skill'];?>">
		        		</div>
		        	</div>
		        	<div class="input-experience">
		        		<div class="label text-left text-white">yrs-exp</div>
		        		<div class="input-yrs-experience">
		        			<select class="yrs-experience1_">
		        				<option value="<?php echo $results['experience'];?>"><?php echo $results['experience'];?></option>
		        				<option value="1">1</option>
		        				<option value="2">2</option>
		        				<option value="3">3</option>
		        				<option value="4">4</option>
		        				<option value="5+">5+</option>
		        			</select>
		        		</div>
		        	</div>
		        	<div class="input-seniority">
		        		<div class="label text-left text-white">Seniority Rating</div>
		        		<div class="input-seniority-">
		        			<!-- <input type="text" class="" placeholder="Enter Seniority"> -->
		        			<select class="seniority1_">
		        				<option value="<?php echo $results['Seniority'];?>"><?php echo $results['Seniority'];?></option>
		        				<option value="Junior">Junior</option>
		        				<option value="Intermediate">Intermediate</option>
		        				<option value="Senior">Senior</option>
		        				<option value="Team Lead">Team Lead</option>
		        				
		        			</select>
		        		</div>
		        	</div>
		        </div>

	     	</div>
	     	

	     	<!-- <div class="group-input d-flex text-left text-white">
	        	<div class="input-btn">
	        		<div class="input-source">
	        			<button class="btn text-center addSkill"><i class="fa fa-plus" style="padding: 3px 3px;"></i> Add New Skill</button>	
	        		</div>
	        	</div>
	        </div> -->
	     </div>

      </div>
      <div class="group-input d-flex text-left text-white">
    	<div class="input-btn">
    		<div class="input-left-source">
    				
    		</div>
    	</div>
    	<div class="input-btn">
    		<div class="input-right-source">
    			<button class="btn text-center UpdateEmployeeSkills text-white"><i class="fa fa-plus" style="padding: 5px 5px; color:purple;background: white;border-radius: 50px;"></i> Update Skills</button>	
    		</div>
    	</div>
      </div>
      
		<script>
			$(document).ready(function(){
			    $(".UpdateEmployeeSkills").click(function(){
					const skill1_ =$(".skill1_").val();
					const experience1_ =$(".yrs-experience1_").val();
					const seniority1_ =$(".seniority1_").val();
					
					const skillIdUpdate=$(".SkillIdToUpdate2").val();
					
					
					$(".skill1_").removeAttr("style");
					$(".skill1_").removeAttr("placeholder");
					$(".yrs-experience1_").removeAttr("style");
					$(".yrs-experience1_").removeAttr("placeholder");
					$(".seniority1_").removeAttr("style");
					$(".seniority1_").removeAttr("placeholder");
					
					if(skill1_==""){
						$(".skill1_").attr("style","border:2px solid red;color:red;");
						$(".skill1_").attr("placeholder","Input Empty!!..");
					}
					else if(experience1_==""){
						$(".yrs-experience1_").attr("style","border:2px solid red;color:red;");
						$(".yrs-experience1_").attr("placeholder","Input Empty!!..");
					}
					else if(seniority1_==""){
						$(".seniority1_").attr("style","border:2px solid red;color:red;");
						$(".seniority1_").attr("placeholder","Input Empty!!..");
					}
					else{
						const url="../controller/upload.php";
						// console.log(url);
				        $.ajax({
				          url:url,
				          type:"POST",
				          data:{skill1_:skill1_,experience1_:experience1_,seniority1_:seniority1_,skillIdUpdate:skillIdUpdate},
				          cache:false,
				          beforeSend:function(){
				            $(".UpdateEmployeeSkills").html("<img src='../model/img/loader.gif' style='width:3%;'> Uploading Data....");
				          },
				          success:function(e){
				            console.log(e);
				            console.log(e.length);
				            if(e.length>2){
				              $(".UpdateEmployeeSkills").attr("style","border:3px solid red;background:#212121;color:red;");
				              $(".UpdateEmployeeSkills").html(e);
				            }
				            else{
				              $(".UpdateEmployeeSkills").attr("style","border:3px solid green;background:#212121;color:green;");
				              $(".UpdateEmployeeSkills").html("Employee Skills Updated sucessfuly.");
				              
							      
						  //     for(let i=1;i<=size;i++){
								// $(".skill"+i).val("");
								// $(".yrs-experience"+i).val("");
								// $(".seniority"+i).val("");
							 //  }
				            }
				          }
				        });
					}
				});
			});
		</script>
	<?php
		return '';
	}
	protected function getSkills($id){
		$conn=$this->connection();
		return mysqli_fetch_array($conn->query("select*from skills where employee='$id'"));
	}
	protected function tableBodyDisplay(){
		$conn=$this->connection();
		?>
		<!-- <center> -->
		<?php
		if(isset($_POST['serch-btn-acr'])){
			$serch=$this->editTextBeforeSubmitting(mysqli_escape_string($conn,$_POST['serch-val']));
			$filter=$this->editTextBeforeSubmitting(mysqli_escape_string($conn,$_POST['filter']));
			if($filter=="fnameSearch"){
				$this->displayResults($this->search("name",$serch),$serch);
			}
			elseif($filter=="lNameSearch"){
				$this->displayResults($this->search("surname",$serch),$serch);
			}
			else{
				$this->displayResults($this->search("email",$serch),$serch);
			}
		}
		elseif(isset($_GET['employee']) && !empty($_GET['employee'])){
			$id=$this->editTextBeforeSubmitting(mysqli_escape_string($conn,$_GET['employee']));
			if($this->isIdExists($id)){
				?>

				<div class="do-over"> 
					<div class="card-header text-bold text-white text-left">
					  
					  	<span><i class="bi bi-table me-2"></i></span> sasoft employees <span style="width:100%;text-align: right;"><a href="./"><< Back</a></span>

			        </div>
			        <div class="card-body">
			          <div class="table-responsive">
			            <table
			              id="tableComposition"
			              class="table table-striped data-table"
			              style="width: 100%"
			            >
			              <thead class="bg-purple text-white">
			                <tr>
			                  <th>EmployeeID</th>
			                  <th>dob</th>
			                  <th>Name</th>
			                  <th>Surname</th>
			                  <th>Phone</th>
			                  <th>Email</th>
			                  <th>street</th>
			                  <th>postal</th>
			                  <th>city</th>
			                  <th>country</th>
			                  
			                  
			                </tr>
			              </thead>
			              <tbody>
			              	<?php 
			              	$_=$conn->query("select*from employees where id='$id'");

			              	while ($row=mysqli_fetch_array($_)) {
			              		$name=$row['name'];
			              		$surname=$row['surname'];
			              		$email=$row['email'];
			              		$phone=$row['phone'];
			              		$dob=$row['dob'];
			              		$id=$row['id'];
			              		$country=$row['country'];
			              		$city=$row['city'];
			              		$postal=$row['postal'];
			              		$street=$row['street'];
			              		$skills=$this->getSkills($id);
			              		?>
			              		
			              		<tr style="background: lightgrey; border-radius: 10px; color: purple;">
				          		  <td><?php echo $id;?></td>
				          		  <td><?php echo $dob;?></td>
				                  <td><?php echo $name;?></td>
				                  <td><?php echo $surname;?></td>
				                  
				                  <td><?php echo $phone;?></td>
				                  <td><?php echo $email;?></td>
				                   <td><?php echo $street;?></td>
				                  <td><?php echo $postal;?></td>
				                  <td><?php echo $city;?></td>
				                  <td><?php echo $country;?></td>

				                  
				                </tr>
				                
			              		<?php
			              	}
			              	?>
			              </tbody>
			              <tfoot class="bg-purple text-white">
			                <tr>
			                  <th>EmployeeID</th>
			                  <th>dob</th>
			                  <th>Name</th>
			                  <th>Surname</th>
			                  <th>Phone</th>
			                  <th>Email</th>
			                  <th>street</th>
			                  <th>postal</th>
			                  <th>city</th>
			                  <th>country</th>
			                </tr>
			              </tfoot>
			            </table>
			  
			          </div>
			        </div>
			        <hr>
			        <div class="card-header text-bold text-white text-left ">
			          <span><i class="bi bi-table me-2"></i></span> sasoft employee Skills 
			        </div>
			        <div class="card-body">
			          <div class="table-responsive">
			            <table
			              id="tableCompositiona"
			              class="table table-striped data-table"
			              style="width: 100%"
			            >
			              <thead class="bg-purple text-white">

			                <tr>
			                	<th></th>
			                  <th>EmployeeID</th>
			                  <th>skills</th>
			                  <th>experience</th>
			                  <th>Seniority</th>
			                  <th>Date Updated</th>
			                  <th>Delete</th>
			                </tr>
			              </thead>
			              <tbody>
			              	<?php 
			              	$_=$conn->query("select*from skills where employee='$id'");
			              	$count=1;
			              	while ($row=mysqli_fetch_array($_)) {
			              		$skill_id=$row['id'];
			              		$employee=$row['employee'];
			              		$skill=$row['skill'];
			              		$experience=$row['experience'];
			              		$Seniority=$row['Seniority'];
			              		$date_added=$row['date_added'];
			              		
			              		?>
			              		
			              		<tr class="remove_id<?php echo $skill_id;?>" style="background: <?php if($count%2==0){echo "grey";}else{echo"lightgrey";}?>; border-radius: 10px; color: purple;">
			              		  <td><div class="round-counter-tag"><h5><?php echo $count;?></h5></div></td>
				          		  <td><?php echo $employee;?></td>
				          		  <td><?php echo $skill;?></td>
				                  <td><?php echo $experience." yr/yr`s";?></td>
				                  <td><?php echo $Seniority;?></td>
				                  
				                  <td><?php echo $date_added;?></td>
				                  <td>
				                  	<span class="badge bg-danger text-white text-bold text-center asap_remove<?php echo $skill_id;?>" onclick="deleteFuntion(<?php echo $skill_id;?>)"><i class="bi bi-trash"></i></span> 
				                  	| 
				                  	<span class="badge bg-primary text-white text-bold text-center detailsSkills" id="<?php echo $skill_id;?>">
		                  	  			<i class="fa fa-edit"></i>
		                  			</span></td>
				                </tr>
				                
			              		<?php
			              		$count++;
			              	}
			              	?>
			              </tbody>
			              <tfoot class="bg-purple text-white">
			                <tr>
			                  <th></th>
			                  <th>EmployeeID</th>
			                  <th>skills</th>
			                  <th>experience</th>
			                  <th>Seniority</th>
			                  <th>Date Updated</th>
			                  <th>Delete</th>
			                </tr>
			              </tfoot>
			            </table>
			  
			          </div>
			        </div>
			    </div>
				<?php
			}
			else{
				?>
				<h2 class="bg-danger text-white error-px-v text-center">Employee ID does NOT Exists!!..</h2>
				<?php
			}
		}
		else{
			?>
		<!-- <div class="row"> -->
          <!-- <div class="col-md-12 mb-3">
            <div class="card " style="background:none;"> -->
			<div class="do-over"> 
				<div class="card-header text-bold text-white text-left ">
		          <span><i class="bi bi-table me-2"></i></span> sasoft employees
		        </div>
		        <div class="card-body">
		          <div class="table-responsive">
		            <table
		              id="tableComposition"
		              class="table table-striped data-table"
		              style="width: 100%"
		            >
		              <thead class="bg-purple text-white">
		                <tr>
		                   <th>#</th>
		                  <th>EmployeeID</th>
		                  <th>dob</th>
		                  <th>Name</th>
		                  <th>Surname</th>
		                  <th>Phone</th>
		                  <th>Email</th>
		                  <th>country</th>
		                  <th>Skill</th>
		                  
		                  <th>ViewMore</th>
		                  
		                </tr>
		              </thead>
		              <tbody>
		              	<?php 
		              	$_=$conn->query("select*from employees");
		              	$count=1;
		              	while ($row=mysqli_fetch_array($_)) {
		              		$name=$row['name'];
		              		$surname=$row['surname'];
		              		$email=$row['email'];
		              		$phone=$row['phone'];
		              		$dob=$row['dob'];
		              		$id=$row['id'];
		              		$country=$row['country'];
		              		$skill=$this->getSkills($id);
		              		?>
		              		<!-- <tr class="remove_id_employee<?php //echo $id;?>" style="border: none;">
		              			<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
			                </tr> -->
			                
		              		<tr class="remove_id_employee<?php echo $id;?>" style="background: <?php if($count%2==0){echo "grey";}else{echo"lightgrey";}?>; border-radius: 10px; color: purple;">
		              		  <td><div class="round-counter-tag"><h5><?php echo $count;?></h5></div></td>
			          		  <td><?php echo $id;?></td>
			          		  <td><?php echo $dob;?></td>
			                  <td><?php echo $name;?></td>
			                  <td><?php echo $surname;?></td>
			                  
			                  <td><?php echo $phone;?></td>
			                  <td><?php echo $email;?></td>
			                  <td><?php echo $country;?></td>
			                  <td><?php echo $skill['skill'];?></td>
			                  
			                  <td>
			                  	<span class="badge bg-purple text-white" title="Visit <?php echo $name." ".$surname;?>">
			                  		<a href="./?employee=<?php echo $id;?>" style="color: white;">-></a>
			                  	</span> : 
								<span class="badge bg-danger text-white text-bold text-center asap_remove_employee<?php echo $id;?>" onclick="deleteEmployee('<?php echo $id;?>')">
			                  	  <i class="bi bi-trash"></i> 
			                  	</span>
			                  	:
			                <span class="badge bg-primary text-white text-bold text-center details" id="<?php echo $id;?>">
		                  	  <i class="fa fa-edit"></i>
		                  	</span>
			                  </td>
			                </tr>

			                <!-- <tr style="border: none;">
		              		  <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
			                </tr> -->
		              		<?php
		              		$count++;
		              	}
		              	?>
		              </tbody>
		              <tfoot class="bg-purple text-white">
		                <tr>
		                  <th>#</th>
		                  <th>EmployeeID</th>
		                  <th>dob</th>
		                  <th>Name</th>
		                  <th>Surname</th>
		                  <th>Phone</th>
		                  <th>Email</th>
		                  <th>country</th>
		                  
		                 <th>Skill</th>
		                  
		                  <th>ViewMore</th>
		                </tr>
		              </tfoot>
		            </table>
		  
		          </div>
		        </div>
		    </div>
		<!-- </div>
	</div> -->
			<?php
		}
		?>
		<!-- </center> -->
		<?php
	}
	protected function noEmployeesBody(){
		?>
		<center>
			<div class="rode-body">
				<img src="../model/img/icon.jpg">
			</div>
			<div class="warning-tag text-center" style="color: lightgrey;">
				<h2 class="text-bold">There is nothing here</h2><br>
				<h5 >Create new employee by clicking the <br><span class="text-white text-bold">New Employee</span> Button to get started.</h5>
			</div>
		</center>
			
		<?php
	}
	protected function readFooter(){
		require_once("../model/footer.php");
	}
	protected function LeftIndicator($bool){
		?>
		<div class="no-employee-title">
			<div class="text-bend-h2 text-bold"><h2>Employee</h2></div>
			<div class="text-bend-small"><?php echo $this->IsnoEmployees(); ?> employees</div>
		</div>

		<?php
		if($bool){
			?>
			<form action="./" method="post" enctype="multipart/form-data" >
			<div class="serch-div-nav text-white d-flex">
			  
				<div class="input-search-map">
					<input type="search" name="serch-val" placeholder="Find Employee..." required>
				</div>
				<div class="select-search-map">
					<select name="filter" required>
						<option value="">-- Filter Search --</option>
						<option value="fnameSearch">First Name</option>
						<option value="lNameSearch">Last Name</option>
						<option value="emailSearch">Email</option>
					</select>
				</div>
				<div class="searchBtn">
					<button class="btn" name="serch-btn-acr">
						<i class="fa fa-search"></i>
					</button>
				</div>
			  
				
			</div>
			</form>
			<?php
		}
	}
	public function editTextBeforeSubmitting($mess){
		$mess = str_replace('<', "?", $mess);
		$mess = str_replace('>', "?", $mess);
		$mess = str_replace("\\r\\n", "<br>", $mess);
		$mess = str_replace("\\n\\r", "<br>", $mess);
		$mess = str_replace("\\r", "<br>", $mess);
		$mess = str_replace("\\n", "<br>", $mess);
		$mess = str_replace("\r\n", "<br>", $mess);
		$mess = str_replace("\n\r", "<br>", $mess);
		$mess = str_replace("\r", "<br>", $mess);
		$mess = str_replace("\n", "<br>", $mess);
		$mess = str_replace("\\", " ", $mess);
		$mess = str_replace("'", "`", $mess);
		$mess = str_replace('"', "``", $mess);

		return $mess;
	}
	protected function RightIndicator(){
		?>
		<div class="add-employee-btn d-flex text-center " title="click to add new employee" data-toggle="modal" data-target="#createPortfolio">
			<div class="icon-tag text-purple text-bold text-center"><i class="fa fa-plus"></i></div>
			<div class="text-tag text-white text-bold text-center">New Employee</div>
		</div>
		<?php
	}
	protected function noEmployeesHeader(){
		?>
		<div class="no-employee-window d-flex text-white">
			<?php
			$this->LeftIndicator(false);
			$this->RightIndicator();
			?>
		</div>
		<?php
		
	}
	protected function EmployeesHeader(){
		?>
		<div class="no-employee-window d-flex text-white">
			<?php
			$this->LeftIndicator(true);

			$this->RightIndicator();
			?>
		</div>
		<?php
	}
	protected function IsnoEmployees(){
		$conn=$this->connection();

		$_=$conn->query("select*from employees");
		$numRows=$_->num_rows;
		if($numRows==0){
			return "No";
		}
		return $numRows;
	}
	public function connection(){
		$user="root";
		$pass="";
		$dbnam="sasoft";
		$conn=mysqli_connect("localhost",$user,$pass,$dbnam)or die("Connection was not established!!");
		return $conn;
	}
}
?>