<?php
/**
 * NOVIUS
 *
 * @copyright  2014 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius.com
 */

namespace Novius\OnlineMediaFiles;

class Controller_Front extends \Nos\Controller_Front_Application {

    /**
     * Display the embedded online media
     *
     * @param array $args
     * @return bool
     */
    public function action_show($args = array()) {

        $media_id = \Arr::get($args, 'media_id');
        if (empty($media_id)) {
            return false;
        }

        // Finds the online media item
        $media = Model_Media::find($media_id);

        // Builds params
		$params = array();
		if ($width = \Arr::get($args, 'media_width')) {
			\Arr::set($params, 'attributes.width', $width);
		}
        if ($height = \Arr::get($args, 'media_height')) {
            \Arr::set($params, 'attributes.height', $height);
		}

        return $media->display($params);
    }
}
