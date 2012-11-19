<?php
namespace Famelo\Faces;

/*                                                                        *
 * This script belongs to the "Famelo/Faces.				              *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License as published by the Free   *
 * Software Foundation, either version 3 of the License, or (at your      *
 * option) any later version.                                             *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General      *
 * Public License for more details.                                       *
 *                                                                        *
 * You should have received a copy of the GNU General Public License      *
 * along with the script.                                                 *
 * If not, see http://www.gnu.org/licenses/gpl.html                       *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 *
 */
class Face {
	/**
	 * sources
	 *
	 * @var array
	 */
	protected $sources = array(
		'\Famelo\Faces\Sources\Gravatar',
		'\Famelo\Faces\Sources\Facebook'
	);

	public function __construct($email, $sources = NULL) {
		if ($sources !== NULL) {
			$this->sources = $sources;
		}

		foreach ($this->sources as $source) {
			$sourceObject = new $source($email);
			if ($sourceObject->getImage() !== NULL) {
				break;
			}
		}

		$this->source = $sourceObject;
	}

	public function getImage() {
		return $this->source->getImage();
	}
}


?>