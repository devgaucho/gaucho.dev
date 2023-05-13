function apagarPost(id){
	var url;
	if(window.confirm('Deseja apagar esse post?')){
		url='/post/'+id+'/delete';
		window.location=url;
	}
}