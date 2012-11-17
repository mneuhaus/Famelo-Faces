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
class Facebook {
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
		$fb = new \Facebook(array(
			'appId' => '385015441576593',
			'secret' => 'fcef3c5bc4443ee5804402c5e0d7b88a'
		));

		$user = $fb->getUser();

		if ($user) {
			$userData = $fb->api('/search?q=apocalip@gmail.com&type=user&access_token=' . $fb->getAccessToken(), 'GET');
		} else {
			echo '<meta http-equiv="refresh" content="0;url=' . $fb->getLoginUrl() . '">';
			exit();
		}

		if (isset($userData['data'][0]['id'])) {
			$id = $userData['data'][0]['id'];
			$picture = $fb->api('/' . $id . '/picture', 'GET');
			$this->image = 'http://graph.facebook.com/' . $id . '/picture?width=' . $size . '&height=' . $size;
		}
	}

	public function getImage() {
		return $this->image;
	}
}


?>