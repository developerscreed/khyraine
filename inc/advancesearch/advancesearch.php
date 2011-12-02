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
			$tbl = $this->jsql($sql);
			return ($this->jrows() > 0) ? $this->jfetch_many($tbl) : false;
		}
		
		function advancesearch_results($gender,$status,$country){
			$takeresults = $this->users_advancesearh($gender,$status,$country);
			if($takeresults>0){				
				if($takeresults){
					foreach($searchresult as $values){
						extract($values);
							echo $reg_first;
					}
				}else{
					echo "Zero results";
				}					
			}
		}

	}
	