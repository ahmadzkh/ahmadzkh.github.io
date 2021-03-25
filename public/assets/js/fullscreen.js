function getFullscreenElement() {
    return document.fullscreenElement
        || document.webkitFullscreenElement
        || document.mozFullscreenElement
        || document.msFullscreenElement;
}

function toggleFullscreen() {
    if(getFullscreenElement()) {
        document.exitFullscreen();
    } else {
        document.documentElement.requestFullscreen().catch(console.log);
    }
}

document.addEventListener("dblclick", () => {
    toggleFullscreen();
});

