<?php
namespace Famelo\Faces\Sources;

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
class Gravatar {
	/**
	 * BaseUrl
	 *
	 * @var string
	 */
	protected $baseUrl = 'http://www.gravatar.com/avatar/';

	/**
	 * Result
	 *
	 * @var string
	 */
	protected $image = NULL;

	public function __construct($email, $size = 64) {
		$resty = new \Resty();
		$resty->setBaseURL($this->baseUrl);

		$emailHash = md5(strtolower( trim( $email ) ) );
		$resp = $resty->get($emailHash . '?d=404&s=' . $size);
		if ($resp['status'] == 200) {
			$this->image = $this->baseUrl . $emailHash . '?d=404&s=' . $size;
		}
	}

	public function getImage() {
		return $this->image;
	}
}


?>