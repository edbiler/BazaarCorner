<?php
		if (file_exists(dirname(__FILE__).DIRECTORY_SEPARATOR."lang/".$lang.".php")) {
			include dirname(__FILE__).DIRECTORY_SEPARATOR."lang/".$lang.".php";
		} else {
			include dirname(__FILE__).DIRECTORY_SEPARATOR."lang/en.php";
		}

		foreach ($screenshare_language as $i => $l) {
			$screenshare_language[$i] = str_replace("'", "\'", $l);
		}
?>

(function($){   
  
	$.ccscreenshare = (function () {

		var title = '<?php echo $screenshare_language[0];?>';
		var lastcall = 0;

        return {

			getTitle: function() {
				return title;	
			},

			init: function (id) {
				var currenttime = new Date();
				currenttime = parseInt(currenttime.getTime()/1000);
				if (currenttime-lastcall > 10) {
					baseUrl = $.cometchat.getBaseUrl();

					var random = currenttime;
					$.post(baseUrl+'plugins/screenshare/index.php?action=request', {to: id, id: random});
					lastcall = currenttime;

					baseUrl = $.cometchat.getBaseUrl();
					var w =window.open (baseUrl+'plugins/screenshare/index.php?action=screenshare&type=1&id='+random, 'screenshare',"status=0,toolbar=0,menubar=0,directories=0,resizable=1,location=0,status=0,scrollbars=0, width=400,height=200");
					w.focus();

				} else {
					alert('<?php echo $screenshare_language[1];?>');
				}
			},

			accept: function (id,random) {
				baseUrl = $.cometchat.getBaseUrl();
				$.post(baseUrl+'plugins/screenshare/index.php?action=accept', {to: id});
				var w = window.open (baseUrl+'plugins/screenshare/index.php?action=screenshare&type=0&id='+random, 'screenshare',"status=0,toolbar=0,menubar=0,directories=0,resizable=1,location=0,status=0,scrollbars=0, width=800,height=600"); 
				w.focus();
			}
        };
    })();
 
})(jqcc);