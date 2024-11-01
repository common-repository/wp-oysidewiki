<?php
/**
* Clase oySidewikiByURI
* 
* Description: Integracion Google Sidewiki API con PHP, clase que obtiene las entradas de una URI
* Author: Jorge Oyhenard, elQuique
* Author URL: http://www.jorgeoyhenard.com/
* Version: release 1.0
* Project URI: http://www.jorgeoyhenard.com/wp-oysidewiki/
* 
**/
/*
Copyright 2009  Jorge Oyhenard  (email : jorge@solophotoshop.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

require_once 'oySidewikiEntry.php';

Class oySidewikiByURI
{
	private $_uri;
	private $_url;
	private $_entries = array();
	private $_count;
	
	public function __construct($uri)
	{
		$this->_uri = $uri;
		$this->_getSidewikiFeed();
	}
	public function getCount()
	{
		return $this->_count;
	}
	public function getURI()
	{
		return $this->_uri;
	}
	public function getEntries()
	{
		return $this->_entries;
	}
	private function _getSidewikiFeed()
	{
		$entries = null;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'http://www.google.com/sidewiki/feeds/entries/webpage/' . urlencode($this->_uri) . '/full');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		
		if (($output = curl_exec($ch)) == false) {
			echo 'Curl error: ' . curl_error($ch);
		} else {
			try {
				$xml = @new SimpleXMLElement($output); // @ no expone warnings
				foreach($xml->entry as $name => $value) {
					$link = $value->link[1]->attributes();
					$entries[] = new oySidewikiEntry($value->id, $value->published, $value->title, $value->content, $link['href'], $value->author->name, $value->author->uri);
				}
			} catch (Exception $e) {
				// retorna una clase vacía si el XML no existe o [poco probable] esta mal formado
			}
		}
		curl_close($ch);
		$this->_entries = $entries;
		$this->_count = count($entries);
		return $this->_entries;
	}
}
