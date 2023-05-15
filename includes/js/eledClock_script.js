

var hours24 = false
var timeZone = 'America/New_York'

function set_timezone(zone){
    timeZone = zone
}


function ele_digital_clock(){

    let hours = document.querySelectorAll('.hour');
    let minutes = document.querySelectorAll('.minute');
    let seconds = document.querySelectorAll('.second');
    let am_tags = document.querySelectorAll('.am-tag');
    let hourCircle = document.querySelectorAll('.hh');
    let minuteCircle = document.querySelectorAll('.mm');
    let secondCircle = document.querySelectorAll('.ss');
    let dotHour = document.querySelectorAll('.hr_dot');
    let dotMinute = document.querySelectorAll('.min_dot');
    let dotSecond = document.querySelectorAll('.sec_dot');
    
    let date = new Date();
    let option = {'timeZone':timeZone}
    let time = date.toLocaleTimeString('UE', option)

    time = time.split(':')

    let h = time[0]
    let m = time[1]
    let s = time[2]

    var am = 'AM';
    
    if( h == 12 ){
        am = am == 'AM' ? 'PM' : 'AM'
    }
    
    h = ( h < 10 ) ? '0' + h : h;
    // m = ( m < 10 ) ? '0' + m : m;
    // s = ( s < 10 ) ? '0' + s : s;
    
    hours.forEach(hour => {
        hours24 = hour.getAttribute('data-h') == "24" ? false : true 
        
        if( h > 12 ){
            if(hours24){
                h = h - 12;
            }
            h = ( h < 10 ) ? '0' + h : h;
            am = 'PM';
        }

        hour.innerHTML = h;

    });

    minutes.forEach(minute => {

        minute.innerHTML = m;

    });

    seconds.forEach(second => {

        second.innerHTML = s;

    });

    am_tags.forEach(am_tag => {

        am_tag.innerHTML = am;

    });

    hourCircle.forEach(hCircle => {
        hCircle.style.strokeDashoffset = 440 - ( 440 * h ) / 12
    });
    minuteCircle.forEach(mCircle => {
        mCircle.style.strokeDashoffset = 440 - ( 440 * m ) / 60
    });
    secondCircle.forEach(sCircle => {
        sCircle.style.strokeDashoffset = 440 - ( 440 * s ) / 60
    });

    dotHour.forEach(hDot => {
        hDot.style.transform = `rotate(${h * 30}deg)`;
    });
    dotMinute.forEach(mDot => {
        mDot.style.transform = `rotate(${m * 6}deg)`;
    });
    dotSecond.forEach(sDot => {
        sDot.style.transform = `rotate(${s * 6}deg)`;
    });
    
}


setInterval(ele_digital_clock, 1000);
