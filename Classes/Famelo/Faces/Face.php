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
	protected $defaults = array(
		'size' => '64',
		'sources' => array(
			'\Famelo\Faces\Sources\GravatarSource',
	//		'\Famelo\Faces\Sources\FacebookSource'
		)
	);

	public function __construct($email, $options = array()) {
		$options = array_merge($this->defaults, $options);

		foreach ($options['sources'] as $source) {
			$sourceObject = new $source($email, $options);
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