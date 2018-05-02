<?php 


/**
 * Supported phone companies lists and their sms gateway
 *
 * @return  [$company => $smsGateway]
 *
 */

 return [
 	"companies" => [
 		""              => null,
 		"Verizon"       => "vtext.com",
 		"Sprint"        => "messaging.sprintpcs.com",
 		"AT&T"          => "txt.att.net",
 		"T-Mobile"      => "tmomail.net",
 		"Cricket"       => "sms.mycricket.com",
 		"Boost Mobile"  => "myboostmobile.com",
 		"Virgin Mobile" => "vmobl.com",
 		"US Cellular"   => "email.uscc.net",
 	]
 ];