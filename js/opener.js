window.onload = function() {
	var img = document.getElementsByTagName('img');
	//alert(img[0].src);
	for(i=0;i<img.length;i++){
		img[i].onclick = function() {
			_opener(this.alt);
		}
	}
}; //匿名函数需要加分号';'

function _opener(src){
	//opener表示父窗口.document表示文档
	var faceimg = opener.document.getElementById('faceimg');
	faceimg.src = src;
	opener.document.getElementById('imgip').value = src;
}
