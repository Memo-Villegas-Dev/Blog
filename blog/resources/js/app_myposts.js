const app_myposts = {

    url: "../../app/app.php",

    mp: $("#my-posts"),

    getMyPosts : function(uid){
        var html = "";
        this.mp.html("");//this.mp.innerHTML = "";
        fetch(this.url + "?mp&id=" + uid)
        .then( response => response.json())
        .then( mpresp => {
            //console.table(mpresp);
            for(let post of mpresp){
                html += `
                    <tr>
                        <td>${ post.title }</td>
                        <td>${ post.fecha }</td>
                        <td>
                            <button type="button" onclick="" class="btn btrn-link btn-sm"><i class="fas fa-pencil-alt"></i></button>
                            <button type="button" onclick="" class="btn btrn-link btn-sm text-danger"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    <tr>
                    `;
                }
                this.mp.html(html);
        }).catch( err => console.log( err ));
    }
};