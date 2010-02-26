
function hasClass(ele, cls) {
    var classes = ele.className.split(" ");
    for (var i=0;i<classes.length;i++)
        if (classes[i].indexOf(cls) == 0)
            return true;
    return false;
}
function addClass(ele,cls) {
	if (!this.hasClass(ele,cls)) ele.className += " "+cls;
}
function removeClass(ele,cls) {
	if (hasClass(ele,cls)) {
		var classes = ele.className.split(" ");
        ele.className = '';
        i = 0;
        for (var i=0;i<classes.length;i++)
            if (classes[i].indexOf(cls) != 0)
            {
                if(i==0) ele.className += classes[i];
                else ele.className += ' '+classes[i];
                i++;
            }
	}
}
function addError(sender, message)
{
    addClass(sender, 'form-control-error');
    var id = sender.id+'_message';
    var el = document.getElementById(id);
    if(!el)
    {
        el = document.createElement('span');
        el.className = 'form-error-message';
        el.innerHTML = message;
        el.id = id;
        var parent = sender.parentNode;

        if(parent.lastchild == sender) {
            parent.appendChild(el);
        } else {
            parent.insertBefore(el, sender.nextSibling);
        }
    }
    else
    {
        el.style.display = 'inline';
        el.innerHTML = message;
    }
}
function removeError(sender)
{
    removeClass(sender, 'form-control-error');
    var el = document.getElementById(sender.id+'_message');
    if(el)
        el.style.display = 'none';
}