/**
 * This is a copy of @wordpress/block-library/src/image/use-client-width.js that has been modified to be used with this plugin.
 * Wordpress is distributed under the GNU General Public License: https://www.gnu.org/licenses/gpl-3.0.en.html
 */

/**
 * WordPress dependencies
 */
import { useEffect, useState } from "@wordpress/element";

export default function useClientWidth(ref) {
	const [clientWidth, setClientWidth] = useState();

	function calculateClientWidth() {
		setClientWidth(ref.current?.clientWidth);
	}

	useEffect(calculateClientWidth, [ref.current?.clientWidth]);

	return clientWidth;
}
