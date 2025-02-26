import {
	ALLOWED_AUDIO_FILES,
	ALLOWED_IMAGE_FILES,
	ALLOWED_VIDEO_FILES,
} from "../config";

export function isImageUrl(url) {
	if (!url) return false;
	return url.match(new RegExp(`\.(${ALLOWED_IMAGE_FILES.join("|")})($|\\?)`)) != null;
}

export function isVideoUrl(url) {
	if (!url) return false;
	return url.match(new RegExp(`\.(${ALLOWED_VIDEO_FILES.join("|")})($|\\?)`)) != null;
}

export function isAudioUrl(url) {
	if (!url) return false;
	return url.match(new RegExp(`\.(${ALLOWED_AUDIO_FILES.join("|")})($|\\?)`)) != null;
}
