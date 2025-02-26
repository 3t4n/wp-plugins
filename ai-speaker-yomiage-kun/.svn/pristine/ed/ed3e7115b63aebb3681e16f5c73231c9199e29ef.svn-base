//=====[ change value ]=====//
let AISRate = document.getElementById(`AIS_speech-rate`);
let AISPitch = document.getElementById(`AIS_speech-pitch`);
let AISVolume = document.getElementById(`AIS_speech-volume`);
let AIS_FontColor = document.getElementById(`AIS_FontColor`);
let AIS_ButtonColor = document.getElementById(`AIS_ButtonColor`);
let AIS_BGColor = document.getElementById(`AIS_BGColor`);


AISRate.addEventListener(`input`, () => {
    document.querySelector(`#AIS_rate_result`).textContent = `${AISRate.value}`;
});

AISPitch.addEventListener(`input`, () => {
    document.querySelector(`#AIS_pitch_result`).textContent = `${AISPitch.value}`;
});

AISVolume.addEventListener(`input`, () => {
    document.querySelector(`#AIS_volume_result`).textContent = `${AISVolume.value}`;
});

AIS_FontColor.addEventListener(`input`, () => {
    document.querySelector(`#AIS_FontColor_result`).textContent = `${AIS_FontColor.value}`;
});

AIS_ButtonColor.addEventListener(`input`, () => {
    document.querySelector(`#AIS_ButtonColor_result`).textContent = `${AIS_ButtonColor.value}`;
});

AIS_BGColor.addEventListener(`input`, () => {
    document.querySelector(`#AIS_BGColor_result`).textContent = `${AIS_BGColor.value}`;
});


//=====[ speech ]=====//
if( 'speechSynthesis' in window ){
    const test = new SpeechSynthesisUtterance()
    test.text = "これはテスト音声です。繰り返します。これはテスト音声です。"
    test.lang = "ja-JP"
    test.rate = AISRate.value
    test.pitch = AISPitch.value
    test.volume = AISVolume.value

    const speakBtn  = document.getElementById('speech-start');
    const cancelBtn = document.getElementById('speech-cancel');
    const pauseBtn  = document.getElementById('speech-pause');
    const resumeBtn = document.getElementById('speech-resume');

    speakBtn.addEventListener('click', function() {
        window.speechSynthesis.speak(test)
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

    const sample = new SpeechSynthesisUtterance()
    sample.text = 'こちらはデフォルトの音声です。デフォルトの音声を確認してください。'
    sample.lang = 'ja-JP'
    sample.rate = 0.9
    sample.pitch = 1.0
    sample.volume = 1.0

    const SampleSpeak  = document.querySelector('#AIS_test')

    SampleSpeak.addEventListener('click', function() {
        window.speechSynthesis.speak(sample)
    })
}