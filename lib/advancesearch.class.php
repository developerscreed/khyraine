<?php
	class useradvancesearch extends olib{
		
		function __construct(){
			parent::olib();
		}
		
		function users_advancesearch($gender,$status="",$country=""){
			$support = '';
			if($status !==""){
				$support .=" && a.reg_interest='".$status."'"; 
			}
			if($country !==""){
				$support .=" && a.reg_country='".$country."'"; 
			}
			$sql = "SELECT a.reg_first,a.reg_last,a.reg_email from date_reg as a where a.reg_gender='".$gender."'{$support}";
			//$sql ="SELECT * from date_reg";
			$tbl = $this->jsql($sql);
			return ($this->jrows() > 0) ? $this->jfetch_many($tbl) : false;
		}
		
		function advancesearch_results($gender,$status="",$country=""){
			$takeresults = $this->users_advancesearch($gender);
			echo "<ul id='connect-searchresults'>";
				if($takeresults!==""){				
					
					foreach($takeresults as $values){
						extract($values);
							echo "<li><div class='people-search'>".$reg_first."</div></li>";
					}
				}else{
						echo "<li><span class='red'>Zero results</span></li>";					
				}
			echo "</ul>";
		}

		function saytome(){
			echo "hello";
		}
	}
	