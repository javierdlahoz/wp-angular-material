/**
 * 
 */
var PostHelper = {
	
	getEditPostUrl: function(postId){
		window.location = "/wp-admin/post.php?post="+postId+"&action=edit";
	},
	getPostInfoFromUrl: function(){
		var url = window.location.pathname;
		var slug = url;
		var type = "post";
		var slashesCount = (url.match(/\//g) || []).length;
		if(slashesCount >= 2){
			var splittedStringFromUrl = url.split("/");
			type = splittedStringFromUrl[1];
			slug = splittedStringFromUrl[2];
			
			if(type === "blog"){
				type = "post";
			}
		}
		return {
			slug: slug,
			type: type
		};
	}
};