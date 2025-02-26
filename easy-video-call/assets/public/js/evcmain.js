const APP_ID = evc_app_id.name
const TOKEN = null
const CHANNEL = "Mukul"

const client = AgoraRTC.createClient({mode:'rtc', codec:'vp8'})

let localTracks = []
let remoteUsers = {}

let joinAndDisplayLocalStream = async () => {

    client.on('user-published', handleUserJoined)
    
    client.on('user-left', handleUserLeft)
    
    let UID = await client.join(APP_ID, CHANNEL, TOKEN, null)

    localTracks = await AgoraRTC.createMicrophoneAndCameraTracks() 

    let player = `<div class="video-container" id="user-container-${UID}">
                        <div class="video-player" id="user-${UID}"></div>
                  </div>`
    document.getElementById('evc-video-streams').insertAdjacentHTML('beforeend', player)

    localTracks[1].play(`user-${UID}`)
    
    await client.publish([localTracks[0], localTracks[1]])
}

let joinStream = async () => {
    await joinAndDisplayLocalStream()
    document.getElementById('evc-join-btn').style.display = 'none'
    document.getElementById('evc-stream-controls').style.display = 'flex'
    document.getElementById('evc-video-streams').style.height = "90vh"
    document.getElementById('evc-stream-wrapper').style.display = "block"
}

let handleUserJoined = async (user, mediaType) => {
    remoteUsers[user.uid] = user 
    await client.subscribe(user, mediaType)

    if (mediaType === 'video'){
        let player = document.getElementById(`user-container-${user.uid}`)
        if (player != null){
            player.remove()
        }

        player = `<div class="video-container" id="user-container-${user.uid}">
                        <div class="video-player" id="user-${user.uid}"></div> 
                 </div>`
        document.getElementById('evc-video-streams').insertAdjacentHTML('beforeend', player)

        user.videoTrack.play(`user-${user.uid}`)
    }

    if (mediaType === 'audio'){
        user.audioTrack.play()
    }
}

let handleUserLeft = async (user) => {
    delete remoteUsers[user.uid]
    document.getElementById(`user-container-${user.uid}`).remove()
}

let leaveAndRemoveLocalStream = async () => {
    for(let i = 0; localTracks.length > i; i++){
        localTracks[i].stop()
        localTracks[i].close()
    }

    await client.leave()
    document.getElementById('evc-join-btn').style.display = 'block'
    document.getElementById('evc-stream-controls').style.display = 'none'
    document.getElementById('evc-video-streams').innerHTML = ''
    document.getElementById('evc-video-streams').style.height = "1vh"
    document.getElementById('evc-stream-wrapper').style.display = "none"
}

let toggleMic = async (e) => {
    if (localTracks[0].muted){
        await localTracks[0].setMuted(false)
        e.target.classList.add("fa-microphone")
        e.target.classList.remove("fa-microphone-slash")
        e.target.style.color = 'white'
    }else{
        await localTracks[0].setMuted(true)
        e.target.classList.add("fa-microphone-slash")
        e.target.classList.remove("fa-microphone")
        e.target.style.color = '#EE4B2B'
    }
}

let toggleCamera = async (e) => {
    if(localTracks[1].muted){
        await localTracks[1].setMuted(false)
        e.target.classList.remove("fa-video-slash")
        e.target.classList.add("fa-video-camera")
        e.target.style.color = 'white'
    }else{
        await localTracks[1].setMuted(true)
        e.target.classList.remove("fa-video-camera")
         e.target.classList.add("fa-video-slash")
        e.target.style.color = '#EE4B2B'
    }
}

document.getElementById('evc-join-btn')?.addEventListener('click', joinStream)
document.getElementById('evc-leave-btn')?.addEventListener('click', leaveAndRemoveLocalStream)
document.getElementById('evc-mic-btn')?.addEventListener('click', toggleMic)
document.getElementById('evc-camera-btn')?.addEventListener('click', toggleCamera)