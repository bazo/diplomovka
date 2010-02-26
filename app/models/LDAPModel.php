<?php
class LDAPModel
{
	private $user  = 'BAZO\Administrator';     // ldap rdn or dn
	private $pwd = 'Kavicka666';
	
	function ldap_flatresults($ad,$sr,$key=false) {
	  for ($entry=ldap_first_entry($ad,$sr);
	            $entry!=false;
	            $entry=ldap_next_entry($ad,$entry)) {
	    $user = array();
	    $attributes = ldap_get_attributes($ad,$entry);
	    for($i=$attributes['count'];$i-- >0;) {
	          $user[strtolower($attributes[$i])] = $attributes[$attributes[$i]][0];
	    }
	    if( $key && $user[$key] )
	      $users[strtolower($user[$key])] = $user;
	    else
	      $users[] = $user;
	  }
	  return $users;
	}
	
	public function connect()
	{
		$ds = ldap_connect("192.168.0.128");
		$ldapbind = ldap_bind($ds, $user, $pwd);
		    // verify binding
		    if ($ldapbind) {
		        echo "LDAP bind successful...";
				//$sr = ldap_search($ds, "cn=Users,dc=BAZO,dc=DOMA");
				$filter="(&(objectCategory=person)(sAMAccountName=$user))";
				$sdn = 'cn=Users,dc=BAZO,dc=doma';
				$sr=ldap_search($ds, $sdn, $filter);
				$info = ldap_get_entries($ds, $sr); 
				//var_dump($info);
				
				var_dump(ldap_flatresults($ds, $sr, false));
				
				ldap_unbind($ds);
		    } else {
		        echo "LDAP bind failed...";
		    }
	}
	

//ldap_close($ds);
}
?>