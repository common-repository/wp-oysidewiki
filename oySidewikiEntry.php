<?php
/**
* Clase oySidewikiEntry
* 
* Description: Integracion Google Sidewiki API con PHP, clase contenedora de una entrada en Sidewiki
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
Class oySidewikiEntry
{
	private $_id;
	private $_published;
	private $_title;
	private $_content;
	private $_link;
	private $_author;
	private $_profile;
	
	public function __construct($id, $published, $title, $content, $link, $author, $profile)
	{
		$this->_id = $id;
		$this->_published = $published;
		$this->_title = $title;
		$this->_content = $content;
		$this->_link = $link;
		$this->_author = $author;
		$this->_profile = $profile;
	}
	public function getPublished()
	{
		return $this->_published;
	}
	public function getTitle()
	{
		return $this->_title;
	}
	public function getContent()
	{
		return $this->_content;
	}
	public function getLink()
	{
		return $this->_link;
	}
	public function getAuthor()
	{
		return $this->_author;
	}
	public function getProfile()
	{
		return $this->_profile;
	}
}
