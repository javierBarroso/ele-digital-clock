
function digital_clock(){

    let hours = document.querySelector('#hour');
    let minutes = document.querySelector('#minute');
    let seconds = document.querySelector('#second');

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

    
    hours.innerHTML = h + '<span id="am-tag">' + am + '</span>';
    minutes.innerHTML = m;
    seconds.innerHTML = s;
}


