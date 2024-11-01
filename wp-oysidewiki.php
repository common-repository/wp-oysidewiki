<?php
/*
Plugin Name: WP oySidewiki
Plugin URI: http://www.jorgeoyhenard.com/wp-oysidewiki/
Description: Google Sidewiki comments in your WordPress blog
Author: Jorge Oyhenard @elQuique
Version: 0.1
Author URI: http://www.jorgeoyhenard.com/
*/

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

	function getSidewikiComments($uri = '') {
		$SidewikiComments = '';
				
		if (!empty($uri)) {
			require_once 'oySidewikiByURI.php';
	
			$sw = new oySidewikiByURI($uri);
	
			$SidewikiComments = '<div id="oysidewiki">';
			$SidewikiComments.= '<h3>Sidewiki Comments (' . $sw->getCount() . ')</h3>';
	
			if ($sw->getCount() > 0) {
				$entries = $sw->getEntries();
				$SidewikiComments.= '<ul>';
				foreach($entries as $entry ) {
					$SidewikiComments.= '<li><h3>' . $entry->getTitle() . '</h3>';
					$SidewikiComments.= printf ($published, $entry->getPublished(), $entry->getProfile(), $entry->getAuthor());
					$SidewikiComments.= '<p>' . $entry->getContent() . '</p>';
					$SidewikiComments.= '<p>Link: <a href="' . $entry->getLink() . '" target="_blank">' . $entry->getLink() . '</a></p>';
					$SidewikiComments.= '</li>';
				}
				$SidewikiComments.= '</ul>';
				$SidewikiComments.= '</div>';
			}
			$sw = null;
		}
		return $SidewikiComments;
	}
?>
