const tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
const firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

const youtubeContainers = document.querySelectorAll('.youtube-video');
const youtubePlayers = [];

if (youtubeContainers) {
    window.onYouTubePlayerAPIReady = function() {

        youtubeContainers.forEach((item) => {
            const videoId = item.dataset.videoId;

            const player = new YT.Player(item, {
                height: '360',
                width: '640',
                videoId,
                // events: {
                //   'onReady': onPlayerReady,
                //   'onStateChange': onPlayerStateChange
                // }
            });

            youtubePlayers.push(player);
        });
    }
}

const getYPByID = (id) => (
    youtubePlayers.filter((item) => item.h.getAttribute('id') === id)[0]
);
// export  
document.getYPByID = getYPByID;