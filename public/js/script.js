setInterval(function(){
    const time = document.querySelector("#time");
    let date = new Date();
    let hours = date.getHours();
    let minutes = date.getMinutes();
    let seconds = date.getSeconds();
    let day_night = "AM";

    if (hours > 12) {
        day_night = "PM";
    }
    if (hours > 10) {
        hours = hours;
    }
    if (hours < 10) {
        minutes = minutes;
    }
    if (minutes < 10) {
        minutes = "0" + minutes;
    }
    if (seconds < 10) {
        seconds = "0" + seconds;
    }
    if (hours < 10) {
        seconds = seconds;
    }
    time.textContent = hours + ":" + minutes + ":" + seconds + " " + day_night;
    
})