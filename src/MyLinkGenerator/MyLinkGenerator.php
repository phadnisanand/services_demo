<?php
namespace Drupal\services_demo\MyLinkGenerator;
use Drupal\Core\Url;
use Drupal\Core\Utility\LinkGenerator;
use Drupal\Core\Utility\LinkGeneratorInterface;
class MyLinkGenerator extends LinkGenerator implements LinkGeneratorInterface {
	public function generate($text, Url $url) { 
		$generatedLink =  parent::generate($text,$url);
		return $generatedLink;
	}
}