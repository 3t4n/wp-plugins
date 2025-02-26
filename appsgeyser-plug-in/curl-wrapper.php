<?php
	class CCurlWrapper {
		var $cUrl;
		
		function CCurlWrapper() {
			$this->cUrl = curl_init();
		}
		
		function setOption($option, $optionValue) {
			return curl_setopt($this->cUrl, $option, $optionValue);
		}
		
		function setOptions($optionsArray) {
			return curl_setopt_array($this->cUrl, $optionsArray);
		}
		
		function sendRequest() {
			return curl_exec($this->cUrl);
		}
		
		function Destroy() {
			curl_close($this->cUrl);
		}
	}
?>