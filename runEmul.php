<?php
	/*settings*/
	error_reporting(E_ALL);
	set_time_limit(0);
	ob_implicit_flush();
	/*settings end*/
	
	/*internal*/
	/*PayloadFlags*/
	$PayloadFlags ={ 
        Undefined : 0,
        IsPasswordProtected : 1,
        CanCreateChannel : 2
	);
	
	/*PayloadTypes*/	
	$PayLoadType = array(
		Undefined : 0,
        Keyrequest : 1,
        Dataupload : 2
	);
	
	/*Properties*/
	$Properties = { 
		TS3SRV_WEBLISTURL : "weblist.teamspeak.com",
		TS3SRV_WEBLISTPORT : 2010,
		TS3SRV_WEBLIST_PROTOCOL_HEADERLEN : 4,
		TS3SRV_WEBLIST_PROTOCOL_AUTHKEYLEN : 4,
		TS3SRV_WEBLIST_SOCKET_BUFFSIZE : 1024,
		TS3SRV_WEBLIST_PROTOCOL_SLOTSCLIENTSLEN : 2,
		TS3SRV_WEBLIST_PROTOCOL_PORTLEN : 2,
		TS3SRV_LOGGER_NAME : "TS3SRV"
	};	
	/*ResponseStatus*/
	$ResponseStatus = array(
        Ok : 0,
        BadData : 1,
        Busy : 5,
        Error : 7
	};
	
	/*ServerProperties*/
	$ServerProperties = {
		/*Name of the server*/
		Name : ""
		/*Port of the server*/
		Port: 9987,
		/*Number of slots*/
		Slots: 30,
		/*Number of connected clients*/
		Clients: 30,
		/*ispasswordprotected*/
		IsPasswordProtected : false,
		/*cancreatechannels*/
		CanCreateChannels : false,
	}
	/*internal end*/
	
	/*network*/
	
	

	
	/*network end*/

	class PayloadProcessor { 
		/*type: ConnectionHandler*/ 
		private $§CHandler;
		private $Logger;
		/*type: byte[]*/ 
		private $TS3SRV_WEBLIST_AUTHKEY;
		/*type: ushort*/
        private $TS3SRV_WEBLIST_SEQUENCEID;
		/*type: ServerProperties*/ 
        private $_serverProperties;
		/*type: Timer*/ 
        private $_timer = new Timer(600000);
		/*type bool*/
        private $awaitingAuthKey = false;
		
		__construct($serverProperties){ 
			$CHandler = new ConnectionHandler();

		}
	}


	/*ConnectionHandler*/
	class ConnectionHandler { 
		/*type: IPAddress */
		private $TS3SRV_WEBLIST_IP;
		/*private IPEndPoint TS3SRV_WEBLIST_ENDPOINT; kann wegbleiben*/
		/*type: Socket*/
		private $TS3SRV_WEBLIST_SOCKET;
		function __construct() { 
			$TS3SRV_WEBLIST_IP = gethostbyname($Properties.TS3SRV_WEBLISTURL);
			$TS3SRV_WEBLIST_SOCKET = socket_create(AF_INET, SOCK_DGRAM, udp) or die "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";	
		}

		function InitializeConnection() { 
			socket_connect($TS3SRV_WEBLIST_SOCKET, $TS3SRV_WEBLIST_IP, $Properties.Port) or die echo "socket_connect() failed.\nReason: ($result) " . socket_str;
			$sHandler = new SocketHandler($TS3SRV_WEBLIST_SOCKET);

		}
		
		
	}
	/*ConnectionHandler end*/

	/*SocketHandler*/ 
	class SocketHandler { 
		/*type: Socket*/ 
		public $TS3SRV_SOCKET;
		/*type: byte[] */
		public $TS3SRV_SOCKET_BUFFER;

		__construct($a){ 
			$TS3SRV_SOCKET = $a;
		}

	}
	/*SocketHandler end*/ 


	class IPEndPoint() { 
		__construct($a){ 

		}
	}
?>
