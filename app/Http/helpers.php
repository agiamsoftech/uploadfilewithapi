<?php 

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;


// -----------option id-----------
function getCompanyNameById($id)
{
  return 'IAMSoftech.in'; 
}
function getUserloginId($id)
{
  return Auth::user()->id;
  // return App\Models\User::where('id',$id)->select('email')->first()['email'];
}
function getUserId() {
  if (Auth::check()) {
      $userId = Auth::id();
      return $userId;
  }
}
function dateFormat($date) {
  global $dateFormat;
  if ($date == '' || $date == '0000-00-00 00:00:00' || strtotime($date) == 0 || $date == null) {
      return '';
  } else {
      if(! isset($dateFormat))
          $dateFormat = DB::table('company_basic_details')->select('date_format')->where('company_id', 1)->first(['date_format']);
      return date($dateFormat->date_format, strtotime($date));
  }
}
//Get Encoded URL Key
function getEncodedUrlKey($vendor_id, $session){
  return base64_encode($vendor_id.'<user>'.getUserId().'<user>'.$session);
}