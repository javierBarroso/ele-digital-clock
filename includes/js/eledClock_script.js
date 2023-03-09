
function ele_digital_clock(){

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