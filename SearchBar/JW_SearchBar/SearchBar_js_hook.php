<?php

if(!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}

class SearchBar_Hook 
{

	function echoJS($event, $arguments)
    {

        if ($_REQUEST['action']=='index') {


    		echo "<script type='text/javascript'> 

            $.ajax({
                url: '/modules/JW_SearchBar/js/autoComplete.min.js',
                dataType: 'script',
                cache: true, 
                success: function() {
                    console.log('Loaded - autoComplete.min.js');
                }
            });

            $.ajax({
                url: '/modules/JW_SearchBar/js/searchBar.js',
                dataType: 'script',
                cache: true, 
                success: function() {
                    console.log('Loaded - searchBar.js');
                }
            });

            var head  = document.getElementsByTagName('head')[0];
            var link  = document.createElement('link');
            link.rel  = 'stylesheet';
            link.type = 'text/css';
            link.href = '/modules/JW_SearchBar/css/autoComplete.css';
            link.media = 'all';
            head.appendChild(link);

            inputBox = document.createElement('input');
	    	inputBox.id = 'autoComplete';	
            inputBox.type = 'search'; 
        
		    document.getElementById('selectLinkTop').parentElement.append(inputBox);

            goBox = document.createElement('btn');
	    	goBox.id = 'goBox';	
            goBox.type = 'btn'; 
            goBox.innerHTML ='GO';
            goBox.setAttribute('style','display:none;padding:5px 8px 7px 7px; top:-1;color:white;border:none;border-radius: 4px;background-color: #1f4351;color: #fff;margin: 0 2px 0 10px;line-height: 26px;height: 26px;width: 26px;');
         
            document.getElementById('autoComplete').parentElement.append(goBox);
            

            </script>"; 
        }

    }
}