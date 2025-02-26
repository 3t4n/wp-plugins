<?php

add_action( 'wp_footer', 'AIS_speech_load' );
function AIS_speech_load() {
    $rate = !empty((double)get_option('AIS_speech-rate')) ? (double)get_option('AIS_speech-rate') : 1.1;
    $pitch = !empty((double)get_option('AIS_speech-pitch')) ? (double)get_option('AIS_speech-pitch') : 1.0;
    $volume = !empty((double)get_option('AIS_speech-volume')) ? (double)get_option('AIS_speech-volume') : 1.0;
    ?>

    <script type="text/javascript">
        const postData = {
            PageURL: location.href,
            option:'none'
        }

        fetch("<?php echo AIS_GetHTML_url ?>", {
            method: 'POST',
            headers: { 
                'Content-Type': 'application/x-www-form-urlencoded' 
            },
            body: new URLSearchParams(postData).toString()
        })
            .then(res => res.json())
            .then(files => {
                // console.log(files)

                if ('speechSynthesis' in window) {

                    const uttr = new SpeechSynthesisUtterance()
                    uttr.text = files
                    uttr.lang = "ja-JP"
                    uttr.rate = <?php echo esc_html($rate) ?>
                    uttr.pitch = <?php echo esc_html($pitch) ?>
                    uttr.volume = <?php echo esc_html($volume) ?>

                    const speakBtn  = document.querySelector('#speech-start')
                    const cancelBtn = document.querySelector('#speech-cancel')
                    const pauseBtn  = document.querySelector('#speech-pause')
                    const resumeBtn = document.querySelector('#speech-resume')

                    speakBtn.addEventListener('click', function() {
                        window.speechSynthesis.speak(uttr)
                    })

                    cancelBtn.addEventListener('click', function() {
                        window.speechSynthesis.cancel()
                    })

                    pauseBtn.addEventListener('click', function() {
                        window.speechSynthesis.pause()
                    })

                    resumeBtn.addEventListener('click', function() {
                        window.speechSynthesis.resume()
                    })

                }
            })
            .catch(error => {
                console.log(error)
            });
            
    </script>

    <?php

}