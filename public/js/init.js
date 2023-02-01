function sendForm(id){
    document.querySelector('#'+id).submit()
}
function reaction(postId, reaction, route, token ) {
    fetch(route,{
        method: 'POST',
        headers: {
            'Content-Type': 'application/json;charset=utf-8',
            'X-CSRF-TOKEN': token
        },
        body: JSON.stringify({
            postId,
            reaction
        })
    });

}
``
