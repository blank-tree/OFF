$(document).foundation();

$(function() {
	async function onPlay() {

		// Settings
		const SSD_MOBILENETV1 = 'ssd_mobilenetv1';


		const videoEl = $('#inputVideo').get(0);

		if(videoEl.paused || videoEl.ended || !isFaceDetectionModelLoaded())
			return setTimeout(() => onPlay())




	}
});