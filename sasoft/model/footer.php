<?php
require_once('../controller/pdo.php');
$pdo=new _pdo_();
?>
<div class="modal fade text-center" id="showInfoModalSkillId">
  <div class="modal-dialog">
    <div class="modal-content bg-dark text-white text-center">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Updating Skills</h4>
        <button type="button" class="close" data-dismiss="modal" onclick="modalRemoveSkill()">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body selected_user_display_skill_id">
        
      </div>
      
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="modalRemoveSkill()">Close</button>
      </div>
      
    </div>
  </div>
</div>
<div class="modal fade text-center" id="showInfoModal">
  <div class="modal-dialog">
    <div class="modal-content bg-dark text-white text-center">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Employee Info</h4>
        <button type="button" class="close" data-dismiss="modal" onclick="modalRemove()">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body selected_user_display">
        
      </div>
      
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="modalRemove()">Close</button>
      </div>
      
    </div>
  </div>
</div>
<div class="modal fade text-center" id="createPortfolio">
  <div class="modal-dialog">
    <div class="modal-content text-white text-center">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add New Employee</h4>

        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
      	<div class="phase1">
      		<h6 class="text-purple text-left">Basic info</h6>
      		<div class="group-input d-flex text-left text-white">
	        	<div class="input-fname">
	        		<div class="label text-left text-white">First Name</div>
	        		<div class="input-source">
	        			<input type="text" class="fname" placeholder="First Name">	
	        		</div>
	        		
	        	</div>
	        	<div class="input-lname">
	        		<div class="label text-left text-white">Last Name</div>
	        		<div class="input-source">
	        			<input type="text" class="lname" placeholder="Last Name">	
	        		</div>
	        		
	        	</div>
	        </div>
	        <div class="group-input d-flex text-left text-white">
	        	<div class="input-phone">
	        		<div class="label text-left text-white">Contact Number</div>
	        		<div class="input-source">
	        			<input type="number" class="phone" placeholder="Contact number">	
	        		</div>
	        		
	        	</div>
	        </div>
	        <div class="group-input d-flex text-left text-white">
	        	<div class="input-email">
	        		<div class="label-mail text-left text-white">Email Address</div>
	        		<div class="input-source">
	        			<input type="email" class="email" placeholder="Email Address">	
	        		</div>
	        	</div>
	        </div>
	        <div class="group-input d-flex text-left text-white">
	        	<div class="input-date">
	        		<div class="label text-left text-white">Date of Birth</div>
	        		<div class="input-source">
	        			<input type="date" class="dob" placeholder="Date Of Birth">	
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
		        			<select class="street">
		        				<option value="">-- Select Street --</option>
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
	        				<option value="">-- Select City --</option>
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
	        				<option value="">-- Postal Code --</option>
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
	        				<option value="">-- Select Country --</option>
	        				<?php $pdo->countryArray();?>
	        			</select>	
	        		</div>
	        	</div>
	        </div>
	     </div>  
	     <div class="phase3">
	     	<h6 class="text-purple text-left">Skills</h6>
	     	<div class="group-input d-flex text-left text-white">
	     		<div class="group-input d-flex text-left text-white">
		        	<div class="input-skill">
		        		<div class="label text-left text-white">Skill</div>
		        		<div class="input-skills">
		        			<input type="text" class="skill" placeholder="PHP v7">
		        		</div>
		        	</div>
		        	<div class="input-experience">
		        		<div class="label text-left text-white">yrs-exp</div>
		        		<div class="input-yrs-experience">
		        			<select class="yrs-experience">
		        				<option value="">-- Select Yrs Exp --</option>
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
		        			<select class="seniority">
		        				<option value="">-- Select Seniority --</option>
		        				<option value="Junior">Junior</option>
		        				<option value="Intermediate">Intermediate</option>
		        				<option value="Senior">Senior</option>
		        				<option value="Team Lead">Team Lead</option>
		        				
		        			</select>
		        		</div>
		        	</div>
		        </div>

	     	</div>
	     	<div class="wraper">
    			
		     </div>

	     	<div class="group-input d-flex text-left text-white">
	        	<div class="input-btn">
	        		<div class="input-source">
	        			<button class="btn text-center addSkill"><i class="fa fa-plus" style="padding: 3px 3px;"></i> Add New Skill</button>	
	        		</div>
	        	</div>
	        </div>
	     </div>

      </div>
      <div class="group-input d-flex text-left text-white">
    	<div class="input-btn">
    		<div class="input-left-source">
    				
    		</div>
    	</div>
    	<div class="input-btn">
    		<div class="input-right-source">
    			<button class="btn text-center AddNewEmployee text-white"><i class="fa fa-plus" style="padding: 5px 5px; color:purple;background: white;border-radius: 50px;"></i> Add New Employee</button>	
    		</div>
    	</div>
      </div>

      <!--  -->
<!-- <script>
$(document).ready(function() {
    
});
</script> -->

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
	$(document).ready(function(){
		var max= 5; 
    var x = 0;
    let array=[];
  //   var skill1="";
		// var experience1="";
		// var seniority1="";
		// var skill2="";
		// var experience2="";
		// var seniority2="";
		// var skill3="";
		// var experience3="";
		// var seniority3="";
		// var skill4="";
		// var experience4="";
		// var seniority4="";
		// var seniority4="";
		// var skill5="";
		// var experience5="";
		// var seniority5=""; 
    $(".addSkill").click(function(e){         
        e.preventDefault();
        if(x < max){
            x++;
            $(".wraper").append('<div class="group-input d-flex text-left text-white"><div class="group-input d-flex text-left text-white"><div class="input-skill"><div class="input-skills"><input type="text" class="skill'+x+'" placeholder="PHP v7"></div></div><div class="input-experience"><div class="input-yrs-experience"> <select class="yrs-experience'+x+'"> <option value="">-- Select Yrs Exp --</option> <option value="1">1</option> <option value="2">2</option> <option value="3">3</option> <option value="4">4</option> <option value="5+">5+</option> </select> </div> </div> <div class="input-seniority"><div class="input-seniority-"><select class="seniority'+x+'"> <option value="">-- Select Seniority --</option> <option value="Junior">Junior</option> <option value="Intermediate">Intermediate</option> <option value="Senior">Senior</option> <option value="Team Lead">Team Lead</option></select> </div> </div> <a class="delete"><i class="fas fa-trash-alt"></i></a> </div></div>');
            skill=$(".skill"+x).val();
						experience=$(".yrs-experience"+x).val();
						seniority=$(".seniority"+x).val();
						// console.log(skill);
						// console.log(experience);
						array.push([skill,experience,seniority]);
        }
    });
    $(".addSkillUpdate").click(function(e){         
        e.preventDefault();
        if(x < max){
            x++;
            $(".wraper").append('<div class="group-input d-flex text-left text-white"><div class="group-input d-flex text-left text-white"><div class="input-skill"><div class="input-skills"><input type="text" class="skill'+x+'" placeholder="PHP v7"></div></div><div class="input-experience"><div class="input-yrs-experience"> <select class="yrs-experience'+x+'"> <option value="">-- Select Yrs Exp --</option> <option value="1">1</option> <option value="2">2</option> <option value="3">3</option> <option value="4">4</option> <option value="5+">5+</option> </select> </div> </div> <div class="input-seniority"><div class="input-seniority-"><select class="seniority'+x+'"> <option value="">-- Select Seniority --</option> <option value="Junior">Junior</option> <option value="Intermediate">Intermediate</option> <option value="Senior">Senior</option> <option value="Team Lead">Team Lead</option></select> </div> </div> <a class="delete"><i class="fas fa-trash-alt"></i></a> </div></div>');
            skill=$(".skill"+x).val();
						experience=$(".yrs-experience"+x).val();
						seniority=$(".seniority"+x).val();
						// console.log(skill);
						// console.log(experience);
						array.push([skill,experience,seniority]);
        }
    });
   
    $(".wraper").on("click",".delete", function(e){
        e.preventDefault(); 
        $(this).parent('div').remove(); x--;
        array.pop();
    });
		$(".AddNewEmployee").click(function(){
			// array=JSON.stringify(array);
			let size=array.length;
			let phpUpload=[];
			for(let i=1;i<=size;i++){
				let skill=$(".skill"+i).val();
				let experience=$(".yrs-experience"+i).val();
				let seniority=$(".seniority"+i).val();
				// console.log(skill);
				// console.log(experience);
				// console.log(seniority);
				phpUpload.push([skill,experience,seniority]);
			}
			// console.log(phpUpload);
			// console.log(skill1+" "+experience1+" "+seniority1+" "+skill2+" "+experience2+" "+seniority2+" "+skill3+" "+experience3+" "+seniority3+" "+skill4+" "+experience4+" "+seniority4+" "+skill5+" "+experience5+" "+seniority5);
			const fname=$(".fname").val();
			const lname=$(".lname").val();
			const phone=$(".phone").val();
			const email=$(".email").val();
			const dob=$(".dob").val();
			const street=$(".street").val();
			const city=$(".city").val();
			const code=$(".code").val();
			const country=$(".country").val();
			const skill=$(".skill").val();
			const experience=$(".yrs-experience").val();
			const seniority=$(".seniority").val();
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
			$(".skill").removeAttr("style");
			$(".skill").removeAttr("placeholder");
			$(".yrs-experience").removeAttr("style");
			$(".yrs-experience").removeAttr("placeholder");
			$(".seniority").removeAttr("style");
			$(".seniority").removeAttr("placeholder");
			$(".label-mail").removeAttr("style");
			$(".label-mail").html("Email Address");
			if(fname==""){
				$(".fname").attr("style","border:2px solid red;color:red;");
				$(".fname").attr("placeholder","Input Empty!!..");
			}
			else if(lname==""){
				$(".lname").attr("style","border:2px solid red;color:red;");
				$(".lname").attr("placeholder","Input Empty!!..");
			}
			else if(phone==""){
				$(".phone").attr("style","border:2px solid red;color:red;");
				$(".phone").attr("placeholder","Input Empty!!..");
			}
			else if(email==""){
				$(".email").attr("style","border:2px solid red;color:red;");
				$(".email").attr("placeholder","Input Empty!!..");
				
			}
			else if(!emailL(email)){
				$(".email").attr("style","border:2px solid red;color:red;");
				$(".label-mail").attr("style","background:red;");
				$(".label-mail").html("Invalid Email!!..");
			}
			else if(dob==""){
				$(".dob").attr("style","border:2px solid red;color:red;");
				$(".dob").attr("placeholder","Input Empty!!..");
			}
			else if(street==""){
				$(".street").attr("style","border:2px solid red;color:red;");
				$(".street").attr("placeholder","Input Empty!!..");
			}
			else if(city==""){
				$(".city").attr("style","border:2px solid red;color:red;");
				$(".city").attr("placeholder","Input Empty!!..");
			}
			else if(code==""){
				$(".code").attr("style","border:2px solid red;color:red;");
				$(".code").attr("placeholder","Input Empty!!..");
			}
			else if(country==""){
				$(".country").attr("style","border:2px solid red;color:red;");
				$(".country").attr("placeholder","Input Empty!!..");
			}
			else if(skill==""){
				$(".skill").attr("style","border:2px solid red;color:red;");
				$(".skill").attr("placeholder","Input Empty!!..");
			}
			else if(experience==""){
				$(".yrs-experience").attr("style","border:2px solid red;color:red;");
				$(".yrs-experience").attr("placeholder","Input Empty!!..");
			}
			else if(seniority==""){
				$(".seniority").attr("style","border:2px solid red;color:red;");
				$(".seniority").attr("placeholder","Input Empty!!..");
			}
			else if(phpUpload.length<1){
			     $(".AddNewEmployee").attr("style","border:2px solid red;color:red;");
			     $(".AddNewEmployee").html("Please add one more skill!!");
			}
			else{
				const url="../controller/upload.php";
        $.ajax({
          url:url,
          type:"POST",
          data:{fname:fname,lname:lname,phone:phone,email:email,dob:dob,street:street,city:city,code:code,country:country,skill:skill,experience:experience,seniority:seniority,phpUpload:phpUpload},
          cache:false,
          beforeSend:function(){
            $(".btn-conform").html("<img src='../model/img/loader.gif' style='width:3%;'> Uploading Data....");
          },
          success:function(e){
            console.log(e);
            console.log(e.length);
            if(e.length>2){
              $(".AddNewEmployee").attr("style","border:3px solid red;background:#212121;color:red;");
              $(".AddNewEmployee").html(e);
            }
            else{
              $(".AddNewEmployee").attr("style","border:3px solid green;background:#212121;color:green;");
              $(".AddNewEmployee").html("Employee "+fname+" "+lname+" Added sucessfuly.");
              $(".fname").val("");
				      $(".lname").val("");
				      $(".phone").val("");
				      $(".email").val("");
				      $(".dob").val("");
				      $(".street").val("");
				      $(".city").val("");
				      $(".code").val("");
				      $(".country").val("");
				      $(".skill").val("");
				      $(".yrs-experience").val("");
				      $(".seniority").val("");
				      for(let i=1;i<=size;i++){
						$(".skill"+i).val("");
						$(".yrs-experience"+i).val("");
						$(".seniority"+i).val("");
					}
		    			window.location=("./");
            }
          }
        });
			}
		});
		$(document).on('click', '.details', function(){
			const idForModal=$(this).attr('id');
			// console.log(id);
			$.ajax({
        url:"../controller/upload.php",
        type:"POST",
        data:{idForModal:idForModal},
        cache:false,
        success:function(e){
          $(".selected_user_display").html(e);
          $("#showInfoModal").modal("show");
        }
      });
		});
		$(document).on('click', '.detailsSkills', function(){
			const SkillidForModal=$(this).attr('id');
			// console.log(id);
			$.ajax({
        url:"../controller/upload.php",
        type:"POST",
        data:{SkillidForModal:SkillidForModal},
        cache:false,
        success:function(e){
          $(".selected_user_display_skill_id").html(e);
          $("#showInfoModalSkillId").modal("show");
        }
      });
		});
	});

	function modalRemove(){
		$("#showInfoModal").modal("hide");
	}
	function modalRemoveSkill(){
		$("#showInfoModalSkillId").modal("hide");
	}
	function emailL(email){
		const validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
		return validRegex.test(email);
	}
	function deleteEmployee(deleteEmployeeId){
		console.log(deleteEmployeeId);
		$.ajax({
        url:"../controller/upload.php",
        type:"POST",
        data:{deleteEmployeeId:deleteEmployeeId},
        cache:false,
        beforeSend:function(){
          $(".asap_remove_employee"+deleteEmployeeId).html("<img src='../model/img/loader.gif' style='width:3%;'> Uploading Data....");
        },
        success:function(e){
          if(e.length>2){
            $(".asap_remove_employee"+deleteEmployeeId).attr("style","border:3px solid red;background:#212121;color:red;");
            $(".asap_remove_employee"+deleteEmployeeId).html(e);
          }
          else{
            $(".remove_id_employee"+deleteEmployeeId).attr("hidden","true");
          }
        }
      });
	}
	function deleteFuntion(skill_id_delete){
		  $.ajax({
        url:"../controller/upload.php",
        type:"POST",
        data:{skill_id_delete:skill_id_delete},
        cache:false,
        beforeSend:function(){
          $(".asap_remove"+skill_id_delete).html("<img src='../model/img/loader.gif' style='width:3%;'> Uploading Data....");
        },
        success:function(e){
          if(e.length>2){
            $(".asap_remove"+skill_id_delete).attr("style","border:3px solid red;background:#212121;color:red;");
            $(".asap_remove"+skill_id_delete).html(e);
          }
          else{
            $(".remove_id"+skill_id_delete).attr("hidden","true");
          }
        }
      });
	}
</script>
</body>
</html>
<?php
?>
