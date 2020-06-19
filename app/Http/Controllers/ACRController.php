<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ACRController extends Controller {

    public function login(Request $request) {
 // return $request ;

        $db = DB::table('users')
                ->where('username', '=', $request->email)
                ->where('password', '=', $request->password)
                ->get();

        $detailss = DB::table('users')
                ->where('username', '=', $request->email)
                ->where('password', '=', $request->password)
                ->first();

       // return $db ;



        if ($detailss->role == "NOK") {

            $nok = DB::select("SELECT nok.nok_id,
       nok.nok_patient_id,
       nok.nok_phone,
       nok.nok_address,
       nok.nok_name,
       nok.nok_surname,
       persons.name,
       persons.surname,
       users.username,
       users.password
  FROM ((acr.patients patients
         INNER JOIN acr.persons persons
            ON (patients.pat_person_id = persons.id))
        INNER JOIN acr.nok nok
           ON (nok.nok_patient_id = patients.pat_person_id))
       INNER JOIN acr.users users ON (users.person_id = nok.nok_id)
 WHERE (users.username = '$request->email') AND (users.password = '$request->password')");

//            return $nok[0]->nok_patient_id;


            return self::nokpatientdetails($nok[0]->nok_patient_id);
        }




        if (sizeof($db) == 1) {

            $details = DB::table('users')
                    ->join('persons', 'persons.id', '=', 'users.person_id')
                    ->where('username', '=', $request->email)
                    ->where('password', '=', $request->password)
                    ->first();


            session([
                'firstname' => ($details->name),
                'surname' => ($details->surname),
                'userid' => ($details->users_id),
                'role' => ($details->role),
                'personid' => strtoupper($details->id)
            ]);

            $data = array(
                'serverresponse' => 'success',
                'firstname' => ($details->name),
                'surname' => ($details->surname),
                'userid' => ($details->users_id),
                'role' => ($details->role),
                'personid' => strtoupper($details->id)
            );


// return $data ;
            return self::home();
        } else {

            return view('login');
        }
    }

    public function home() {

        $accepted = DB::select("SELECT isssues.*,
       isssues.iss_id,
       isssues.iss_from,
       isssues.iss_subject,
       isssues.iss_desc,
       isssues.iss_status,
       isssues.iss_date,
       isssues.iss_assignedto,
       isssues.iss_progress,
       isssues.iss_from_personid
  FROM acr.isssues isssues
 WHERE (isssues.iss_status = 'Accepted')");

        $rejected = DB::select("SELECT isssues.*,
       isssues.iss_id,
       isssues.iss_from,
       isssues.iss_subject,
       isssues.iss_desc,
       isssues.iss_status,
       isssues.iss_date,
       isssues.iss_assignedto,
       isssues.iss_progress,
       isssues.iss_from_personid
  FROM acr.isssues isssues
 WHERE (isssues.iss_status = 'Rejected')");

        $Pending = DB::select("SELECT isssues.*,
       isssues.iss_id,
       isssues.iss_from,
       isssues.iss_subject,
       isssues.iss_desc,
       isssues.iss_status,
       isssues.iss_date,
       isssues.iss_assignedto,
       isssues.iss_progress,
       isssues.iss_from_personid
  FROM acr.isssues isssues
 WHERE (isssues.iss_status = 'Pending')");


        $issues = DB::select("SELECT isssues.*,
       isssues.iss_id,
       isssues.iss_from,
       isssues.iss_subject,
       isssues.iss_desc,
       isssues.iss_status,
       isssues.iss_date,
       isssues.iss_assignedto,
       isssues.iss_progress,
       isssues.iss_from_personid
  FROM acr.isssues isssues");


$donations = DB::select("SELECT donations.don_title,
COUNT(donations.don_id) AS count,
donations.don_desc
FROM acr.donations donations
GROUP BY donations.don_title");

$totaldonations = DB::select("SELECT * FROM acr.donations donations");

$reportpatientstatus =DB::select("SELECT COUNT(patients.pat_id) AS count, patients.pat_status
FROM acr.patients patients
GROUP BY patients.pat_status");

$reportpatientdischarged =DB::select("SELECT * FROM acr.patients patients where pat_status ='Discharged'");


$reportpatientactive =DB::select("SELECT * FROM acr.patients patients where pat_status ='Active'");




        $data = array(
            "issues" => sizeof($issues),
            "rejected" => sizeof($rejected),
            "accepted" => sizeof($accepted),
            "totaldonations"=>sizeof($totaldonations),
            "reportpatientactive"=>sizeof($reportpatientactive),
            "reportpatientdischarged"=>sizeof($reportpatientdischarged),
            "Pending" => sizeof($Pending)
        );

        return view('home', $data);
    }

    public function myrequest() {

        $issue = DB::table('isssues')
                ->join('persons', 'persons.id', '=', 'isssues.iss_from_personid')
                ->where('iss_from_personid', "=", session('personid'))
                ->get();

        $data = array(
            "issues" => $issue
        );

//        return $data;

        return view('inbox', $data);
    }

    public function agents() {

        $users = DB::table('users')
                ->join('persons', 'persons.id', '=', 'users.person_id')
                ->get();


        $data = array(
            "users" => $users
        );

//         return $data;
        return view('agents', $data);
    }

    public function docpatients() {

        $users = DB::table('patients')
                ->join('persons', 'persons.id', '=', 'patients.pat_person_id')
                ->get();


        $data = array(
            "issues" => $users
        );

        return view('docpatients', $data);
        return response()->json($data);
    }

    public function patients() {

        $users = DB::table('patients')
                ->join('persons', 'persons.id', '=', 'patients.pat_person_id')
                ->get();


        $data = array(
            "issues" => $users
        );

        return view('adminissues', $data);
        return response()->json($data);
    }

    public function compose(Request $request) {


        date_default_timezone_set('Africa/Harare');
        DB::table('isssues')->insert([
            "iss_from" => session('firstname') . " " . session('surname'),
            "iss_subject" => $request->issuesubject,
            "iss_desc" => $request->iss_desc,
            "iss_status" => "Pending",
            "iss_assignedto" => 0,
            'iss_date' => date("Y-m-d G.i:s", time()),
            'iss_from_personid' => session('personid'),
            "iss_progress" => 0
        ]);

        return self::myrequest();
    }

    public function getissue($id) {


        $issue = DB::table('isssues')
                ->join('persons', 'persons.id', '=', 'isssues.iss_from_personid')
                ->where('iss_id', "=", $id)
                ->first();

        $users = DB::table('users')
                ->join('persons', 'persons.id', '=', 'users.person_id')
                ->get();

        $assignedto = DB::table('persons')
                ->where('id', '=', $issue->iss_assignedto)
                ->first();

        $data = array(
            "users" => $users,
            "subject" => $issue->iss_subject,
            "iss_id" => $issue->iss_id,
            "iss_desc" => $issue->iss_desc,
            "iss_date" => $issue->iss_date,
            "iss_progress" => $issue->iss_progress,
            "iss_status" => $issue->iss_status,
            "assignedto" => $assignedto->name . " " . $assignedto->surname,
            "iss_from" => $issue->iss_from
        );

//        retur n  $data;
        return view('myissue', $data);
    }

    public function allrequests() {

        $issue = DB::table('isssues')
                ->join('persons', 'persons.id', '=', 'isssues.iss_assignedto')
                ->get();

        $data = array(
            "issues" => $issue
        );
//        return $data ;
        return view('adminissues', $data);
    }

    public function adminissue($id) {

        $issue = DB::table('isssues')
                ->join('persons', 'persons.id', '=', 'isssues.iss_assignedto')
                ->where('iss_id', "=", $id)
                ->first();


        $agents = DB::table('users')
                ->join('persons', 'persons.id', '=', 'users.person_id')
                ->where('role', "=", "Agent")
                ->get();

        $data = array(
            "iss_id" => $issue->iss_id,
            "subject" => $issue->iss_subject,
            "iss_desc" => $issue->iss_desc,
            "iss_date" => $issue->iss_date,
            "iss_progress" => $issue->iss_progress,
            "iss_status" => $issue->iss_status,
            "assignedto" => $issue->name . " " . $issue->surname,
            "iss_from" => $issue->iss_from,
            "agents" => $agents
        );
//        return $data;
        return view('myissue_admin', $data);
    }

    public function assignto($id, $issueid) {
//

        date_default_timezone_set('Africa/Harare');
        $issuedetail = DB::table('isssues')
                ->where('iss_id', "=", $issueid)
                ->first();

        DB::table('issue_history')
                ->insert([
                    'ih_assignedto' => $id,
                    'ih_issueid' => $issueid,
                    'ih_status' => $issuedetail->iss_status,
                    'ih_date' => date("Y-m-d", time())
        ]);

        DB::table('isssues')
                ->where('iss_id', "=", $issueid)
                ->update([
                    'iss_assignedto' => $id
        ]);

//        return self::adminissue($issueid);
        return self::getissue($issueid);
    }

    public function close($issueid) {

        DB::table('isssues')
                ->where('iss_id', "=", $issueid)
                ->update([
                    'iss_status' => "Rejected"
        ]);

//        return self::adminissue($issueid);
        return self::getissue($issueid);
    }

    public function pending($issueid) {

        DB::table('isssues')
                ->where('iss_id', "=", $issueid)
                ->update([
                    'iss_status' => "Accepted"
        ]);

//        return self::adminissue($issueid);
        return self::getissue($issueid);
    }

    public function adduser(Request $request) {

      // return  $request ;

        date_default_timezone_set('Africa/Harare');
        $id = DB::table('persons')->insertGetId([
            "name" => $request->name,
            "surname" => $request->surname
        ]);

        DB::table('users')->insert([
            "person_id" => $id,
            "role" => $request->role,
            "username" => $request->username,
            "password" => $request->password
        ]);
        return self::agents();
    }

    public function timeDetails($timeline) {



        $timeline = DB::select("SELECT persons.id,
       persons.name,
       persons.surname,
       issue_history.ih_id,
       issue_history.ih_assignedto,
       issue_history.ih_date,
       issue_history.ih_issueid,
       issue_history.ih_status,
       isssues.iss_id,
       isssues.iss_from,
       isssues.iss_subject,
       isssues.iss_desc,
       isssues.iss_status,
       isssues.iss_date,
       isssues.iss_assignedto,
       isssues.iss_progress,
       isssues.iss_from_personid
  FROM (acr.issue_history issue_history
        INNER JOIN acr.isssues isssues
           ON (issue_history.ih_issueid = isssues.iss_id))
       INNER JOIN acr.persons persons
          ON (persons.id = issue_history.ih_assignedto)
          where  isssues.iss_id = '$timeline'
ORDER BY issue_history.ih_id DESC, issue_history.ih_date DESC");

        $data = array(
            "timeline" => $timeline
        );
//        return $data;
        return view('timelinedetails', $data);
    }

    public function timeline() {


        $issue = DB::table('isssues')
                ->join('persons', 'persons.id', '=', 'isssues.iss_from_personid')
//                ->where('iss_from_personid', "=", session('personid'))
                ->get();

        $data = array(
            "issues" => $issue
        );

//        return $data;

        return view('issuehistory', $data);
    }

    public function assignedrequest() {

        $issue = DB::table('isssues')
                ->join('persons', 'persons.id', '=', 'isssues.iss_assignedto')
                ->where('iss_assignedto', "=", session('personid'))
                ->get();

        $data = array(
            "issues" => $issue
        );
//        return $data ;
        return view('assignedissues', $data);
    }

    public function statusreport() {

        $pat_ward = DB::select("SELECT COUNT(patients.pat_id) as count,
       patients.pat_person_id,
       patients.pat_status,
       patients.pat_date,
       patients.referredby,
       patients.pat_dob,
       patients.pat_ward
  FROM acr.patients patients
GROUP BY patients.pat_ward");

        $totalpatward = 0;
        foreach ($pat_ward as $data) {

            $totalpatward = $totalpatward + $data->count;
        }

        $pat_status = DB::select("SELECT COUNT(patients.pat_id) as count,
       patients.pat_person_id,
       patients.pat_status,
       patients.pat_date,
       patients.referredby,
       patients.pat_dob,
       patients.pat_ward
  FROM acr.patients patients
GROUP BY patients.pat_status  
ORDER BY `patients`.`pat_status` ASC");

        $totalpatstatus = 0;
        foreach ($pat_ward as $data) {

            $totalpatstatus = $totalpatstatus + $data->count;
        }

        $referredby = DB::select("SELECT COUNT(patients.pat_id) as count,
       patients.pat_person_id,
       patients.pat_status,
       patients.pat_date,
       patients.referredby,
       patients.pat_dob,
       patients.pat_ward
  FROM acr.patients patients
GROUP BY patients.referredby  
ORDER BY `patients`.`referredby` ASC");
        
        
        
       $diag = DB::select("SELECT COUNT(patients.pat_id) as count,
       patients.pat_person_id,
       patients.pat_status,
       patients.pat_date,
       patients.referredby,
        patients.pat_diagnosis ,
       patients.pat_dob,
       patients.pat_ward
  FROM acr.patients patients
GROUP BY patients.pat_diagnosis  
ORDER BY `patients`.`pat_diagnosis` ASC");


        $issues = DB::select("SELECT isssues.*,
       isssues.iss_id,
       isssues.iss_from,
       isssues.iss_subject,
       isssues.iss_desc,
       isssues.iss_status,
       isssues.iss_date,
       isssues.iss_assignedto,
       isssues.iss_progress,
       isssues.iss_from_personid
  FROM acr.isssues isssues");

  $donations = DB::select("SELECT donations.don_title,
  COUNT(donations.don_id) AS count,
  donations.don_desc
FROM acr.donations donations
GROUP BY donations.don_title");

$totaldonations = DB::select("SELECT * FROM acr.donations donations");

$reportpatientstatus =DB::select("SELECT COUNT(patients.pat_id) AS count, patients.pat_status
FROM acr.patients patients
GROUP BY patients.pat_status");

        $data = array(
            "referredby" => $referredby,
            "pat_status" => $pat_status,
            "pat_ward" => $pat_ward,
            "pat_diagnosis" => $diag,
            "donations" => $donations,
            "totaldonations" => sizeof($totaldonations),
            "reportpatientstatus"=>$reportpatientstatus,
            "totalpatward" => $totalpatward
        );
        //statusreport
    //    return $data ;
        
        return view('statusreport', $data);
    }
    
     public function statusreport2() {

        $pat_ward = DB::select("SELECT COUNT(patients.pat_id) as count,
       patients.pat_person_id,
       patients.pat_status,
       patients.pat_date,
       patients.referredby,
       patients.pat_dob,
       patients.pat_ward
  FROM acr.patients patients
GROUP BY patients.pat_ward");

        $totalpatward = 0;
        foreach ($pat_ward as $data) {

            $totalpatward = $totalpatward + $data->count;
        }

        $pat_status = DB::select("SELECT COUNT(patients.pat_id) as count,
       patients.pat_person_id,
       patients.pat_status,
       patients.pat_date,
       patients.referredby,
       patients.pat_dob,
       patients.pat_ward
  FROM acr.patients patients
GROUP BY patients.pat_status  
ORDER BY `patients`.`pat_status` ASC");

        $totalpatstatus = 0;
        foreach ($pat_ward as $data) {

            $totalpatstatus = $totalpatstatus + $data->count;
        }

        $referredby = DB::select("SELECT COUNT(patients.pat_id) as count,
       patients.pat_person_id,
       patients.pat_status,
       patients.pat_date,
       patients.referredby,
       patients.pat_dob,
       patients.pat_ward
  FROM acr.patients patients
GROUP BY patients.referredby  
ORDER BY `patients`.`referredby` ASC");
        
        
        
       $diag = DB::select("SELECT COUNT(patients.pat_id) as count,
       patients.pat_person_id,
       patients.pat_status,
       patients.pat_date,
       patients.referredby,
        patients.pat_diagnosis ,
       patients.pat_dob,
       patients.pat_ward
  FROM acr.patients patients
GROUP BY patients.pat_diagnosis  
ORDER BY `patients`.`pat_diagnosis` ASC");


        $issues = DB::select("SELECT isssues.*,
       isssues.iss_id,
       isssues.iss_from,
       isssues.iss_subject,
       isssues.iss_desc,
       isssues.iss_status,
       isssues.iss_date,
       isssues.iss_assignedto,
       isssues.iss_progress,
       isssues.iss_from_personid
  FROM acr.isssues isssues");


        $data = array(
            "referredby" => $referredby,
            "pat_status" => $pat_status,
            "pat_ward" => $pat_ward,
            "pat_diagnosis" => $diag,
            "totalpatward" => $totalpatward
        );
        //statusreport
        return $data ;
        
//        return view('statusreport', $data);
    }

    public function approvedreport() {

        $issues = DB::select("SELECT DISTINCT isssues.iss_id,
                isssues.iss_from,
                isssues.iss_subject,
                isssues.iss_desc,
                isssues.iss_status,
                isssues.iss_date,
                isssues.iss_progress,
                isssues.iss_from_personid,
                isssues.iss_assignedto,
                users.users_id,
                users.person_id,
                users.username,
                users.password,
                users.role,
                persons.name,
                persons.surname
  FROM (acr.users users
        INNER JOIN acr.persons persons ON (users.person_id = persons.id))
       INNER JOIN acr.isssues isssues
          ON (isssues.iss_assignedto = users.person_id)
 WHERE (isssues.iss_status = 'Accepted' AND users.role = 'Head IT')");

        $data = array(
            "issues" => $issues
        );
//        return $data ;
        return view('approvesreports', $data);
    }

    public function savepatientdetails(Request $request) {

        try {

            DB::beginTransaction();

            date_default_timezone_set('Africa/Harare');
            $patientpersonid = DB::table('persons')->insertGetId([
                "name" => $request->pname,
                "surname" => $request->psurname
            ]);

            $patientid = DB::table('patients')->insertGetId([
                "pat_person_id" => $patientpersonid,
                "referredby" => $request->preferral,
                "pat_date" => date("Y-m-d", time()),
                "pat_dob" => $request->pdob,
                "pat_ward" => $request->pward,
                "pat_diagnosis" => $request->pdiag,
            ]);

            $nokid = DB::table('nok')->insertGetId([
                "nok_patient_id" => $patientpersonid,
                "nok_phone" => $request->nokphone,
                "nok_address" => $request->paddress,
                "nok_name" => $request->nokname,
                "nok_surname" => $request->noksurname
            ]);

            $nokuser = DB::table('users')->insertGetId([
                "person_id" => $nokid,
                "role" => 'NOK',
                "username" => $request->nokusername,
                "password" => $request->nokpassword,
            ]);


            DB::table('nok_patient')->insertGetId([
                "np_nok" => $nokid,
                "np_pat" => $patientid,
            ]);


            DB::table('patient_assessment')->insertGetId([
                "pa_temp" => 0,
                "pat_weight" => 0,
                "pat_presc" => 'Unknown',
                "pat_notes" => 'Unknown',
                "pa_person_id" => $patientpersonid,
                "pa_doctor" => 'Unknown',
                "pat_date" => date("Y-m-d", time())
            ]);




            $data = array(
                'serverresponse' => 'success',
                'heeey' => 'test data',
                'heeey' => $request->pname
            );
            DB::commit();

            return self::patients();
            return response()->json($data);
        } catch (Exception $exc) {
            DB::rollBack();
        }
    }

    public function saveuserdetails(Request $request) {

        try {


            DB::beginTransaction();

            date_default_timezone_set('Africa/Harare');
            $patientpersonid = DB::table('persons')->insertGetId([
                "name" => $request->uname,
                "surname" => $request->usurname
            ]);


            $nokuser = DB::table('users')->insertGetId([
                "person_id" => $patientpersonid,
                "role" => $request->uselected,
                "username" => $request->uusername,
                "password" => $request->upassword,
            ]);


            $data = array(
                'serverresponse' => 'success'
            );
            DB::commit();
            return response()->json($data);
        } catch (Exception $exc) {
            DB::rollBack();
        }
    }

    public function donationsman() {

        $donations = DB::table('donations')
                ->get();

        $data = array(
            'donations' => $donations
        );



        return view('donationsman', $data);
    }

    public function donations() {

        $donations = DB::table('donations')
                ->get();

        $data = array(
            'donations' => $donations
        );

        return view('donations', $data);
    }

    public function savedonations(Request $request) {

        $patientpersonid = DB::table('donations')->insertGetId([
            "don_title" => $request->donationtitle,
            "don_desc" => $request->donationdesc
        ]);

        $data = array(
            'serverresponse' => 'success'
        );
        return $data;
    }

    public function nokpatientdetails($id) {


        $details = DB::select("SELECT persons.id,
       persons.name,
       persons.surname,
       patients.pat_id,
       patients.pat_person_id,
       patients.pat_status,
       patients.pat_date,
       patients.referredby,
       patients.pat_dob,
       patients.pat_ward,
       nok.nok_id,
       nok.nok_patient_id,
       nok.nok_phone,
       nok.nok_address,
       nok.nok_name,
       nok.nok_surname,
       patient_assessment.pa_id,
       patient_assessment.pa_person_id,
       patient_assessment.pa_temp,
       patient_assessment.pat_weight,
       patient_assessment.pat_presc,
       patient_assessment.pat_notes,
       patient_assessment.pa_doctor,
       patient_assessment.pat_date
  FROM ((acr.persons persons
         INNER JOIN acr.patient_assessment patient_assessment
            ON (persons.id = patient_assessment.pa_person_id))
        INNER JOIN acr.patients patients
           ON (persons.id = patients.pat_person_id))
       INNER JOIN acr.nok nok
          ON (patients.pat_person_id = nok.nok_patient_id)
 WHERE (persons.id ='$id' )");


        $data = array(
            'pat' => $details[0]
        );


        return view('nokpatientdetails', $data);
    }

    public function patientdetails($id) {


        $details = DB::select("SELECT persons.id,
       persons.name,
       persons.surname,
       patients.pat_id,
       patients.pat_person_id,
       patients.pat_status,
       patients.pat_date,
       patients.referredby,
       patients.pat_dob,
       patients.pat_ward,
       nok.nok_id,
       nok.nok_patient_id,
       nok.nok_phone,
       nok.nok_address,
       nok.nok_name,
       nok.nok_surname,
       patient_assessment.pa_id,
       patient_assessment.pa_person_id,
       patient_assessment.pa_temp,
       patient_assessment.pat_weight,
       patient_assessment.pat_presc,
       patient_assessment.pat_notes,
       patient_assessment.pa_doctor,
       patient_assessment.pat_date
  FROM ((acr.persons persons
         INNER JOIN acr.patient_assessment patient_assessment
            ON (persons.id = patient_assessment.pa_person_id))
        INNER JOIN acr.patients patients
           ON (persons.id = patients.pat_person_id))
       INNER JOIN acr.nok nok
          ON (patients.pat_person_id = nok.nok_patient_id)
 WHERE (persons.id ='$id' )");


        $data = array(
            'pat' => $details[0]
        );


        return view('patientdetails', $data);
    }

    public function docpatientdetails($id) {


        $details = DB::select("SELECT persons.id,
       persons.name,
       persons.surname,
       patients.pat_id,
       patients.pat_person_id,
       patients.pat_status,
       patients.pat_date,
       patients.referredby,
       patients.pat_dob,
       patients.pat_ward,
       nok.nok_id,
       nok.nok_patient_id,
       nok.nok_phone,
       nok.nok_address,
       nok.nok_name,
       nok.nok_surname,
       patient_assessment.pa_id,
       patient_assessment.pa_person_id,
       patient_assessment.pa_temp,
       patient_assessment.pat_weight,
       patient_assessment.pat_presc,
       patient_assessment.pat_notes,
       patient_assessment.pa_doctor,
       patient_assessment.pat_date
  FROM ((acr.persons persons
         INNER JOIN acr.patient_assessment patient_assessment
            ON (persons.id = patient_assessment.pa_person_id))
        INNER JOIN acr.patients patients
           ON (persons.id = patients.pat_person_id))
       INNER JOIN acr.nok nok
          ON (patients.pat_person_id = nok.nok_patient_id)
 WHERE (persons.id ='$id' )");


        $data = array(
            'pat' => $details[0]
        );

// return $data;
        return view('docpatientdetails', $data);
    }

    public function createassessment(Request $request) {

        date_default_timezone_set('Africa/Harare');

        $s = DB::table('patient_assessment')
                ->get();


        if (sizeof($s) > 0) {
            $patientpersonid = DB::table('patient_assessment')
                    ->where("pa_person_id", '=', $request->_patientid)
                    ->update([
                "pa_temp" => $request->temp,
                "pat_weight" => $request->weight,
                "pat_presc" => $request->presc,
                "pat_notes" => $request->notes,
                "pa_doctor" => session('firstname') + " " + session('surname'),
                "pat_date" => date("Y-m-d", time())
            ]);
        } else {

            $patientpersonid = DB::table('patient_assessment')->insertGetId([
                "pa_temp" => $request->temp,
                "pat_weight" => $request->weight,
                "pat_presc" => $request->presc,
                "pat_notes" => $request->notes,
                "pa_person_id" => $request->_patientid,
                "pa_doctor" => session('firstname') . " " . session('surname'),
                "pat_date" => date("Y-m-d", time())
            ]);
        }


        return self::docpatientdetails($request->_patientid);
    }

    public function hiopatientdetails($id) {


        $details = DB::select("SELECT persons.id,
       persons.name,
       persons.surname,
       patients.pat_id,
       patients.pat_person_id,
       patients.pat_status,
       patients.pat_date,
       patients.referredby,
       patients.pat_dob,
       patients.pat_ward,
       nok.nok_id,
       nok.nok_patient_id,
       nok.nok_phone,
       nok.nok_address,
       nok.nok_name,
       nok.nok_surname,
       patient_assessment.pa_id,
       patient_assessment.pa_person_id,
       patient_assessment.pa_temp,
       patient_assessment.pat_weight,
       patient_assessment.pat_presc,
       patient_assessment.pat_notes,
       patient_assessment.pa_doctor,
       patient_assessment.pat_date
  FROM ((acr.persons persons
         INNER JOIN acr.patient_assessment patient_assessment
            ON (persons.id = patient_assessment.pa_person_id))
        INNER JOIN acr.patients patients
           ON (persons.id = patients.pat_person_id))
       INNER JOIN acr.nok nok
          ON (patients.pat_person_id = nok.nok_patient_id)
 WHERE (persons.id ='$id' )");


        $data = array(
            'pat' => $details[0]
        );


        return view('hiopatientdetails', $data);
    }

    public function hiopatients() {

        $users = DB::table('patients')
                ->join('persons', 'persons.id', '=', 'patients.pat_person_id')
                ->get();


        $data = array(
            "issues" => $users
        );

        return view('hiopatients', $data);
    }

    public function updatestatus(Request $request) {



        DB::table('patients')
                ->where("pat_person_id", '=', $request->_patientid)
                ->update([
                    "pat_status" => $request->patstatus
        ]);

        return self::hiopatientdetails($request->_patientid);
    }

    public function updateward(Request $request) {


//return $request ;
        DB::table('patients')
                ->where("pat_person_id", '=', $request->_patientid)
                ->update([
                    "pat_ward" => $request->puward
        ]);

        return self::patientdetails($request->_patientid);
    }

    public function nokpatients() {


        $details = DB::select("SELECT persons.id,
       persons.name,
       persons.surname,
       patients.pat_id,
       patients.pat_person_id,
       patients.pat_status,
       patients.pat_date,
       patients.referredby,
       patients.pat_dob,
       patients.pat_ward,
       nok.nok_id,
       nok.nok_patient_id,
       nok.nok_phone,
       nok.nok_address,
       nok.nok_name,
       nok.nok_surname,
       patient_assessment.pa_id,
       patient_assessment.pa_person_id,
       patient_assessment.pa_temp,
       patient_assessment.pat_weight,
       patient_assessment.pat_presc,
       patient_assessment.pat_notes,
       patient_assessment.pa_doctor,
       patient_assessment.pat_date
  FROM ((acr.persons persons
         INNER JOIN acr.patient_assessment patient_assessment
            ON (persons.id = patient_assessment.pa_person_id))
        INNER JOIN acr.patients patients
           ON (persons.id = patients.pat_person_id))
       INNER JOIN acr.nok nok
          ON (patients.pat_person_id = nok.nok_patient_id)
 WHERE (persons.id ='$id' )");


        $data = array(
            'pat' => $details[0]
        );

        return view('nokpatientdetails', $data);

//        .blade
    }

    public function pledges($id) {

        $pledges = DB::table('pledges')
                ->where('p_donation_id', '=', $id)
                ->get();

        $data = array(
            'pledges' => $pledges
        );

        return view('pledges', $data);
    }

    public function dpledges($id) {

        $pledges = DB::table('donations')
                ->where('don_id', '=', $id)
                ->get();

        $data = array(
            'dpledges' => $pledges,
            'id' => $id
        );

        return view('dpledges', $data);
    }

    public function createdonations(Request $request) {

        $patientpersonid = DB::table('donations')->insertGetId([
            "don_title" => $request->dontittle,
            "don_desc" => $request->dondesc
        ]);


        return self::donationsman();
    }

    public function createplage(Request $request) {
        date_default_timezone_set('Africa/Harare');


        $patientpersonid = DB::table('pledges')->insertGetId([
            "p_donation_id" => $request->_donationid,
            "p_email" => $request->donoremail,
            "p_phone" => $request->donorphone,
            "p_desc" => $request->donordesc,
            "p_date" => date("Y-m-d", time()),
            "p_fullname" => $request->donorname
        ]);

        return self::donations();
    }

    public function deletepledges($id) {

        DB::table('donations')
                ->where('don_id', '=', $id)
                ->delete();

        return self::donationsman();
    }
       public function deleteuser($userid) {
        DB::table('users')
                ->where('person_id', "=", $userid)
                ->delete();

        DB::table('persons')
                ->where('id', "=", $userid)
                ->delete();

        return self::agents();
    }
    
    
    public function deletepatient ($id){
        
          DB::table('persons')
                ->where('id', "=", $id)
                ->delete();

        return self:: patients();
    }


        public function edituser(Request $request) {


// return $request;
        DB::table('users')
                ->where('person_id', "=", $request->person_id)
                ->update([
                    'role' => $request->erole,
                    'username' => $request->eusername,
                    'password' => $request->epassword,
        ]);

        DB::table('persons')
                ->where('id', "=", $request->person_id)
                ->update([
                    'name' => $request->ename,
                    'surname' => $request->esurname
        ]);
        return self::agents();
    }

}
