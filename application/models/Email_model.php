<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

      class Email_model extends CI_Model {

          function __construct()
          {
              parent::__construct();
          }

          function account_opening_email($account_type = '' , $email = '', $password = '', $botAuthKey = '')
          {
              $system_name	=	$this->db->get_where('settings' , array('type' => 'system_name'))->row()->description;

              $email_msg		=	"Welcome to ".$system_name."<br />";
              $email_msg		.=	"Your account type : ".$account_type."<br />";
              $email_msg		.=	"Your login password : ". $password ."<br />";
              $email_msg		.=	"Login Here : ".base_url()."<br />";

              if($account_type == 'parent')
              {
                  $email_msg .= "<br /> <br /> Your facebook bot authentication key :". $botAuthKey . "<br />";
                  $email_msg .= "Facebook bot link : ". $this->config->item("boturl"). "<br />";
              }

              $email_sub		=	"Account opening email";
              $email_to		=	$email;

              $this->do_email($email_msg , $email_sub , $email_to);
          }

          function password_reset_email($new_password = '' , $account_type = '' , $email = '')
          {
              $query			=	$this->db->get_where($account_type , array('email' => $email));
              if($query->num_rows() > 0)
              {

                  $email_msg	=	"Your account type is : ".$account_type."<br />";
                  $email_msg	.=	"Your password is : ".$new_password."<br />";

                  $email_sub	=	"Password reset request";
                  $email_to	=	$email;
                  $this->do_email($email_msg , $email_sub , $email_to);
                  return true;
              }
              else
              {
                  return false;
              }
          }

          /***custom email sender****/
          function do_email($msg=NULL, $sub=NULL, $to=NULL, $from=NULL)
          {

              $config = array();
              $config['useragent']	= "CodeIgniter";
              $config['mailpath']		= "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
              $config['protocol']		= "smtp";
              $config['smtp_host']	= getenv('smtp_host') ? getenv('smtp_host') : "smtp.mailgun.org";
              $config['smtp_port']	=  getenv('smtp_port') ? getenv('smtp_port') :"587";
              $config['smtp_user']	= getenv('smtp_user') ? getenv('smtp_user') : "postmaster@sandbox3f5b54c0a4934e47af669e5ff8a773e2.mailgun.org";
              $config['smtp_pass']	=  getenv('smtp_pass') ? getenv('smtp_pass') : "5c9838c84e83edacb26c40bc3d7a971e";
              $config['mailtype']		= 'html';
              $config['charset']		= 'utf-8';
              $config['newline']		= "\r\n";
              $config['wordwrap']		= TRUE;

              $this->load->library('email');

              $this->email->initialize($config);

              $system_name	=	$this->db->get_where('settings' , array('type' => 'system_name'))->row()->description;
              if($from == NULL)
                  $from		=	$this->db->get_where('settings' , array('type' => 'system_email'))->row()->description;

              $this->email->from($from, $system_name);
              $this->email->from($from, $system_name);
              $this->email->to($to);
              $this->email->subject($sub);

              $msg	=	$msg."<br /><br /><br /><br /><br /><br /><br /><hr /><center><a href=.base_url()>&copy;". date('Y'). " ".$system_name.  "</a></center>";
              $this->email->message($msg);

              $this->email->send();
          }
      }

