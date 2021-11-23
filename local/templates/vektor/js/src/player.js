// function from './youtubeApi.js'; 
const getYPByID = document.getYPByID;

function previewOnClick(event) {
    const videoBlock = event.currentTarget;
    const playerId = event
        .currentTarget
        .querySelector('.youtube-video')
        .getAttribute('id');

    const player = getYPByID(playerId);
    if (!videoBlock.classList.contains('active')) {
        videoBlock.classList.add('active');
        player.playVideo();
    }

}

document.addEventListener('DOMContentLoaded', () => {

    const players = document.querySelectorAll('.video-block');

    // setTimeout(() => function() {
    // 	console.log(document.YT);
    // }, 1000)

    if (players.length > 0) {
        players.forEach((player) => player.addEventListener('click', previewOnClick));
    }
});