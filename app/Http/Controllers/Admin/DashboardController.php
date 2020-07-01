<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator;
use Route;
use Mail;
use Illuminate\Support\Facades\Hash;
use App\User;
use Session;
use Carbon\Carbon;


use Webklex\IMAP\Client;

class DashboardController extends Controller {

    public $record_per_page;

    /**
     * Function __construct
     *
     * function constructor
     * @param  NULL
     * @return NULL
     */
    public function __construct() {
       // $this->get_records();
        $this->middleware('check_admin_status');
    }

    /**
     * Function index
     *
     * function to load admin dashboard
     * @param  ARRAY
     * @return NULL
     */
    public function index(Request $request) {

        return view('admin.dashboard'); 

        
    }

    
     public function indexGmail(Request $request) {


            $hostname = '{pop.gmail.com:993/imap/ssl}INBOX';
           
            $username = 'realcakephp@gmail.com';
            $password = '8650213130';

            /* try to connect */
            $mbox = @imap_open($hostname,$username,$password);
            $error = imap_errors();
            if($error != false){
                if (count($error) > 1 || $error[0] != 'SECURITY PROBLEM: insecure server advertised AUTH=PLAIN') {
              dd(imap_errors());
            }

            }else{
                 dd("connected");

            }
           
            /* connect to gmail */
            // $hostname = '{pop.gmail.com:995/pop3/ssl}INBOX';
            // $username = 'realcakephp@gmail.com';
            // $password = '8650213130';

            // /* try to connect */
            // $mbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());


            // $mboxCheck = imap_check($mbox);

            // // get the total amount of messages
            // $totalMessages = $mboxCheck->Nmsgs;

            // // select how many messages you want to see
            // $showMessages = 1;

            // // get those messages    
            // $result = array_reverse(imap_fetch_overview($mbox,($totalMessages-$showMessages+1).":".$totalMessages));
            // dd($result);
            // echo $result[0]->from;

            



          
}


  
  
  
   public function indexYahoo(Request $request) {
           
            /* connect to gmail */
            $hostname = '{imap.mail.yahoo.com:993/imap/ssl}INBOX';
            $username = 'gaurav.null@yahoo.com';
            $password = 'jjsmiptlpnhkekiq';


             $mbox = @imap_open($hostname,$username,$password);
            $error = imap_errors();
            if($error != false){
                if (count($error) > 1 || $error[0] != 'SECURITY PROBLEM: insecure server advertised AUTH=PLAIN') {
              dd(imap_errors());
            }

            }else{
                 dd("connected");

            }

            /* try to connect */
            $mbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());

            $mboxCheck = imap_check($mbox);

            // get the total amount of messages
            $totalMessages = $mboxCheck->Nmsgs;

            // select how many messages you want to see
            $showMessages = 1;

            // get those messages    
            $result = array_reverse(imap_fetch_overview($mbox,($totalMessages-$showMessages+1).":".$totalMessages));
            //dd($result[0]->from);

            if (preg_match('/<(.*?)>/', $result[0]->from, $match) == 1) {
            echo $email = $match[1];
            }



}
    
    
public function indexHotmail(Request $request) {
           
               /* connect to gmail */
            $hostname = '{imap-mail.outlook.com:993/imap/ssl}INBOX';
            $username = 'gaurav.null@outlook.com';
            $password = 'foundYOU@@123';

            /* try to connect */
            $mbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());

            $mboxCheck = imap_check($mbox);

            // get the total amount of messages
            $totalMessages = $mboxCheck->Nmsgs;

            // select how many messages you want to see
            $showMessages = 1;

            // get those messages    
            $result = array_reverse(imap_fetch_overview($mbox,($totalMessages-$showMessages+1).":".$totalMessages));
            //dd($result[0]->from);

            if (preg_match('/<(.*?)>/', $result[0]->from, $match) == 1) {
               echo $email = $match[1];
            }



          
    }


}