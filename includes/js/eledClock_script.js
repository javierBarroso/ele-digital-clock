
function ele_digital_clock(){

    let hours = document.querySelectorAll('.hour');
    let minutes = document.querySelectorAll('.minute');
    let seconds = document.querySelectorAll('.second');
    let am_tags = document.querySelectorAll('.am-tag');

    let h = new Date().getHours();
    let m = new Date().getMinutes();
    let s = new Date().getSeconds();


    var am = 'AM';

    if( h > 12 ){

        h = h - 12;
        am = 'PM';

    }


    if( h == 12 ){
        am = am == 'AM' ? 'PM' : 'AM'
    }

    h = ( h < 10 ) ? '0' + h : h;
    m = ( m < 10 ) ? '0' + m : m;
    s = ( s < 10 ) ? '0' + s : s;

    hours.forEach(hour => {

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
    
}


setInterval(ele_digital_clock, 1000);
