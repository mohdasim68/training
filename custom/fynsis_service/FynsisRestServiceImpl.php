<?php


require_once('service/v4_1/SugarWebServiceImplv4_1.php');



class FynsisRestServiceImpl extends SugarWebServiceImplv4_1
{

    /**
     * 
     * @param session id
     * @param key   
     * @return entry_list   values found in an array
     */

     function get_leads_contact_subpanels($session,$input=array())
    {

        global $current_user;
        require_once('modules/LiveHelperChat/license/OutfittersLicense.php');
        $validate_license = OutfittersLicense::isValid('LiveHelperChat',$current_user->id);
        if($validate_license !== true) {
            echo '< h2>< p class="error">LiveHelperChat is no longer active</p></h2>< p class="error">'.$validate_license.'</p>';

    //functionality may be altered here in response to the key failing to validate
            return ("License Expired.");
            exit();
        }

        global  $db;
         $GLOBALS['log']->info('Begin: SugarWebServiceImpl->get_relationships');
        self::$helperObject = new SugarWebServiceUtilv4_1();
        global  $beanList, $beanFiles;
        $error = new SoapError();

        if (!self::$helperObject->checkSessionAndModuleAccess($session, 'invalid_session', $module_name, 'read', 'no_access', $error)) {
            $GLOBALS['log']->info('End: SugarWebServiceImpl->get_relationships');
            return;
        } // if
        $name='';
        $phone='';
        $email='';
        if(isset($input['name']))
        {
            $name=$input['name'];
        }
        if(isset($input['phone']))
        {
            $phone=$input['phone'];
        }
        if(isset($input['email']))
        {
            $email=$input['email'];
        }
        $qry="SELECT * FROM  `leads` AS leads  LEFT JOIN email_addr_bean_rel AS emailrel on emailrel.bean_id=leads.id AND bean_module='Leads'";
        $qry=$qry." INNER JOIN email_addresses AS email ON email.id=emailrel.email_address_id ";
        $qry=$qry." WHERE ( (phone_mobile =  '".$phone."' and phone_mobile is not null) OR email.email_address like '%".$email."%') AND leads.deleted=0";
       
        $result=$db->query($qry);
        $leed_res=array();
        $ids=array();
        while($row=$db->fetchRow($result))
        {
            if($row['email_address']==$email)
            {
                $leed_res[]=$row;
                $ids[]=$row['id'];
            }
            //    $leed_res[]=$row;
            //    $ids[]=$row['id'];
        }
        $ids="'".implode("','", $ids)."'";
       
        // $leed_callsres=array();
        // $qry="SELECT * FROM calls as calls INNER JOIN calls_leads as leadrel ON calls.id=leadrel.call_id WHERE leadrel.lead_id in (".$ids.") ";
        // $result=$db->query($qry);
        // while($row=$db->fetchRow($result))
        // {
        //     $leed_callsres[]=$row;
        // }

        // $leed_meetingssres=array();
        // $qry="SELECT * FROM meetings as meetings INNER JOIN meetings_leads as meetingrel ON meetings.id=meetingrel.meeting_id WHERE meetingrel.lead_id in (".$ids.") ";
        // $result=$db->query($qry);
        // while($row=$db->fetchRow($result))
        // {
        //     $leed_meetingssres[]=$row;
        // }

        //contact details
        $qry="SELECT * FROM  `contacts` AS contacts  LEFT JOIN email_addr_bean_rel AS emailrel on emailrel.bean_id=contacts.id AND bean_module='Contacts'";
        $qry=$qry." INNER JOIN email_addresses AS email ON email.id=emailrel.email_address_id ";
        $qry=$qry." WHERE (contacts.first_name LIKE  '%".$name."%' OR contacts.last_name LIKE  '%". $name."%'OR contacts.phone_mobile LIKE  '%".$phone."%' OR email.email_address like '%".$email."%') AND contacts.deleted=0";
        $result=$db->query($qry);
        $contact_res=array();
        $contact_ids=array();
        while($row=$db->fetchRow($result))
        {
            if($row['email_address']==$email)
            {
                $contact_res[]=$row;
                $contact_ids[]=$row['id'];
            }
            // $contact_res[]=$row;
            // $contact_ids[]=$row['id'];
        }
        $contact_ids="'".implode("','", $contact_ids)."'";


        $qry="SELECT *,name as last_name FROM  `accounts` AS accounts  LEFT JOIN email_addr_bean_rel AS emailrel on emailrel.bean_id=accounts.id AND bean_module='Accounts'";
        $qry=$qry." INNER JOIN email_addresses AS email ON email.id=emailrel.email_address_id ";
        $qry=$qry." WHERE (accounts.name LIKE  '%".$name."%' OR accounts.phone_office LIKE  '%".$phone."%' OR email.email_address like '%".$email."%') AND accounts.deleted=0";
 
        $result=$db->query($qry);
        $accounts_res=array();
        $accounts_ids=array();
        while($row=$db->fetchRow($result))
        {
            if($row['email_address']==$email)
            {
                $accounts_res[]=$row;
                $accounts_ids[]=$row['id'];
            }   
            // $accounts_res[]=$row;
            // $accounts_ids[]=$row['id'];
        }
        $accounts_ids="'".implode("','", $accounts_ids)."'";

        // $contact_callsres=array();
        // $qry="SELECT * FROM calls as calls INNER JOIN calls_contacts as callrel ON calls.id=callrel.call_id WHERE callrel.contact_id in (".$contact_ids.") ";
        // $result=$db->query($qry);
        // while($row=$db->fetchRow($result))
        // {
        //     $contact_callsres[]=$row;
        // }

        // $contact_meetingssres=array();
        // $qry="SELECT * FROM meetings as meetings INNER JOIN meetings_contacts as meetingrel ON meetings.id=meetingrel.meeting_id WHERE meetingrel.contact_id in (".$contact_ids.") ";
        // $result=$db->query($qry);
        // while($row=$db->fetchRow($result))
        // {
        //     $contact_meetingssres[]=$row;
        // }
        // $contact_quoteres=array();
        // $qry="SELECT * FROM aos_quotes as aos_quotes WHERE aos_quotes.billing_contact_id in (".$contact_ids.") ";
        // $result=$db->query($qry);
        // while($row=$db->fetchRow($result))
        // {
        //     $contact_quoteres[]=$row;
        // }

        $output=array();
        $leads_count=sizeof($leed_res);
        $records=array();
        foreach($leed_res as $val)
        {
            $lead_id='';
            foreach($val as $key1=>$val1)
            {

                $record[$key1]=$val1;
                if($key1=="id")
                {
                    $lead_id=$val1;
                }
            }
            
            
          //  $meetings   =   $this->get_records_from_array_fynsis($leed_callsres,$lead_id,"lead_id");
          //  $calls      =   $this->get_records_from_array_fynsis($leed_meetingssres,$lead_id,"lead_id");
           // $record1=array('Meetings'=>array("count"=>sizeof($meetings),"records"=>$meetings),'Calls'=>array("count"=>sizeof($calls),"records"=>$calls));
         //   $record['subpanels']=$record1;
            $records[]=array($lead_id=>$record);
        }
        $output["Leads"]=array("record_count"=>$leads_count,"records"=> $records);

        $accounts_count=sizeof($accounts_res);
        $records=array();
        foreach($accounts_res as $val)
        {
            $lead_id='';
            foreach($val as $key1=>$val1)
            {

                $record[$key1]=$val1;
                if($key1=="id")
                {
                    $lead_id=$val1;
                }
            }
            
            
          //  $meetings   =   $this->get_records_from_array_fynsis($leed_callsres,$lead_id,"lead_id");
          //  $calls      =   $this->get_records_from_array_fynsis($leed_meetingssres,$lead_id,"lead_id");
           // $record1=array('Meetings'=>array("count"=>sizeof($meetings),"records"=>$meetings),'Calls'=>array("count"=>sizeof($calls),"records"=>$calls));
         //   $record['subpanels']=$record1;
            $records[]=array($lead_id=>$record);
        }
        $output["Accounts"]=array("record_count"=>$accounts_count,"records"=> $records);


        $contact_count=sizeof($contact_res);
        $records=array();
        foreach($contact_res as $val)
        {
            $contact_id='';
            foreach($val as $key1=>$val1)
            {

                $record[$key1]=$val1;
                if($key1=="id")
                {
                    $contact_id=$val1;
                }
            }
            
            
           // $meetings   =   $this->get_records_from_array_fynsis($contact_callsres,$contact_id,"contact_id");
          //  $calls      =   $this->get_records_from_array_fynsis($contact_meetingssres,$contact_id,"contact_id");
          //  $quotes     =   $this->get_records_from_array_fynsis($contact_quoteres,$contact_id,"billing_contact_id");
          //  $record1=array('Meetings'=>array("count"=>sizeof($meetings),"records"=>$meetings),'Calls'=>array("count"=>sizeof($calls),"records"=>$calls),'Quotes'=>array("count"=>sizeof($quotes),"records"=>$quotes));
           // $record['subpanels']=$record1;
            $records[]=array($contact_id=>$record);
        }
        $output["Contacts"]=array("record_count"=>$contact_count,"records"=> $records);
        return $output;

        return array("leads"=>$leed_res,'leads_meetings'=>$leed_meetingssres,'leads_calls'=>$leed_callsres,'contacts'=>$contact_res,'contact_call'=> $contact_callsres,'contact_meeting'=> $contact_meetingssres,'contact_quote'=>$contact_quoteres);

    }
    private function get_records_from_array_fynsis($array,$search_val='',$search_key='')
    {
        $res=array();
        foreach($array as $val)
        {
            if($val[$search_key]==$search_val)
            {
                $res[]=$val;
            }
        }
        return $res;
    }

}
