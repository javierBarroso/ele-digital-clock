
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

    console.log(am)

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

/* const setProp = (el, prop, value) => el.style.setProperty(prop, value) 
	
const el =  document.getElementById('card')

	const onMouseUpdate = e => {
        let width = el.offsetWidth
        let XRel = e.pageX - el.offsetLeft
        let YRel = e.pageY - el.offsetTop
    
        let YAngle = -(0.5 - (XRel / width)) * 40; 
        let XAngle = (0.5 - (YRel / width)) * 40;
    
        setProp(el, '--dy', `${YAngle}deg`)
        setProp(el, '--dx', `${XAngle}deg`)
	}
	
	const resetProps = () => {
		el.style.setProperty('--dy', '0')
		el.style.setProperty('--dx', '0')
	}
	

	el.addEventListener('mousemove', onMouseUpdate, false)
	el.addEventListener('mouseenter', onMouseUpdate, false)
	el.addEventListener('mouseleave', resetProps, false)


 */